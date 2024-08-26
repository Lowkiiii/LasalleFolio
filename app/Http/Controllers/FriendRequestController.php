<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FriendRequest;

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
}
