<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded=[];
    /*we know that we have some permissions and role can have many different permissions or belongs to many different
    permission because we have pivot table
    */
    public function permissions(){

        return $this->belongsToMany(Permission::class);

    }
    //roles is also gonna belong to many users
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
