<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        $userProjects = $user->userProjects;
        $userSkills = $user->userSkills;
        $userAcademics = $user->userAcademics;
        $userHonorsAndAwards = $user->userHonorsAndAwards;
        $userPosts = $user->userPosts;

        return view('profile.show', compact('user', 'userProjects', 'userSkills', 'userAcademics', 'userHonorsAndAwards', 'userPosts'));
    }
}