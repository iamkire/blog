<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    public function index(Tag $tag)
    {
        $posts = $tag->posts;
        return view('posts.welcome', compact('posts'));
    }

    public function create()
    {
        return view('tags.tag');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tag' => ['required']
        ]);
        $tag = new Tag;
        $tag->name = $request->tag;
        $tag->save();
        return redirect()->route('dashboard', ['posts' => Post::all()->where('user_id', Auth::id())]);
    }
}
