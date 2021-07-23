<?php

namespace App\Http\Controllers;

use App\Ayah;
use App\Surah;
use App\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use function GuzzleHttp\Promise\all;
use DB;


class AyahController extends Controller
{
    public function index(){
        $ayahs=Ayah::all();
        $ayahs=$ayahs->unique('surah_id');


        return view('ayahs.index',['ayahs'=>$ayahs]);
    }
    public function show($id ){
$ayahs=Ayah::class;


       $ayahs=DB::table('ayahs')->where('surah_id',$id)->get();

        return view('layouts.blog-surah',['ayahs'=>$ayahs]);
    }
    public function getAddToWard( Request $request,$id){
        $ayah=Ayah::find($id);
        $oldWard=Session::has('ward')?Session::get('ward'):null;
        $ward=new Ward($oldWard);
        $ward->add($ayah,$ayah->id);
        $request->session()->put('ward',$ward);

        return redirect()->route('ayah.wirdCart');


    }
    public function getWird(){
        if(!Session::has('ward')){
            return view('ayahs.wird_cart');

        }else{
            $oldWard=Session::get('ward');
            $ward=new Ward($oldWard);
            return view('ayahs.wird_cart',['ayahs'=>$ward->items]);
        }
    }
    public function show_wird($id,$AyahNo){
        $ayahs=Ayah::class;
        $ayahs=DB::table('ayahs')->where('surah_id',$id)->get();

        return view('layouts.blog-surah2',['ayahs'=>$ayahs,'AyahNo'=>$AyahNo]);

    }
}
