<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function wast(){
        return view('wast39');
    }
    public function warsh(){
        return view('warsh');
    }
    public function douri(){
        return view('douri');
    }
    public function detectreciter(){

        return view('detections');
    }

}
