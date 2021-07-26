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
    public function search(Request $request){
        if($request->ajax()){
            if( isset ( $request->search ) && (!empty ( $request->search ))){
                $data=Ayah::where('SurahNameArabic','like','%'.$request->search.'%')
                    ->orwhere('SurahNameEnglish','like','%'.$request->search.'%')
                    ->orwhere('ArabicText','like','%'.$request->search.'%')
                    ->orwhere('EnglishTranslation','like','%'.$request->search.'%')->paginate(4);
                $output='';
                if(count($data)>0){

                    $output='
                <table class="table">

                <tbody>';

                    foreach ($data as $row){
                        $id=$row->id;
                        $routeurl='/ayah/'.$row->surah_id.'/'.'#'.$row->AyahNo;
                        $output.='
                    <tr>
                <th scope="row">'.$row->SurahNameArabic.'</th>
                 <th scope="row">'.$row->SurahNameEnglish.'</th>
                <th class="searchContent" scope="row"><a class="fix" href="'.$routeurl.'">'.$row->ArabicText.'</a></th>
                <th scope="row">'.$row->EnglishTranslation.'</th>

                </tr>


                    ';
                    }

                    $output.= '</tbody>
                </table>';

                }else{
                    $output.='No results';

                }
                return $output;
            }
            else{
                return null;
            }

        }

        else{
            return null;
        }

    }
}

/*
 *
 * <a href="{{'.route("ayah.showWird",[$row->surah_id,"#".$row->AyahNo]).'}}">
 * */
/*
 *
 * $output='
                <table class="table">
                <thead>
                <tr>
                <th scope="col">Surah Name in Arabic</th>
                <th scope="col">Surah Name in Arabic</th>
                <th scope="col">Arabic Text</th>
                <th scope="col">English transaltion</th>
                </tr>
                </thead>
                <tbody>';

                    foreach ($data as $row){
                        $id=$row->id;
                        $output.='
                    <tr>
                <th scope="row">'.$row->SurahNameArabic.'</th>
                 <th scope="row">'.$row->SurahNameEnglish.'</th>
                <th scope="row"><a href="{{'.route("ayah.showWird",[$row->surah_id,"#".$row->AyahNo]).'}}">'.$row->ArabicText.'</a></th>
                <th scope="row">'.$row->EnglishTranslation.'</th>
                </tr>
                    ';
 *
 * */
/*
 * <th class="searchContent" scope="row"><a class="fix
 * */
