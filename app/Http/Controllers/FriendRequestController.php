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

    // public function showStudentProfile()
    // {
    //     $connectedStudentsCount = $this->getConnectedStudentsCount();
    //     return view('student.studentProf', compact('connectedStudentsCount'));
    // }
}
