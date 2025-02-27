<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentsRequest;
use App\Http\Requests\UpdateCommentsRequest;

class CommentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        Comments::create([
            'post_id' => $post->id,
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        return back()->with('success', 'comment added!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comments $comment)
    {
        if (Auth::id() !== $comment->user_id) {
            return back()->with('error', "you can't delete comment");
        }

        $comment->delete();
        return back()->with('success', 'Comment deleted');
    }
}
