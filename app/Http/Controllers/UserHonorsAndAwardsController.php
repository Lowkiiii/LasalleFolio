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

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string',
                'issuer' => 'required|string',
                'description' => 'required|string',
                'date_issue' => 'required|date',
            ]);
            
            $userHonorsAndAwards = UserHonorsAndAwards::findOrFail($id);

            if ($userHonorsAndAwards->user_id !== Auth::id()) {
                return redirect()->back()->with('error', 'You are not authorized to update this awards.');
            }

            $userHonorsAndAwards->title = $validatedData['title'];
            $userHonorsAndAwards->issuer = $validatedData['issuer'];
            $userHonorsAndAwards->description = $validatedData['description'];
            $userHonorsAndAwards->date_issue = $validatedData['date_issue'];
            $userHonorsAndAwards->save();

            return redirect()->route('studentProf')->with('flash_message', 'Awards updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating awards: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating the awards.']);
        }
    }
    public function destroy($id)
    {
        try {
            $userHonorsAndAwards = UserHonorsAndAwards::findOrFail($id);

            if ($userHonorsAndAwards->user_id !== Auth::id()) {
                return redirect()->back()->with('error', 'You are not authorized to delete this userHonorsAndAwards.');
            }

            $userHonorsAndAwards->delete();
            return redirect()->route('studentProf')->with('flash_message', 'userHonorsAndAwards deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting userHonorsAndAwards: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An error occurred while deleting the userHonorsAndAwards.']);
        }
    }
    
        
}