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

        return response()->json($comment);
    }

    public function index(UserPosts $post)
    {
        $comments = $post->comments()->with('user')->get();
        return response()->json($comments);
    }
}
