<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Post;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function index(Category $category)
    {
        $posts = $category->post;
        return view('posts.welcome',
            compact('posts'));
    }

    public function create()
    {
        return view('categories.create');
    }


    public function store(Category $category, Request $request)
    {
        $request->validate([
            'category' => ['required']
        ]);
        $category->name = $request->category;
        $category->save();
        return redirect()->route('dashboard', ['posts' => Post::all()->where('user_id', Auth::id())]);
    }

}
