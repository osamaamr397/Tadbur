<?php

namespace App\Http\Controllers;

use App\Ayah;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function algo(Request $request){
        $ayahs=Ayah::all();
        /*just to send data to declare what should result from the search algorithm*/

        return view('layouts.searched_data',['ayahs'=>$ayahs]);
    }
}
