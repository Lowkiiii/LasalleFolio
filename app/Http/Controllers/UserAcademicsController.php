<?php

namespace App\Http\Controllers;

use App\Models\UserAcademics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class UserAcademicsController extends Controller
{

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'education_insitution' => 'required|string',
                'course' => 'required|string',
                'major' => 'required|string',
                'date_started' => 'required|date',
                'date_ended' => 'nullable|date',
            ]);
    
            $userAcademics = new UserAcademics();
            $userAcademics->education_insitution = $validatedData['education_insitution'];
            $userAcademics->course = $validatedData['course'];
            $userAcademics->major = $validatedData['major'];
            $userAcademics->date_started = $validatedData['date_started'];
            $userAcademics->date_ended = $validatedData['date_ended'] ?? null;
            $userAcademics->user_id = Auth::id();
    
            $userAcademics->save();
    
            return redirect()->route('studentProf')->with('flash_message', 'Academic Added!');
        } catch (\Exception $e) {
            Log::error('Error saving academics: ' . $e->getMessage());
            return Redirect::back()->withErrors(['error' => 'An error occurred while saving the academics.']);
        }
    }


    public function index()
    {
        $userAcademics = Auth::user()->userAcademics;
        return view('student.studentProf', compact('userAcademics'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'education_insitution' => 'required|string',
                'course' => 'required|string',
                'major' => 'required|string',
                'date_started' => 'required|date',
                'date_ended' => 'nullable|date',
            ]);
            
            $userAcademics = UserAcademics::findOrFail($id);

            if ($userAcademics->user_id !== Auth::id()) {
                return redirect()->back()->with('error', 'You are not authorized to update this academics.');
            }

            $userAcademics->education_insitution = $validatedData['education_insitution'];
            $userAcademics->course = $validatedData['course'];
            $userAcademics->major = $validatedData['major'];
            $userAcademics->date_started = $validatedData['date_started'];
            $userAcademics->date_ended = $validatedData['date_ended'] ?? null;
            $userAcademics->save();

            return redirect()->route('studentProf')->with('flash_message', 'Academics updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating academics: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating the academics.']);
        }
    }

    public function destroy($id)
    {
        try {
            $userAcademics = userAcademics::findOrFail($id);

            if ($userAcademics->user_id !== Auth::id()) {
                return redirect()->back()->with('error', 'You are not authorized to delete this academics.');
            }

            $userAcademics->delete();
            return redirect()->route('studentProf')->with('flash_message', 'Academic deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting Academics: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An error occurred while deleting the Academic.']);
        }
    }
    
        
}