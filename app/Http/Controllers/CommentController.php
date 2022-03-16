<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Comment $comment, Request $request)
    {
        $request->validate([
            'comment' => 'required'
        ]);

        $comment->post_id = $request->id;
        $comment->user_id = $request->id;
        $comment->name = $request->comment;
        $comment->save();
        return back();

    }

    public function edit($comment)
    {
        return view('comment.edit', ['comments' => Comment::where('id', $comment)->get()]);
    }


    public function update(Post $post, Comment $comment)
    {

        $comment->name = request()->editComment;
        $comment->save();
        return redirect()->route('showPost', [
            'post' => $post
        ]);
    }

    public function destroy($comment)
    {
        Comment::destroy($comment);
        return back();
    }
}
