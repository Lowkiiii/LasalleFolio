<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\UserPosts;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, UserPosts $post)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $comment = new Comment();
        $comment->user_id = auth()->id();
        $comment->post_id = $post->id;
        $comment->content = $request->content;
        $comment->save();

        $comment->load('user'); // Load the user relationship

        return response()->json([
            'user' => $comment->user->name,
            'content' => $comment->content,
        ]);
    }

    public function index(UserPosts $post)
    {
        $comments = $post->comments()->with('user')->get();
        return view('student.studentProf', compact('comments'));
    }
}
