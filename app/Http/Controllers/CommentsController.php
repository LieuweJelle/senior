<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Post $post)
    {
        $this->validate(request(), ['body' => 'required|string|min:2', 'title'=> 'nullable|string']);
        
        /*Comment::create([
          'body' => request('body'),
          'post_id' => $post->id,
          'user_id' => 1
        ]);*/
        //$post->addComment(request(),['body' => 'body', 'user_id' => 1]);
        
        $post->addComment(request('title'), request('body')); //?? UC
        return back();
    }
    public function destroy($id)
    {
        $comment = Comment::find($id);

        // Check for correct user
        if(Auth::check()) {
            if(auth()->user()->id !== $comment->user_id){
                //return redirect('/posts')->with('error', 'Unauthorized Page');
            }

            $comment->delete();
            return redirect('/posts')->with('success', 'Post Removed');
        }
        //
        return back();
    }
}
