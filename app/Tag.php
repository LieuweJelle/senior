<?php

namespace App;

class Tag extends Model
{
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function getRouteKeyName()
    {
        return 'name'; //http://senior.lar/posts/tags/laravel
    }

}
