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

class UserPostController extends Controller
{

        public function store(Request $request)
        {
            try {
                $validatedData = $request->validate([
                    'user_posts' => 'required|string',
                    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image file if uploaded
                    'category' => 'required|string' // Validate category input
                ]);

                $userPosts = new UserPosts();
                $userPosts->user_posts = $validatedData['user_posts'];
                $userPosts->category = $validatedData['category'];
                $userPosts->user_id = Auth::id();

                // Check if an image is uploaded
                if ($request->hasFile('image')) {
                    $imagePath = $request->file('image')->store('uploads', 'public'); // Store image in the 'uploads' folder
                    $userPosts->image_path = $imagePath; // Save the image path in the database
                }

                $userPosts->save(); 

                return redirect()->route('studentDashboard')->with('flash_message', 'Post Added!');
            } catch (\Exception $e) {
                Log::error('Error saving post: ' . $e->getMessage());
                return Redirect::back()->withErrors(['error' => 'An error occurred while saving the post.']);
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
    
            // Get posts from connected users and the authenticated user
            $userPosts = UserPosts::whereIn('user_id', $connectedUserIds)->get();
    
            // Separate posts into two collections: matching interests and non-matching
            $matchingPosts = $userPosts->filter(function ($post) use ($userInterests) {
                return in_array($post->category, $userInterests);
            });
            $nonMatchingPosts = $userPosts->diff($matchingPosts);
    
            // Shuffle both collections
            $matchingPosts = $matchingPosts->shuffle();
            $nonMatchingPosts = $nonMatchingPosts->shuffle();
    
            // Merge the collections, with matching posts first
            $userPosts = $matchingPosts->merge($nonMatchingPosts);
    
            // Add reaction count and user reaction status to each post
            foreach ($userPosts as $post) {
                $post->reaction_count = Reaction::where('post_id', $post->id)->count();
                $post->user_reacted = Reaction::where('post_id', $post->id)
                                            ->where('user_id', $userId)
                                            ->exists();
            }
        
            return view('student.studentDashboard', compact('userPosts'));
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

            if ($userPosts->user_id !== Auth::id()) {
                return redirect()->back()->with('error', 'You are not authorized to delete this post.');
            }

            $userPosts->delete();
            return redirect()->route('studentDashboard')->with('flash_message', 'post deleted successfully!');
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
