<?php

namespace App\Http\Controllers;

use App\Surah;
use Illuminate\Http\Request;

class SurahController extends Controller
{
    public function index(){
        $surahs =Surah::all();
        return view('ayahs.index',['ayahs'=>$surahs]);
    }
    public function show(Surah $surahs){
        $surahs=Surah::all();

        return view('layouts.blog-surah', compact('surahs'));
    }
}
