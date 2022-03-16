<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       view()->composer('posts.welcome', function($view){
           $view->with('tags',Tag::has('posts')->pluck('name'));
           $view->with('categories',Category::has('post')->pluck('name'));
       });
    }
}
