<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.welcome', [
            'posts' => Post::all(),
        ]);
    }

    public function create()
    {
        $post = Post::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->with('categories', $categories)
            ->with('tags', $tags)->with('posts', $post);
    }

    public function dashboard()
    {
        return view('dashboard', ['posts' => Post::all()->where('user_id', Auth::id())]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'excerpt' => ['required'],
            'description' => ['required'],
            'category' => ['required'],
            'tag' => ['required']
        ]);

        DB::transaction(function () use ($request) {
            $post = new Post;
            $post->name = $request->title;
            $post->visit_count = 0;
            $post->excerpt = $request->excerpt;
            $post->description = $request->description;
            $post->user_id = Auth::id();
            $post->save();
            $post->category()->attach($request->category);
            $post->tags()->attach($request->tag);
        });

        return redirect()->route('dashboard', ['posts' => Post::all()->where('user_id', Auth::id())]);
    }

    public function show(Post $post)
    {
        $post->increment('visit_count');
        return view('posts.post', [
            'post' => $post,
        ]);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $post->save();
        return view('posts.edit', ['posts' => Post::where('id', $id)->get()]);
    }

    public function update(Request $request, $id)
    {
        $update = Post::find($id);
        $update->name = $request->edit;
        $update->description = $request->editDesc;
        $update->save();
        return redirect()->route('dashboard', ['posts' => Post::all()->where('user_id', Auth::id())]);
    }

    public function destroy($post)
    {
        Post::destroy($post);
        return redirect()->route('dashboard', ['posts' => Post::all()->where('user_id', Auth::id())]);
    }
}
