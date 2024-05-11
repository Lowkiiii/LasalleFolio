<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserHonorsAndAwards;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;


class UserHonorsAndAwardsController extends Controller
{

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string',
                'issuer' => 'required|string',
                'description' => 'required|string',
                'date_issue' => 'required|date',
            ]);
    
            $userHonorsAndAwards = new UserHonorsAndAwards();
            $userHonorsAndAwards->title = $validatedData['title'];
            $userHonorsAndAwards->issuer = $validatedData['issuer'];
            $userHonorsAndAwards->description = $validatedData['description'];
            $userHonorsAndAwards->date_issue = $validatedData['date_issue'];
            $userHonorsAndAwards->user_id = Auth::id();
    
            $userHonorsAndAwards->save();
    
            return redirect()->route('studentProf')->with('flash_message', 'Honors and Awards Added!');
        } catch (\Exception $e) {
            Log::error('Error saving honors and awards: ' . $e->getMessage());
            return Redirect::back()->withErrors(['error' => 'An error occurred while saving the honors and awards.']);
        }
    }


    public function index()
    {
        $userHonorsAndAwards = Auth::user()->userHonorsAndAwards;
        return view('student.studentProf', compact('userHonorsAndAwards'));
    }
        
}