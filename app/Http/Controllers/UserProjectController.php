<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserProject;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class UserProjectController extends Controller
{

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'project' => 'required|string',
                'description' => 'required|string',
                'date_started' => 'required|date',
                'date_ended' => 'nullable|date',
            ]);
    
            $userProject = new UserProject();
            $userProject->project = $validatedData['project'];
            $userProject->description = $validatedData['description'];
            $userProject->date_started = $validatedData['date_started'];
            $userProject->date_ended = $validatedData['date_ended'] ?? null;
            $userProject->user_id = Auth::id();
    
            $userProject->save();
    
            return redirect()->route('studentProf')->with('flash_message', 'Project Added!');
        } catch (\Exception $e) {
            Log::error('Error saving project: ' . $e->getMessage());
            return Redirect::back()->withErrors(['error' => 'An error occurred while saving the project.']);
        }
    }


    public function index()
    {
        $userProjects = Auth::user()->userProjects;
        return view('student.studentProf', compact('userProjects'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'project' => 'required|string',
                'description' => 'required|string',
                'date_started' => 'required|date',
                'date_ended' => 'nullable|date',
            ]);

            $userProject = UserProject::findOrFail($id);

            if ($userProject->user_id !== Auth::id()) {
                return redirect()->back()->with('error', 'You are not authorized to update this project.');
            }

            $userProject->project = $validatedData['project'];
            $userProject->description = $validatedData['description'];
            $userProject->date_started = $validatedData['date_started'];
            $userProject->date_ended = $validatedData['date_ended'] ?? null;
            $userProject->save();

            return redirect()->route('studentProf')->with('flash_message', 'Project updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating project: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating the project.']);
        }
    }

    public function destroy($id)
    {
        try {
            $userProject = UserProject::findOrFail($id);

            if ($userProject->user_id !== Auth::id()) {
                return redirect()->back()->with('error', 'You are not authorized to delete this project.');
            }

            $userProject->delete();
            return redirect()->route('studentProf')->with('flash_message', 'Project deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting project: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An error occurred while deleting the project.']);
        }
    }
        
}