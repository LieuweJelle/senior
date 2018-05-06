<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    /**
     * The users that belong to the role.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    
     public function agenda()
    {
        return $this->belongs(Agenda::class);
    }
    
   
    public function getRouteKeyName()
    {
        return 'name'; // http: //senior.lar/users/roles/Huishoudelijke hulp
    }
    
}
