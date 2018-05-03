<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;

class PostsController extends Controller
{
    public function __construct(){
      $this->middleware('auth')->except(['index', 'show']);
    }

    public function index() 
    {
      //index(Tag $tag = null) return $tag->posts;
      
      $posts = Post::latest() //orderBy('created_at', 'desc')
        ->filter(request(['month', 'year']))
        ->get();
        
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
        ]);
        
        auth()->user()->publish(
          new Post(request(['title', 'body'])
        )); //19 14:00 
        
        /*Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->id() // auth()->user()->id()
        ]);*/
        
        return redirect('/posts')->with('success', 'Post Created');
        // Validate request
        // Create a new post using the request data; $post = new Post or Post::create([]);
        // Save it to the database
        // And then redirect (to the homepage)
    }
    
    public function show(Post $post) 
    {
      //$post = Post::find($post->id);
      return view('posts.show', compact('post'));
    }
    
}
