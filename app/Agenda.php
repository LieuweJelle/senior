<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    public function user() // $post->agenda->name OR!! $comment->post->user
    {
        return $this->belongsTo(User::class);
    }
    public function role() 
    {
        return $this->belongsTo(Role::class);
    }

}
