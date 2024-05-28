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

    public function update(Request $request, UserSkills $userSkill, $id)
    {
        try {
            $validatedData = $request->validate([
                'skills' => 'required|string',
                'description' => 'required|string',
            ]);

            $userSkills = UserSkills::findOrFail($id);

                if ($userSkills->user_id !== Auth::id()) {
                    return redirect()->back()->with('error', 'You are not authorized to update this skills.');
                }

                $userSkills->skills = $validatedData['skills'];
                $userSkills->description = $validatedData['description'];
                $userSkills->save();


                return redirect()->route('studentProf')->with('flash_message', 'Skills updated successfully!');
            } catch (\Exception $e) {
                Log::error('Error updating skills: ' . $e->getMessage());
                return redirect()->back()->withErrors(['error' => 'An error occurred while updating the skills.']);
            }
    }

    public function destroy($id)
    {
        try {
            $userSkills = UserSkills::findOrFail($id);

            if ($userSkills->user_id !== Auth::id()) {
                return redirect()->back()->with('error', 'You are not authorized to delete this skill.');
            }

            $userSkills->delete();
            return redirect()->route('studentProf')->with('flash_message', 'Skill deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting Skill: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An error occurred while deleting the skill.']);
        }
    }

        
}