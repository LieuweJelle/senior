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
    
     public function agendas()
    {
        //return $this->belongsTo(Agenda::class);
        return $this->hasMany(Agenda::class);
    }
    
   
    public function getRouteKeyName()
    {
        return 'name'; // http://senior.lar/users/roles/Huishoudelijke hulp
    }
    
}
