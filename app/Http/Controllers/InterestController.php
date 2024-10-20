<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class InterestController extends Controller
{
    public function showInterestsForm()
    {
        return view('student.selectInterests');
    }

    public function storeInterests(Request $request)
    {
        $request->validate([
            'interests' => 'required|array|min:3',
            'interests.*' => 'string|max:255',
        ]);

        $user = Auth::user();

        // Remove existing interests (if needed)
        Interest::where('user_id', $user->id)->delete();

        // Store new interests
        foreach ($request->interests as $interest) {
            Interest::create([
                'user_id' => $user->id,
                'interest_name' => $interest,
            ]);
        }

        // Redirect to the student profile route
        return redirect()->route('student.profile');
    }

    public function studentDashboard()
    {
        $user = Auth::user();
        // Get the interests of the logged-in user
        $userInterests = $user->interests->pluck('interest_name');

        // Find other students with similar interests
        $studentInterest = User::whereHas('interests', function($query) use ($userInterests) {
            $query->whereIn('interest_name', $userInterests);
        })->where('id', '!=', $user->id) // Exclude the logged-in user
        ->get();

        // Pass the students with similar interests to the view
        return view('student.studentDashboard', compact('studentInterest'));
    }

}
