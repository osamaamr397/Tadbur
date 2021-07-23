<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ayah extends Model
{
    public function surah(){
        return $this->belongsToMany('App\Surah');
    }
}
