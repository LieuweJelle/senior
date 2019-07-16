<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;
use App\Tag;

class PostsController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth')->except(['index', 'show']);
    }

    public function index() 
    {
      $posts = Post::latest() //orderBy('created_at', 'desc')
        ->filter(request(['month', 'year']))
        ->get();

        return view('posts.index', compact('posts'));
    }
    
    public function create() 
    {
      $tags = Tag::all();
      return view('posts.create', compact('tags'));
    }
    
    public function store(Request $request) 
    {
        /* dd(request()->all()); Even kijken wat binnen komt. JSON*/
        $newcat = false;
        if($request->input('text1') != "") {
            $newcat = true;
        }

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        
        // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
            //-> storage/app/public/ php artisan storage:link
        } /*else {
            $fileNameToStore = 'noimage.jpg';
        }*/
        
        // auth()->user()->publish(new Post(request(['title', 'body', 'subtitle', 'subbody', auth()->user()->id, $fileNameToStore]))); ???
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->subtitle = $request->input('subtitle');
        $post->subbody = $request->input('subbody');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();
        
        // Create New Tag
        if($newcat==true) {
            $tag = new Tag;
            $tag->name = $request->input('text1');
            $tag->save();
            $post->tags()->attach($tag); 
        } 
        
        if(!empty($request['cat'])) {
            foreach($request['cat'] as $selected) {
                $post->tags()->attach($selected); 
            }
        }
        
        session()->flash(
          'message', 'Your post has now been published.'
        );
        
        return redirect('/posts')->with('success', 'Post Created');
    }
    
    public function show(Post $post) 
    {
      //$post = Post::find($post->id); //niet nodig (Post $post)
      return view('posts.show', compact('post'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $tags = Tag::all();
        // Check for correct user
        if(auth()->user()->id != $post->user_id){
            if(auth()->user()->id == 1) {
                session(['message' => 'Only '.auth()->user()->name.' is authorized']);
            } else {
                session(['message' => 'Unauthorized edit action']);
                return redirect('/posts')->with('error', 'Unauthorized Page');
            }
        } else {
            session(['message' => ''.auth()->user()->name.' is authorized']);
        }
        return view('posts.edit', compact('post', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $newcat = false;
        if($request->input('text1') != "") {
            $newcat = true;
        }

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

         // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

        // Create Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->subtitle = $request->input('subtitle');
        $post->subbody = $request->input('subbody');
        if($request->hasFile('cover_image')){
            //Storage::delete('public/cover_images/' . $post->cover_image);
            $post->cover_image = $fileNameToStore;
        }
        $post->save();
        
        $post->tags()->detach();
        // Create New Tag
        if($newcat==true) {
            $tag = new Tag;
            $tag->name = $request->input('text1');
            $tag->save();
            $post->tags()->attach($tag); 
        } 
        if(!empty($request['cat'])) {
            foreach($request['cat'] as $selected) {
                $post->tags()->attach($selected); 
            }
        }
        $posts = Post::latest() //orderBy('created_at', 'desc')
        ->filter(request(['month', 'year']))
        ->get();

         return view('posts.index', compact('posts'));
    }
    
    public function disableComment($id)
    {
        $post = Post::find($id);

        // Check for correct user
        if(Auth::check()) {
            if(auth()->user()->id !== $post->user_id){
                //return redirect('/posts')->with('error', 'Unauthorized Page');
            }

            $post->disabled = 1;
            $post->save();
            return redirect('/posts')->with('success', 'Post Disabled');
        } 
        return redirect('/posts')->with('error', 'Access Denied!');
        
    }
    
    public function search(Request $request)
    {
        $search = $request->input('search');
        //$query = DB::table("SELECT * FROM posts WHERE title LIKE %s OR body LIKE %s OR subtitle LIKE %s OR subbody LIKE %s ORDER BY id DESC", '%'.$search.'%', '%'.$search.'%', '%'.$search.'%', '%'.$search.'%', '%'.$search.'%');
        $query = DB::table('posts')->get();// WHERE title LIKE %s OR body LIKE %s OR subtitle LIKE %s OR subbody LIKE %s ORDER BY id DESC", '%'.$search.'%', '%'.$search.'%', '%'.$search.'%', '%'.$search.'%', '%'.$search.'%');
        if(DB::count() < 1) {
          //$error = "<span class='error'>Deze zoekactie levert niets op.</span><br /><br />";
        } else {
          
          /*foreach($query as $row) {
            echo $row['id']." => ".$row['title']."<br />";
          }*/
        }
        return view('posts.search', compact('query'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        // Check for correct user
        if(Auth::check()) {
          if(auth()->user()->id !== $post->user_id){
              return redirect('/posts')->with('error', 'Unauthorized Page');
          }
        }
        if($post->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }
        
        $post->delete();
        return redirect('/posts')->with('success', 'Post Removed');
    }
    
}