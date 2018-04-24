<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function __construct(){
      $this->middleware('auth')->except(['index', 'show']);
    }

    public function index() 
    {
      $posts = Post::orderBy('created_at', 'desc')->get();
      return view('posts.index', compact('posts'));
    }
    public function create() 
    {
      return view('posts.create');
    }
    public function store() 
    {
        /*dd(request()->all());*/

        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
            //'user_id' => 'required'
        ]);
        
        //$post = new Post;
        /*$post->title = request('title');;
        $post->body = request('body');;
        $post->save();*/

        //Post::create(request(['title', 'body', 'user_id']));
        Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->id() 
        ]);
        return redirect('/posts')->with('success', 'Post Created');

        // Create a new post using the request data; $post = new Post;
        // Save it to the database
        // And then redirect (to the homepage)
    }
    public function show(Post $post) 
    {
      //$post = Post::find($post->id);
      return view('posts.show', compact('post'));
    }
}
