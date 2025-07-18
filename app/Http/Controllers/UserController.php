<?php

namespace App\Http\Controllers;

use App\Models\UserPosts;
use App\Models\FriendRequest;
use App\Models\Reaction;
use App\Models\Comment;
use App\Models\Interest;
use App\Models\Bio;
use App\Models\Post;
use App\Models\PinnedProject;
use Illuminate\Http\Request;
use App\Models\QuizPoints;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\FriendRequestController;
use App\Http\Controllers\CommentController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\LengthAwarePaginator;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::all();

        $user = Auth::user();

        if ($user->user_type_id == 1) {
            return view('admin.index', compact('users', 'user'))->with('admin.users', $users);
        } elseif ($user->user_type_id == 2) {
            return view('student.studentDashboard', compact('user'));
        }
    }

    public function showProfile($id)
    {
        $user = User::find($id);
        dd($user->image); // Check what this outputs
        return view('student.studentProf', compact('user'));
    }
    public function showProfileDashboard($id)
    {
        $user = User::find($id);
        dd($user->image); // Check what this outputs
        return view('student.studentDashboard', compact('user'));
    }

    public function showUserProfile($id)
    {
        $user = User::find($id);
        dd($user->image); // Check what this outputs
        return view('profile.show', compact('user'));
    }

   

    public function studentProfile(Request $request)
    {
        $query = $request->input('query');

        $authUser = User::where('first_name', 'LIKE', "%{$query}%")
            ->orWhere('last_name', 'LIKE', "%{$query}%")
            ->get();

        $user = Auth::user();
        $userId = Auth::id();
        $userProjects = $user->userProjects;
        $userSkills = $user->userSkills;
        $userAcademics = $user->userAcademics;
        $userHonorsAndAwards = $user->userHonorsAndAwards;
        $userPosts = $user->userPosts;
        $userInterests = $user->interests;
        $userPoints = $this->calculatePointsForUser($user);
        $badge = $this->getUserBadge($userPoints);

        // Retrieve userPosts ordered by the most recent `created_at` timestamp
        $userPosts = UserPosts::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        // Fetch pinned projects for the user
        $pinnedProjects = PinnedProject::with('project') // Eager load the project
            ->where('user_id', $user->id)
            ->get();

        // Exclude pinned projects from the available projects list
        $availableProjects = $userProjects->whereNotIn('id', $pinnedProjects->pluck('project_id'));

        // Get the user's bio
        $bio = Bio::where('user_id', $userId)->first();

        // Fetch all users and calculate their points
        $users = User::all()->map(function ($user) {
            // Calculate the points for the user
            $user->points = $this->calculatePointsForUser($user);
        
            // Get the user's badge based on their points
            $user->badge = $this->getUserBadge($user->points);
        
            return $user;
        });

        // Calculate points
        $points = $this->calculatePoints();

        // Get badge
        $totalPoints = $this->calculatePoints();
        $badge = $this->getUserBadge($points);

        // Add reaction count and user reaction status to each post
        foreach ($userPosts as $post) {
            $post->user->points = $this->calculatePointsForUser($post->user);
            $post->user->badge = $this->getUserBadge($post->user->points);

            $post->reaction_count = Reaction::where('post_id', $post->id)->count();
            $post->user_reacted = Reaction::where('post_id', $post->id)
                ->where('user_id', $userId)
                ->exists();

            // Get comments for each post
            $post->comments = Comment::where('post_id', $post->id)
                ->with('user')
                ->get()
                ->map(function ($comment) {
                    $comment->user->points = $this->calculatePointsForUser($comment->user);
                    $comment->user->badge = $this->getUserBadge($comment->user->points);
                    return $comment;
                });
        }

        // Calculate points
        $points = $this->calculatePoints();

        // Get badge
        $totalPoints = $this->calculatePoints();
        $badge = $this->getUserBadge($totalPoints);

        // Get project count
        $projectCount = $this->countProjects();

        $friendRequestController = new FriendRequestController();
        $connectedStudentsCount = $friendRequestController->getConnectedStudentsCount();

        return view('student.studentProf', compact('connectedStudentsCount', 'authUser', 'user', 'userProjects', 'userSkills', 'userAcademics', 'userHonorsAndAwards', 'userPosts', 'projectCount', 'points', 'userInterests', 'pinnedProjects', 'bio', 'totalPoints', 'badge','userPoints'));
    }
    //asd
    public function studentOtherProfile(User $user)  // Add User parameter
    {
        $authUser = Auth::user();
        $userId = Auth::id();
        $userPoints = $this->calculatePointsForUser($user);
        $badge = $this->getUserBadge($userPoints);
        
        // Get user's posts with reactions
        $userPosts = $user->userPosts;
        
        // Add reaction count and user reaction status to each post
        foreach ($userPosts as $post) {
            $post->user->points = $this->calculatePointsForUser($post->user);
            $post->user->badge = $this->getUserBadge($post->user->points);

            $post->reaction_count = Reaction::where('post_id', $post->id)->count();
            $post->user_reacted = Reaction::where('post_id', $post->id)
                ->where('user_id', $userId)
                ->exists();

            // Get comments for each post
            $post->comments = Comment::where('post_id', $post->id)
                ->with('user')
                ->get()
                ->map(function ($comment) {
                    $comment->user->points = $this->calculatePointsForUser($comment->user);
                    $comment->user->badge = $this->getUserBadge($comment->user->points);
                    return $comment;
                });
        }

        // Get user data
        $userProjects = $user->userProjects;
        $userSkills = $user->userSkills;
        $userAcademics = $user->userAcademics;
        $userHonorsAndAwards = $user->userHonorsAndAwards;
        $userInterests = $user->interests;
        
        // Get bio
        $bio = Bio::where('user_id', $user->id)->first();
        
        // Get pinned projects
        $pinnedProjects = PinnedProject::with('project')
            ->where('user_id', $user->id)
            ->get();

        // Your existing calculations
        $points = $this->calculatePoints();
        $friendRequestController = new FriendRequestController();
        $connectedStudentsCount = $friendRequestController->getConnectedStudentsCount();
        $projectCount = $this->countProjects();
        
        // Calculate total points and get badge if needed
        $totalPoints = $this->calculatePoints();
        $badge = $this->getUserBadge($totalPoints);

        foreach ($userPosts as $post) {
            $post->reaction_count = Reaction::where('post_id', $post->id)->count();
            $post->user_reacted = Reaction::where('post_id', $post->id)
                ->where('user_id', $userId)
                ->exists();
        
            // Get comments and calculate badges for comment users
            $post->comments = Comment::where('post_id', $post->id)
                ->with('user')
                ->get()
                ->map(function ($comment) {
                    $comment->user->points = $this->calculatePointsForUser($comment->user);
                    $comment->user->badge = $this->getUserBadge($comment->user->points);
                    return $comment;
                });
        }

        return view('profile.show', compact(
            'user',
            'userPosts',
            'userProjects',
            'userSkills',
            'userAcademics',
            'userHonorsAndAwards',
            'userInterests',
            'pinnedProjects',
            'bio',
            'points',
            'connectedStudentsCount',
            'projectCount',
            'totalPoints',
            'badge',
            'userPoints'
        ));
    }

    public function removePinnedProject($id)
    {
        $pinnedProject = PinnedProject::where('id', $id)->where('user_id', Auth::id())->first();

        if ($pinnedProject) {
            $pinnedProject->delete();
        }

        return redirect()->back()->with('success', 'Pinned project removed successfully.');
    }

    public function pinProjects(Request $request)
    {
        $user = Auth::user();

        // Save new pinned projects
        if ($request->has('pinned_projects')) {
            foreach ($request->pinned_projects as $projectId) {
                PinnedProject::create([
                    'user_id' => $user->id,
                    'project_id' => $projectId,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Pinned projects updated successfully!');
    }

    public function updateBio(Request $request, $userId)
    {
        $request->validate([
            'bio' => 'nullable|string|max:1000', // Validation rules
        ]);

        // Find or create the bio entry for the user
        $bio = Bio::updateOrCreate(['user_id' => $userId], ['bio' => $request->input('bio')]);

        return redirect()->back()->with('success', 'Bio updated successfully!');
    }

    public function removeBio($userId)
    {
        // Find the user's bio and delete it
        $bio = Bio::where('user_id', $userId)->first();

        if ($bio) {
            $bio->delete(); // Delete the bio record
            return redirect()->back()->with('success', 'Bio removed successfully.');
        }

        return redirect()->back()->with('error', 'No bio found to remove.');
    }

    public function countProjects()
    {
        $user = Auth::user();
        $projectCount = $user->userPosts->count(); // Adjust if the relationship is named differently

        return $projectCount;
    }

    //asd
    public function studentDashboard(Request $request)
    {
        $query = $request->input('query');

        $authUser = User::where('first_name', 'LIKE', "%{$query}%")
            ->orWhere('last_name', 'LIKE', "%{$query}%")
            ->get();

        // Fetch all users and calculate their points
        $users = User::all()->map(function ($user) {
            $user->points = $this->calculatePointsForUser($user);
            $user->badge = $this->getUserBadge($user->points);
            return $user;
        });

        
        // Get the top 3 users based on points
        $topUsers = $users->sortByDesc('points')->take(3);

        $userId = Auth::id();
        $user = Auth::user();
        $userPoints = $this->calculatePointsForUser($user);
        $badge = $this->getUserBadge($userPoints);
        $userProjects = $user->userProjects;
        $userSkills = $user->userSkills;
        $userAcademics = $user->userAcademics;
        $userHonorsAndAwards = $user->userHonorsAndAwards;

        // Get IDs of connected users
        $connectedUserIds = FriendRequest::where(function ($query) use ($userId) {
            $query->where('sender_id', $userId)->orWhere('receiver_id', $userId);
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

        // Get posts with visibility handling
        $allPosts = UserPosts::where(function ($query) use ($userId, $connectedUserIds) {
            $query->where('visibility', 'public')
                ->orWhere(function ($subQuery) use ($userId, $connectedUserIds) {
                    // Private posts visible only to connected users and the post owner
                    $subQuery->where('visibility', 'private')
                            ->whereIn('user_id', $connectedUserIds);
                });
        })->get();

        // Calculate relevance score for each post
        $scoredPosts = $allPosts->map(function ($post) use ($userInterests) {
            $interestScore = in_array($post->category, $userInterests) ? 50 : 0;
            $timeScore = 100 - min($post->created_at->diffInHours(now()), 100);
            $post->relevanceScore = $interestScore + $timeScore;
            return $post;
        });

        // Sort posts by relevance score
        $sortedPosts = $scoredPosts->sortByDesc('relevanceScore');

        // Separate posts into two collections: matching interests and non-matching
        $matchingPosts = $sortedPosts->filter(function ($post) use ($userInterests) {
            return in_array($post->category, $userInterests);
        });
        $nonMatchingPosts = $sortedPosts->diff($matchingPosts);

        // Merge the collections, with matching posts first
        $userPosts = $matchingPosts->merge($nonMatchingPosts);

        // Add reaction count, user reaction status, and comments to each post
        foreach ($userPosts as $post) {
            $post->user->points = $this->calculatePointsForUser($post->user);
            $post->user->badge = $this->getUserBadge($post->user->points);

            $post->reaction_count = Reaction::where('post_id', $post->id)->count();
            $post->user_reacted = Reaction::where('post_id', $post->id)
                ->where('user_id', $userId)
                ->exists();

            // Get comments for each post
            $post->comments = Comment::where('post_id', $post->id)
                ->with('user')
                ->get()
                ->map(function ($comment) {
                    $comment->user->points = $this->calculatePointsForUser($comment->user);
                    $comment->user->badge = $this->getUserBadge($comment->user->points);
                    return $comment;
                });
        }

        $friendRequestController = new FriendRequestController();
        $connectedStudentsCount = $friendRequestController->getConnectedStudentsCount();

        // Calculate points
        $points = $this->calculatePoints();

        // Get badge
        $totalPoints = $this->calculatePoints();
        $badge = $this->getUserBadge($points);

        // Get project count
        $projectCount = $this->countProjects();

        // Find other students with similar interests
        $studentInterest = User::whereHas('interests', function ($query) use ($userInterests) {
            $query->whereIn('interest_name', $userInterests);
        })
            ->where('id', '!=', $userId) // Exclude the logged-in user
            ->whereNotIn('id', $connectedUserIds) //Exclude connected users
            ->inRandomOrder() // Shuffle the results
            ->take(5) // Limit to 5 users
            ->get();

        return view('student.studentDashboard', compact('connectedStudentsCount', 'authUser', 'user', 'userProjects', 'userSkills', 'userAcademics', 'userHonorsAndAwards', 'userPosts', 'points', 'projectCount', 'topUsers', 'userInterests', 'studentInterest', 'badge',  'totalPoints', 'userPoints'));
    }

    public function calculatePoints()
    {
        $user = Auth::user();

        // Calculate total points
        $postPoints = $user->userPosts->count() * 30;

        // Calculate connection points
        $connectionPoints =
            FriendRequest::where(function ($query) use ($user) {
                $query->where('sender_id', $user->id)->orWhere('receiver_id', $user->id);
            })
                ->where('status', 'accepted')
                ->count() * 20;

        // Calculate reaction points only for user's own posts or those liked on their posts
        $userPostIds = $user->userPosts->pluck('id');
        $reactionPointsFromOwnPosts = Reaction::whereIn('post_id', $userPostIds)->count() * 10; // Reactions on user's own posts
        $reactionPointsReceived =
            Reaction::where('user_id', $user->id)
                ->whereIn('post_id', $userPostIds)
                ->count() * 10; // Likes received on user's posts

        // Combine points for reactions
        $reactionPoints = $reactionPointsFromOwnPosts + $reactionPointsReceived;

        // Calculate comment points (15 points for each comment on the user's posts)
        $commentPoints = Comment::whereHas('post', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->count() * 15;

        // Add quiz points
        $quizPoints = QuizPoints::where('user_id', $user->id)->sum('points');

        // Total points including comments
        $totalPoints = $postPoints + $connectionPoints + $reactionPoints + $commentPoints + $quizPoints;

        return $totalPoints;
    }
   

    private function calculatePointsForUser($user)
    {
        // Calculate total points for a given user
        $postPoints = $user->userPosts->count() * 30;

        // Calculate connection points
        $connectionPoints =
            FriendRequest::where(function ($query) use ($user) {
                $query->where('sender_id', $user->id)->orWhere('receiver_id', $user->id);
            })
                ->where('status', 'accepted')
                ->count() * 20;

        // Get the user's posts
        $userPostIds = $user->userPosts->pluck('id');

        // Calculate reaction points only for user's own posts or those liked on their posts
        $reactionPointsFromOwnPosts = Reaction::whereIn('post_id', $userPostIds)->count() * 10; // Reactions on user's own posts
        $reactionPointsReceived =
            Reaction::where('user_id', $user->id)
                ->whereIn('post_id', $userPostIds)
                ->count() * 10; // Likes received on user's posts

        // Combine points for reactions
        $reactionPoints = $reactionPointsFromOwnPosts + $reactionPointsReceived;

        // Calculate comment points (15 points for each comment on the user's posts)
        $commentPoints = Comment::whereHas('post', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->count() * 15;

        // Add quiz points
        $quizPoints = QuizPoints::where('user_id', $user->id)->sum('points');

        // Total points including comments
        $totalPoints = $postPoints + $connectionPoints + $reactionPoints + $commentPoints + $quizPoints;

        return  $totalPoints;
    }
    
    public function studentLeaderboard(Request $request)
    {
        $query = $request->input('query');

        
        // Retrieve all users except the admin
        $users = User::where('user_type_id', '!=', 1) // Exclude admin by user_type_id
            ->get()
            ->map(function ($user) {
                // Calculate points for the user
                $user->points = $this->calculatePointsForUser($user);

                // Calculate number of connected users
                $user->connectedUsersCount = FriendRequest::where(function ($query) use ($user) {
                    $query->where('sender_id', $user->id)->orWhere('receiver_id', $user->id);
                })
                    ->where('status', 'accepted')
                    ->count();

                // Calculate total number of likes (reactions) across all user posts
                $user->totalLikes = Reaction::whereIn('post_id', $user->userPosts->pluck('id'))->count();

                // Assign badge based on points for each user
                $user->badge = $this->getUserBadge($user->points);

                return $user;
            });
        
            // Fetch all users and calculate their points
        $users = User::all()->map(function ($user) {
            $user->points = $this->calculatePointsForUser($user);

            $user->badge = $this->getUserBadge($user->points);
            return $user;
        });
        
        // Sort users by points and assign ranks
        $users = $users->sortByDesc('points')
        ->values() // Reset array keys
        ->map(function ($user, $index) {
            $user->rank = $index + 1; // Assign sequential rank
            return $user;
        });
               

        // If the query is provided and not empty, filter the users
        if (!empty($query)) {
            $users = $users->filter(function ($user) use ($query) {
                return stripos($user->first_name, $query) !== false || stripos($user->last_name, $query) !== false;
            });
        }

        // Sort users by points regardless of whether filtering was done
        $users = $users->sortByDesc('points'); // Sort after filtering

        // Calculate points
        $points = $this->calculatePoints();
     
         // Implement pagination
        $perPage = 10;
        $currentPage = $request->input('page', 1);
        $paginator = new LengthAwarePaginator(
            $users->forPage($currentPage, $perPage),
            $users->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        // Get badge
        $totalPoints = $this->calculatePoints();
        $badge = $this->getUserBadge($points);

        // Get the authenticated user's information
        $authUser = Auth::user();
        $userProjects = $authUser->userProjects;
        $userSkills = $authUser->userSkills;
        $userAcademics = $authUser->userAcademics;
        $userHonorsAndAwards = $authUser->userHonorsAndAwards;
        $userPosts = $authUser->userPosts;
        $userCount = User::count();
        // Return the view with the sorted users
        return view('student.studentLeaderboard', [
            'userCount' => $userCount,
            'users' => $paginator,
            'authUser' => $authUser,
            'userProjects' => $userProjects,
            'userSkills' => $userSkills,
            'userAcademics' => $userAcademics,
            'userHonorsAndAwards' => $userHonorsAndAwards,
            'userPosts' => $userPosts,
            'points' => $points,
            'badge' => $badge,
            'totalPoints' => $totalPoints

        ]);
    }

    public function getUserBadge($totalPoints)
    {
        // Get all users and their total points
        $allUsers = User::all();
        $allUserPoints = $allUsers->map(function ($user) {
            return $this->calculatePointsForUser($user);
        })->values();

        // Sort points in descending order
        $sortedPoints = $sortedPoints = $allUserPoints->sortDesc()->values();
        
        // Calculate total users
        $totalUsers = $sortedPoints->count();
        
        // Find the position of the current user's points (1-based index)
        $position = $sortedPoints->search($totalPoints) + 1;
        
        // Calculate percentile (percentage from top)
        $percentile = ($position / $totalUsers) * 100;
        
        // Determine badge based on percentile position from top
        if ($percentile <= 5) {
            return 'Gold';      // Top 5% get Gold
        } elseif ($percentile <= 10) {
            return 'Silver';    // Next 5% (6-10%) get Silver
        } elseif ($percentile <= 20) {
            return 'Bronze';    // Next 10% (11-20%) get Bronze
        } else {
            return 'No Badge';  // Remaining 80% get no badge
        }
    }


    public function searchUser(Request $request)
    {
        $query = $request->input('query');

        // Search for users and categories
        $users = User::where('id', '!=', auth()->id()) // Exclude authenticated user
            ->where('user_type_id', '!=', 1) // Exclude admin users
            ->where(function($q) use ($query) {
                $q->where('first_name', 'LIKE', "%{$query}%")
                ->orWhere('last_name', 'LIKE', "%{$query}%");
            })
            ->limit(5)
            ->get(['id', 'first_name', 'last_name', 'image']); // Only select the fields you need

        $categories = DB::table('posts')
            ->select('category')
            ->distinct()
            ->where('category', 'LIKE', "%{$query}%")
            ->pluck('category'); // Get distinct categories matching the query

        return response()->json([
            'users' => $users,
            'categories' => $categories
        ]);
 

    }


    public function adminusers()
    {
        $users = User::all();

        $user = Auth::user();

        return view('admin.users', compact('users', 'user'));
    }

    public function store(Request $request): RedirectResponse|JsonResponse
    {
        toastr()->success('');
        $validated = $request->validate([
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'email' => 'required',
            'password' => 'required',
            'birthdate' => 'nullable',
            'full_address' => 'nullable',
            'user_type_id' => 'required|numeric',
            'sex ' => 'required',
            'public_url' => 'nullable',
        ]);

        try {
            // Your code that may throw an exception
            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->birthdate = $request->birthdate;
            $user->full_address = $request->full_address;
            $user->user_type_id = $request->user_type_id;

            if ($request->user_type_id == 1) {
                $user->balance = null;
            }

            $user->email = $request->email;
            $user->password = $request->password;

            $user->saveOrFail();

            return redirect()->back();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the exception, for example, return a response or log it
            return response()->json(['error' => 'No Found Record'], 404);
        } catch (\Exception $e) {
            // Handle other types of exceptions
            // Log the exception or return a generic error response
            Log::error($e->getMessage());
            toastr()->error('An error has occurred please try again later.');
            return back();
        }
    }

    public function delete(Request $request): RedirectResponse
    {
        try {
            // Your code that mayf throw an exception
            return redirect()->back();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the exception, for example, return a response or log it
            return response()->json(['error' => 'No Found Record'], 404);
        } catch (\Exception $e) {
            // Handle other types of exceptions
            // Log the exception or return a generic error response
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function edit(Request $request): View
    {
        try {
            // Your code that may throw an exception
            $user = User::findOrFail($request->id);
            return view('admin.edituser', compact('user'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the exception, for example, return a response or log it
            return response()->json(['error' => 'No Found Record'], 404);
        } catch (\Exception $e) {
            // Handle other types of exceptions
            // Log the exception or return a generic error response
            Log::error($e->getMessage());
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }

   

    public function update(Request $request, User $user): RedirectResponse
    {
        try {
            // Your code that may throw an exception
            $user = User::findOrFail($request->id);
            $user->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'birthdate' => $request->birthdate,
                'full_address' => $request->full_address,
                'email' => $request->email,
                'user_type_id' => $request->user_type_id,
                'password' => Hash::make($request->password),
            ]);
            return redirect()->back();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'No Found Record'], 404);
        } catch (\Exception $e) {
            // Handle other types of exceptions
            // Log the exception or return a generic error response
            Log::error($e->getMessage());
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }

    public function quiz()
    {
        return view('quiz.quiz');
    }

    public function updateProfileImage(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $user = User::findOrFail(auth()->id()); // Ensure it's retrieved properly

        // Delete the old image if exists
        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }

        // Store the new image
        $imagePath = $request->file('image')->store('profile_images', 'public');

        // Update the user's image path
        $user->update(['image' => $imagePath]); // Correct syntax here

        return redirect()->back()->with('success', 'Profile image updated successfully.');
    }


    public function deleteProfileImage(Request $request)
    {
        $user = User::findOrFail(auth()->id()); // Ensure $user is properly retrieved

        // Delete the existing image from storage if it exists
        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }

        // Set the image column to null
        $user->update(['image' => null]); // Correct syntax here

        return redirect()->back()->with('success', 'Profile image deleted successfully.');
    }



    
}
