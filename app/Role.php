<?php

namespace App;

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
        return $this->belongsTo(Agenda::class);
    }
    
   
    public function getRouteKeyName()
    {
        return 'name'; // http://senior.lar/users/roles/Huishoudelijke hulp
    }
    
}
