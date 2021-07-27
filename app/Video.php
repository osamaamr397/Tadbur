<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
   // public $directory = "/videos/";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
