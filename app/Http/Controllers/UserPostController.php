<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserPosts;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

class UserPostController extends Controller
{
    //

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'user_posts' => 'required|string',
            ]);
    
            $userPosts = new UserPosts();
            $userPosts->user_posts = $validatedData['user_posts'];
            $userPosts->user_id = Auth::id();
    
            $userPosts->save();
    
            return redirect()->route('studentDashboard')->with('flash_message', 'Post Added!');
        } catch (\Exception $e) {
            Log::error('Error saving post: ' . $e->getMessage());
            return Redirect::back()->withErrors(['error' => 'An error occurred while saving the posts.']);
        }
    }

    public function index()
    {
        $user = Auth::user();
        $userPosts = $user->userPosts;
        return view('student.studentDashboard', compact('userPosts'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'user_posts' => 'required|string',
            ]);

            $userPosts = UserPosts::findOrFail($id);

            if ($userPosts->user_id !== Auth::id()) {
                return redirect()->back()->with('error', 'You are not authorized to update this post.');
            }

            $userPosts->user_posts = $validatedData['user_posts'];
            $userPosts->save();


            return redirect()->route('studentProf')->with('flash_message', 'Post updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating post: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating the post.']);
        }
    }

    public function destroy($id)
    {
        try {
            $userPosts = UserPosts::findOrFail($id);

            if ($userPosts->user_id !== Auth::id()) {
                return redirect()->back()->with('error', 'You are not authorized to delete this post.');
            }

            $userPosts->delete();
            return redirect()->route('studentProf')->with('flash_message', 'post deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting post: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An error occurred while deleting the post.']);
        }
    }

}
