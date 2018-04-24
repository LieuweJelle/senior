<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index() 
    {
      return view('posts.index');
    }
    public function show(Post $post) 
    {
      //$post = Post::find($post->id);
      return view('posts.show', compact('post'));
    }
    public function create() 
    {
      
      return view('posts.create');
    }
    public function store() 
    {
        $this->validate($request, [
            'titel' => 'required',
            'body' => 'required',
        ]);
        // Create a new post using the request data
        //$post = new App/Post;
        // Save it to the database
        // And then redirect (to the homepage)
    }
}
