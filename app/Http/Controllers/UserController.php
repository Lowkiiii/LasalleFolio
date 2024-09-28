<?php

namespace App\Http\Controllers;

use App\Models\UserPosts;
use App\Models\FriendRequest;
use App\Models\Reaction;
use App\Models\Comment;
use App\Models\Interest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\FriendRequestController;
use App\Http\Controllers\CommentController; 
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        $user = Auth::user();

        if ($user->user_type_id == 1) {
            return view('admin.index', compact('users', 'user'))->with('admin.users', $users);
        } else if ($user->user_type_id == 2) {
            return view('student.studentDashboard', compact('user'));
        }
        
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
        
        // Add reaction count and user reaction status to each post
        foreach ($userPosts as $post) {
            $post->reaction_count = Reaction::where('post_id', $post->id)->count();
            $post->user_reacted = Reaction::where('post_id', $post->id)
                                        ->where('user_id', $userId)
                                        ->exists();

            // Get comments for each post
            $post->comments = Comment::where('post_id', $post->id)->with('user')->get();
        }

        // Calculate points
        $points = $this->calculatePoints();

        // Get project count
        $projectCount = $this->countProjects();

        $friendRequestController = new FriendRequestController();
        $connectedStudentsCount = $friendRequestController->getConnectedStudentsCount();

        return view('student.studentProf', compact(
            'connectedStudentsCount',
            'authUser',
            'user',
            'userProjects',
            'userSkills',
            'userAcademics',
            'userHonorsAndAwards',
            'userPosts',
            'projectCount',
            'points',
            'userInterests'
        ));
    }
    public function countProjects()
    {
        $user = Auth::user();
        $projectCount = $user->userPosts->count(); // Adjust if the relationship is named differently
        
        return $projectCount;
    }


    public function studentDashboard(Request $request)
    {
        $query = $request->input('query');
        
        $authUser = User::where('first_name', 'LIKE', "%{$query}%")
                        ->orWhere('last_name', 'LIKE', "%{$query}%")
                        ->get();

        // Fetch all users and calculate their points
        $users = User::all()->map(function ($user) {
            $user->points = $this->calculatePointsForUser($user);
            return $user;
        });

        // Get the top 3 users based on points
        $topUsers = $users->sortByDesc('points')->take(3);

        $userId = Auth::id();
        $user = Auth::user();
        $userProjects = $user->userProjects;
        $userSkills = $user->userSkills;
        $userAcademics = $user->userAcademics;
        $userHonorsAndAwards = $user->userHonorsAndAwards;

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
        $allPosts = UserPosts::whereIn('user_id', $connectedUserIds)->get();

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
            $post->reaction_count = Reaction::where('post_id', $post->id)->count();
            $post->user_reacted = Reaction::where('post_id', $post->id)
                                        ->where('user_id', $userId)
                                        ->exists();

            // Get comments for each post
            $post->comments = Comment::where('post_id', $post->id)->with('user')->get();
        }

        $friendRequestController = new FriendRequestController();
        $connectedStudentsCount = $friendRequestController->getConnectedStudentsCount();

        // Calculate points
        $points = $this->calculatePoints();

        // Get project count
        $projectCount = $this->countProjects();

        // Find other students with similar interests
        $studentInterest = User::whereHas('interests', function($query) use ($userInterests) {
            $query->whereIn('interest_name', $userInterests);
        })->where('id', '!=', $userId)// Exclude the logged-in user
        ->whereNotIn('id', $connectedUserIds) //Exlude connected users
        ->inRandomOrder() // Shuffle the results
        ->take(5) // Limit to 5 users
        ->get();

        return view('student.studentDashboard', compact('connectedStudentsCount', 'authUser', 'user', 'userProjects', 'userSkills', 'userAcademics', 'userHonorsAndAwards', 'userPosts', 'points', 'projectCount', 'topUsers', 'userInterests', 'studentInterest'));
    }

    public function calculatePoints()
    {
        $user = Auth::user();

        // Calculate total points
        $postPoints = $user->userPosts->count() * 30;
        $connectionPoints = FriendRequest::where(function ($query) use ($user) {
            $query->where('sender_id', $user->id)
                ->orWhere('receiver_id', $user->id);
        })->where('status', 'accepted')->count() * 20;
        $reactionPoints = Reaction::where('user_id', $user->id)->count() * 10;

        // Calculate comment points (15 points for each comment made by the user)
        $commentPoints = Comment::where('user_id', $user->id)->count() * 15;

        // Total points including comments
        $totalPoints = $postPoints + $connectionPoints + $reactionPoints + $commentPoints;

        return $totalPoints;
    }

    public function studentLeaderboard(Request $request)
    {
        $query = $request->input('query');
    
        // Retrieve all users and calculate their points, connections, and total likes
        $users = User::all()->map(function ($user) {
            $user->points = $this->calculatePointsForUser($user);
    
            // Calculate number of connected users
            $user->connectedUsersCount = FriendRequest::where(function ($query) use ($user) {
                $query->where('sender_id', $user->id)
                      ->orWhere('receiver_id', $user->id);
            })->where('status', 'accepted')->count();
    
            // Calculate total number of likes (reactions) across all user posts
            $user->totalLikes = Reaction::whereIn('post_id', $user->userPosts->pluck('id'))->count();
    
            return $user;
        })->sortByDesc('points');
    
        // Optionally filter based on query
        if ($query) {
            $users = $users->filter(function ($user) use ($query) {
                return stripos($user->first_name, $query) !== false ||
                       stripos($user->last_name, $query) !== false;
            });
        }
    
        // Get the authenticated user's information
        $user = Auth::user();
        $userProjects = $user->userProjects;
        $userSkills = $user->userSkills;
        $userAcademics = $user->userAcademics;
        $userHonorsAndAwards = $user->userHonorsAndAwards;
        $userPosts = $user->userPosts;
    
        // Return the view with the sorted users
        return view('student.studentLeaderboard', [
            'users' => $users,
            'authUser' => $user,
            'userProjects' => $userProjects,
            'userSkills' => $userSkills,
            'userAcademics' => $userAcademics,
            'userHonorsAndAwards' => $userHonorsAndAwards,
            'userPosts' => $userPosts,
        ]);
    }
    
    
    
    private function calculatePointsForUser($user)
    {
        // Calculate total points for a given user
        $postPoints = $user->userPosts->count() * 30;
        $connectionPoints = FriendRequest::where(function ($query) use ($user) {
            $query->where('sender_id', $user->id)
                  ->orWhere('receiver_id', $user->id);
        })->where('status', 'accepted')->count() * 20;
        $reactionPoints = Reaction::where('user_id', $user->id)->count() * 10;
        $commentPoints = Comment::where('user_id', $user->id)->count() * 15;
    
        return $postPoints + $connectionPoints + $reactionPoints + $commentPoints;
    }
    

    public function kerschProf(Request $request)
    {
        $query = $request->input('query');
        
        $authUser = User::where('first_name', 'LIKE', "%{$query}%")
                    ->orWhere('last_name', 'LIKE', "%{$query}%")
                    ->get();

        $user = Auth::user();
        $userProjects = $user->userProjects;
        $userSkills = $user->userSkills;
        $userAcademics = $user->userAcademics;
        $userHonorsAndAwards = $user->userHonorsAndAwards;
        $userPosts = $user->userPosts;

        return view('student.kerschProf', compact('authUser','user', 'userProjects', 'userSkills', 'userAcademics', 'userHonorsAndAwards', 'userPosts'));
    }

    public function searchUser(Request $request)
    {
        $query = $request->input('query');
    
        $users = User::where('first_name', 'LIKE', "%{$query}%")
                    ->orWhere('last_name', 'LIKE', "%{$query}%")
                    ->limit(5)
                    ->get(['id', 'first_name', 'last_name']); // Only select the fields you need

        return response()->json($users);
    }

   
    public function adminusers(){
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
            'user_type_id'=>'required|numeric',
            'sex '=>'required',
            'public_url'=>'nullable',
            
        ]);

        try {
            // Your code that may throw an exception
            $user = new User;
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

    public function delete(Request $request) : RedirectResponse
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

    public function edit(Request $request) : View
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

    public function update(Request $request, User $user) : RedirectResponse
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

    

}
