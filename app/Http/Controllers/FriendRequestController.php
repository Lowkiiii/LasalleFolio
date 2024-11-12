<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FriendRequest;
use Illuminate\Support\Facades\DB;


class FriendRequestController extends Controller
{
    public function sendRequest(Request $request, $receiver_id)
    {
        $existingRequest = FriendRequest::where([
            ['sender_id', auth()->id()],
            ['receiver_id', $receiver_id]
        ])->first();

        if ($existingRequest) {
            return back()->with('error', 'Friend request already sent.');
        }

        FriendRequest::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $receiver_id,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Friend request sent successfully!');
        
    }

    public function acceptRequest($id)
    {
        $friendRequest = FriendRequest::find($id);

        if (!$friendRequest) {
            return back()->with('error', 'Friend request not found.');
        }

        $friendRequest->update(['status' => 'accepted']);

        return back()->with('success', 'Friend request accepted.');
    }

    public function rejectRequest($id)
    {
        $friendRequest = FriendRequest::find($id);

        if (!$friendRequest) {
            return back()->with('error', 'Friend request not found.');
        }

        $friendRequest->update(['status' => 'rejected']);

        return back()->with('success', 'Friend request rejected.');
    }

    public function unfriend($receiver_id)
    {
        // Find the friend request where the users are connected
        $friendRequest = FriendRequest::where(function ($query) use ($receiver_id) {
            $query->where('sender_id', auth()->id())
                ->where('receiver_id', $receiver_id);
        })->orWhere(function ($query) use ($receiver_id) {
            $query->where('receiver_id', auth()->id())
                ->where('sender_id', $receiver_id);
        })->where('status', 'accepted')->first();

        if ($friendRequest) {
            $friendRequest->delete();
            return back()->with('success', 'Unfriended successfully.');
        }

        return back()->with('error', 'Friend not found.');
    }
    public function getConnectedStudentsCount()
    {
        $userId = auth()->id();
        
        $count = FriendRequest::where(function ($query) use ($userId) {
            $query->where('sender_id', $userId)
                ->orWhere('receiver_id', $userId);
        })
        ->where('status', 'accepted')
        ->count();

        return $count;
    }

    // public function connectAllUsers()
    // {
    //     try {
    //         DB::beginTransaction();

    //         // First, accept all pending requests
    //         FriendRequest::where('status', 'pending')
    //             ->update(['status' => 'accepted']);

    //         // Get all users except admins
    //         $users = DB::table('users')
    //             ->where('user_type_id', '!=', 1)
    //             ->pluck('id');

    //         // Connect users who don't have any connection yet
    //         foreach ($users as $sender_id) {
    //             foreach ($users as $receiver_id) {
    //                 if ($sender_id !== $receiver_id) {
    //                     // Check if any connection exists (pending, accepted, or rejected)
    //                     $existingRequest = FriendRequest::where(function($query) use ($sender_id, $receiver_id) {
    //                         $query->where('sender_id', $sender_id)
    //                              ->where('receiver_id', $receiver_id);
    //                     })->orWhere(function($query) use ($sender_id, $receiver_id) {
    //                         $query->where('sender_id', $receiver_id)
    //                              ->where('receiver_id', $sender_id);
    //                     })->first();

    //                     if (!$existingRequest) {
    //                         // Create new connection if none exists
    //                         FriendRequest::create([
    //                             'sender_id' => $sender_id,
    //                             'receiver_id' => $receiver_id,
    //                             'status' => 'accepted',
    //                         ]);
    //                     }
    //                 }
    //             }
    //         }

    //         DB::commit();
    //         return "All users have been connected successfully, including pending requests.";

    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return "Error occurred: " . $e->getMessage();
    //     }
    // }



}
