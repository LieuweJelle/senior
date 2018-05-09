<?php

namespace App;

class Agenda extends Model
{

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
    public function role() 
    {
        return $this->belongsTo(Role::class);
    }

}
