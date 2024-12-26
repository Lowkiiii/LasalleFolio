<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PinnedProject;
use Illuminate\Support\Facades\Auth;
use App\Models\UserPosts;
use App\Models\FriendRequest;
use App\Models\Reaction;
use App\Models\Comment;
use App\Models\Interest;
use App\Models\Bio;
use App\Models\QuizPoints;

use App\Http\Controllers\FriendRequestController;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        $userProjects = $user->userProjects;
        $userSkills = $user->userSkills;
        $userAcademics = $user->userAcademics;
        $userHonorsAndAwards = $user->userHonorsAndAwards;
        $userPosts = $user->userPosts;
        $authUser = Auth::user();
        $authUserId = Auth::id(); // Get the logged-in user's ID
        $userPoints = $this->calculatePointsForUser($user);
        $badge = $this->getUserBadge($userPoints);


        // Retrieve userPosts ordered by the most recent `created_at` timestamp
        $userPosts = UserPosts::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();
            
        // Add reaction data to each post
        foreach ($userPosts as $post) {
            $post->reaction_count = Reaction::where('post_id', $post->id)->count();
            $post->user_reacted = Reaction::where('post_id', $post->id)
                ->where('user_id', $authUserId)
                ->exists();

            // Get comments for each post
            $post->comments = Comment::where('post_id', $post->id)
                ->with('user')
                ->get();
        }

        // Calculate points
        $points = $this->calculatePoints($user->id);

        // Count projects for the specific user
        $projectCount = $this->countProjects($user->id);

        // Get connected students count for the specific user
        $connectedStudentsCount = $this->getConnectedStudentsCount($user->id);

        $pinnedProjects = PinnedProject::with('project')
            ->where('user_id', $user->id)
            ->get();

        // Get the user's bio
        $bio = Bio::where('user_id', $user->id)->first();

        $userId = Auth::id();

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


        return view('profile.show', compact(
            'user',
            'userProjects',
            'userSkills',
            'userAcademics',
            'userHonorsAndAwards',
            'userPosts',
            'pinnedProjects',
            'authUser',
            'points',
            'projectCount',
            'connectedStudentsCount',
            'bio',
            'userId',
            'userPoints',
            'badge'
        ));
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
    

    public function calculatePoints($userId)
    {
        // Calculate points for the specific user
        $user = User::findOrFail($userId);

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

        // Calculate comment points (15 points for each comment made by the user)
        $commentPoints = Comment::where('user_id', $user->id)->count() * 15;

        
        // Add quiz points
        $quizPoints = QuizPoints::where('user_id', $user->id)->sum('points');

        // Total points including comments
        $totalPoints = $postPoints + $connectionPoints + $reactionPoints + $commentPoints + $quizPoints;

        return $totalPoints;
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

    public function countProjects($userId)
    {
        $user = User::findOrFail($userId);
        $projectCount = $user->userPosts->count(); // Adjust if the relationship is named differently

        return $projectCount;
    }

    public function getConnectedStudentsCount($userId = null)
    {
        // If no userId is provided, use the authenticated user
        $user = $userId ? User::findOrFail($userId) : Auth::user();
        
        // Assuming you have a method or relationship to count connected students
        // This is a placeholder - you'll need to implement based on your specific connection logic
        $connectedStudentsCount = FriendRequest::where(function($query) use ($user) {
            $query->where('sender_id', $user->id)
                ->orWhere('receiver_id', $user->id);
        })
        ->where('status', 'accepted')
        ->count();

        return $connectedStudentsCount;
    }
   

}