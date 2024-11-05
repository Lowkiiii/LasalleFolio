<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserPosts;
use App\Models\Interest;
use App\Models\Reaction;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use App\Models\FriendRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserPostController extends Controller
{

    // Predefined categories list
    private $predefinedCategories = [
        '3D Animation',
        '3D Modelling',
        'AI',
        'Game Development',
        'UI/UX',
        'Programming',
        'Data Analytics',
        'Data Science',
        'Networking',
        'Database',
        'Web Design',
        'Multimedia',
        'Graphic Design',
        'Software Development',
        'Cloud Computing',
        'Web Development'
    ];

    private $abbreviations = [
        'web dev' => 'Web Development',
        'data sci' => 'Data Science',
        'programmng' => 'Programming',
        // Add other common abbreviations as needed
    ];

    public function findSimilarCategory($inputCategory, $similarityThreshold = 75)
    {

        // Check for abbreviation matches first
        if (isset($this->abbreviations[Str::lower($inputCategory)])) {
            return $this->abbreviations[Str::lower($inputCategory)];
        }
        // Convert input to lowercase for case-insensitive comparison
        $inputCategory = Str::lower($inputCategory);
        $bestMatch = null;
        $highestSimilarity = 0;

        foreach ($this->predefinedCategories as $category) {
            $categoryLower = Str::lower($category);
            
            // Calculate similarity percentage using similar_text
            similar_text($inputCategory, $categoryLower, $similarity);
            
            // Also check Levenshtein distance as a backup
            $levenshtein = levenshtein($inputCategory, $categoryLower);
            $levenSimilarity = (1 - ($levenshtein / max(strlen($inputCategory), strlen($categoryLower)))) * 100;
            
            // Use the higher of the two similarity scores
            $finalSimilarity = max($similarity, $levenSimilarity);

            if ($finalSimilarity > $highestSimilarity) {
                $highestSimilarity = $finalSimilarity;
                $bestMatch = $category;
            }
        }

        // Uncomment the following lines to help with debugging
        echo "Input category: $inputCategory\n";
        echo "Best match: $bestMatch\n";
        echo "Highest similarity: $highestSimilarity\n";

        // Return the best match if it meets the threshold, otherwise return null
        return $highestSimilarity >= $similarityThreshold ? $bestMatch : null;
    }
    
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'user_posts' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'category' => 'required|string',
            ]);

            $category = $validatedData['category'];

            // If the category is "Other" and a custom category is provided
            if ($category === 'Other' && $request->has('custom_category')) {
                $customCategory = trim($request->input('custom_category'));
                
                // Try to find a similar category
                $similarCategory = $this->findSimilarCategory($customCategory);
                
                if ($similarCategory) {
                    // Use the similar predefined category
                    $category = $similarCategory;
                    
                    // You might want to flash a message to inform the user
                    session()->flash('category_suggestion', 
                        "Your category \"$customCategory\" was matched to \"$similarCategory\".");
                } else {
                    // If no similar category found, use the custom category as is
                    $category = $customCategory;
                }
            }

            $userPosts = new UserPosts();
            $userPosts->user_posts = $validatedData['user_posts'];
            $userPosts->category = $category;
            $userPosts->user_id = Auth::id();

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('uploads', 'public');
                $userPosts->image_path = $imagePath;
            }

            $userPosts->save();

            return redirect()->route('studentDashboard')
                ->with('flash_message', 'Post Added!');
        } catch (\Exception $e) {
            Log::error('Error saving post: ' . $e->getMessage());
            return Redirect::back()
                ->withErrors(['error' => 'An error occurred while saving the post.']);
        }
    }

        public function index()
        {
            $userId = Auth::id();
            
            // Get IDs of connected users
            $connectedUserIds = FriendRequest::where(function ($query) use ($userId) {
                $query->where('sender_id', $userId)
                    ->orWhere('receiver_id', $userId);
            })
            ->where('status', 'accepted')
            ->get()
            ->map(function ($request) use ($userId) {
                return $request->sender_id === $userId ? $request->receiver_id : $request->sender_id;
            });

            // Include the authenticated user's ID
            $connectedUserIds[] = $userId;

            // Get the current user's interests
            $userInterests = Interest::where('user_id', $userId)->pluck('interest_name')->toArray();

            // Collaborative Filtering: Find similar users based on interests
            $similarUsers = UserPosts::whereIn('id', $connectedUserIds)
                ->with('interests')
                ->get()
                ->map(function ($user) use ($userInterests) {
                    // Calculate Jaccard Similarity
                    $userInterests = $user->interests->pluck('interest_name')->toArray();
                    $similarityScore = $this->calculateJaccardSimilarity($userInterests, $userInterests);
                    
                    return [
                        'user_id' => $user->id,
                        'similarity_score' => $similarityScore
                    ];
                })
                ->sortByDesc('similarity_score')
                ->pluck('user_id')
                ->toArray();

            // Get posts from similar users and the authenticated user
            $userPosts = UserPosts::whereIn('user_id', $similarUsers)
                ->orWhere('user_id', $userId)
                ->get();

            // Enhanced post filtering and ranking
            $rankedPosts = $userPosts->map(function ($post) use ($userInterests, $userId) {
                // Calculate interest match score
                $interestMatchScore = in_array($post->category, $userInterests) ? 1 : 0;
                
                // Calculate engagement score
                $reactionCount = Reaction::where('post_id', $post->id)->count();
                $engagementScore = log1p($reactionCount);
                
                // Calculate recency score
                $recencyScore = $this->calculateRecencyScore($post->created_at);
                
                // Calculate collaborative score based on user similarity
                $collaborativeScore = $this->calculateCollaborativeScore($post->user_id, $userId);
                
                // Combine scores with weighted approach
                $totalScore = (
                    0.4 * $interestMatchScore + 
                    0.3 * $engagementScore + 
                    0.2 * $recencyScore + 
                    0.1 * $collaborativeScore
                );
                
                return [
                    'post' => $post,
                    'score' => $totalScore,
                    'reaction_count' => $reactionCount,
                    'user_reacted' => Reaction::where('post_id', $post->id)
                                            ->where('user_id', $userId)
                                            ->exists()
                ];
            })
            // Sort posts by total score in descending order
            ->sortByDesc('score')
            ->values();

            // Prepare posts for view
            $userPosts = $rankedPosts->map(function ($postData) {
                $post = $postData['post'];
                $post->reaction_count = $postData['reaction_count'];
                $post->user_reacted = $postData['user_reacted'];
                return $post;
            });

            return view('student.studentDashboard', compact('userPosts'));
        }

        // Helper method to calculate Jaccard Similarity
    private function calculateJaccardSimilarity(array $set1, array $set2)
    {
        $intersection = array_intersect($set1, $set2);
        $union = array_unique(array_merge($set1, $set2));
            
        return count($intersection) / count($union);
    }

        // Helper method to calculate recency score
    private function calculateRecencyScore($createdAt)
    {
        $now = now();
        $daysDiff = $now->diffInDays($createdAt);
                
        // Exponential decay of recency
        return exp(-0.1 * $daysDiff);
    }

        // Helper method to calculate collaborative score
    private function calculateCollaborativeScore($postUserId, $currentUserId)
    {
        // Calculate similarity based on shared connections or interactions
        $sharedConnections = FriendRequest::where(function ($query) use ($postUserId, $currentUserId) {
            $query->where('sender_id', $postUserId)
                ->where('receiver_id', $currentUserId)
                ->orWhere('sender_id', $currentUserId)
                ->where('receiver_id', $postUserId);
        })
        ->where('status', 'accepted')
        ->count();
        
        // Calculate interaction score based on previous interactions
        $interactionScore = Reaction::where('user_id', $postUserId)
            ->whereHas('post', function ($query) use ($currentUserId) {
                $query->where('user_id', $currentUserId);
            })
            ->count();
            
        // Combine shared connections and interactions
        return log1p($sharedConnections + $interactionScore);
    }

    public function userProfile()
    {
        $user = Auth::user();
        $userPosts = $user->userPosts;
        return view('student.studentProf', compact('userPosts'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'user_posts' => 'required|string',
            ]);

            $userPosts = UserPosts::findOrFail($id);

            if ($userPosts->user_id !== Auth::id()) {
                return redirect()->back()->with('error', 'You are not authorized to update this post.');
            }

            $userPosts->user_posts = $validatedData['user_posts'];
            $userPosts->save();


            return redirect()->route('studentDashboard')->with('flash_message', 'Post updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating post: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating the post.']);
        }
    }

    public function destroy($id)
    {
        try {
            $userPosts = UserPosts::findOrFail($id);
            $requestUserId = request('user_id');

            if ($userPosts->user_id != $requestUserId || $requestUserId != Auth::id()) {
                $message = "You are not authorized to delete this post.";
                Log::warning("Unauthorized delete attempt. Post user_id: " . $userPosts->user_id . ", Request user_id: " . $requestUserId . ", Auth::id(): " . Auth::id());
                return redirect()->back()->with('error', $message);
            }

            $userPosts->delete();
            return redirect()->route('studentDashboard')->with('flash_message', 'Post deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting post: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An error occurred while deleting the post.']);
        }
    }

    public function react(Request $request, $postId)
    {
        $userId = Auth::id();

        // Check if the user already reacted to this post
        $reaction = Reaction::where('user_id', $userId)->where('post_id', $postId)->first();

        if ($reaction) {
            // If already reacted, remove the reaction
            $reaction->delete();
            $reacted = false;
        } else {
            // Otherwise, add a new reaction
            Reaction::create([
                'user_id' => $userId,
                'post_id' => $postId,
            ]);
            $reacted = true;
        }

        // Return the total number of reactions and reaction status for the post
        $reactionCount = Reaction::where('post_id', $postId)->count();
        return response()->json([
            'count' => $reactionCount,
            'reacted' => $reacted,
        ]);
    }

}
