<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserPosts;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class UserPostController extends Controller
{
    //

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'user_posts' => 'required|string',
            ]);
    
            $userPost = new UserPosts();
            $userPost->user_posts = $validatedData['user_posts'];
            $userPost->user_id = Auth::id();
    
            $userPost->save();
    
            return redirect()->route('studentDashboard')->with('flash_message', 'Project Added!');
        } catch (\Exception $e) {
            Log::error('Error saving project: ' . $e->getMessage());
            return Redirect::back()->withErrors(['error' => 'An error occurred while saving the project.']);
        }
    }

    public function index()
    {
        $userPost = Auth::user()->userPost;
        return view('student.studentDashboard', compact('userPosts'));
    }
}
