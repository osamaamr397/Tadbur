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

   /* public function setVideoAttribute($value)
    {
        //this is the convention of mutator by using set and then name of column by
        // make first letter of each word capital then attribute

        $this->attributes['Video'] = asset($value);//this array hold all the columns and i will choose the specific column that i want
        //asset before $value goes to database it is modified and add the path to the public directory and the persist it to the
        //column name which is attributes['Video']
    }
   */


    //the accessor is getting some data
//    public function getVideoAttribute($value)
//    {
//        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
//            //return $value;
//
//            return $this->directory . $value;
//
//
//        }
//    }
}
