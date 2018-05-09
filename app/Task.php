<?php

namespace App;

class Task extends Model
{
    //public static function incomplete()
    public function scopeIncomplete($query) // Task::incomplete() 
    {
      //return static::where('completed', 0)->get();
      return $query->where('completed', 0);
    }
    
    public function completed()
    {
      return false;
    }
}
