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
        return $this->belongsToMany(User::class); //'App\User'
    }
    
    public function getRouteKeyName()
    {
        return 'name'; // http: //senior.lar/users/roles/Huishoudelijke hulp
    }
    
}
