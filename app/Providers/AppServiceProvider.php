<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		view()->composer('posts.sidebar', function($view){
          //$view->with('archives', \App\Post::archives()); 
          //$view->with('roles', \App\Role::has('users')->pluck('name'));
          $archives = \App\Post::archives();
          $roles = \App\Role::has('users')->pluck('name');
          $tags = \App\Tag::has('posts')->pluck('name');
          $view->with(compact('archives', 'roles', 'tags'));
        }); //layouts.sidebar?UC


        Schema::defaultStringLength(191);
		}

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
