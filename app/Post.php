<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //protected $fillable = ['title', 'body']; protected guarded = [];
    
    public function comments()
    {
        return $this->hasMany(Comment::class); // ('App\Comment')
    }
    
    public function user() // $post->user->name OR!! $comment->post->user
    {
        return $this->belongsTo(User::class);
    }
    
    public function addComment($body)
    {
        return $this->comments()->create(compact('body'));
    }
}
