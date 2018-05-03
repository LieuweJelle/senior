<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Post $post)
    {
        $this->validate(request(), ['body' => 'required|string|min:2']);
        
        /*Comment::create([
          'body' => request('body'),
          'post_id' => $post->id,
          'user_id' => 1
        ]);*/
        //$post->addComment(request(),['body' => 'body', 'user_id' => 1]);
        
        $post->addComment(request('body')); //?? UC
        return back();
    }
}
