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
        
}