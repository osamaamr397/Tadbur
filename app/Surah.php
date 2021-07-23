<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surah extends Model
{
public function ayahs(){
return  $this->hasMany(Ayah::class,'surah_id');
}



}
