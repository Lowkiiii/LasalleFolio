<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserSkills;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class UserSkillsController extends Controller
{

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'skills' => 'required|string',
                'description' => 'required|string',
            ]);
    
            $userSkills = new UserSkills();
            $userSkills->skills = $validatedData['skills'];
            $userSkills->description = $validatedData['description'];
            $userSkills->user_id = Auth::id();
    
            $userSkills->save();
    
            return redirect()->route('studentProf')->with('flash_message', 'Skills Added!');
        } catch (\Exception $e) {
            Log::error('Error saving skill: ' . $e->getMessage());
            return Redirect::back()->withErrors(['error' => 'An error occurred while saving the skill.']);
        }
    }


    public function index()
    {
        $userSkills = Auth::user()->userSkills;
        return view('student.studentProf', compact('userSkills'));
    }
        
}