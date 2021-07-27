<?php

namespace App\Http\Controllers;

use App\Ayah;
use App\User;
use App\Wird;
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
    public function getAddToWard($AyahNo,$id){
        $inputs['Ayah_Num']=$AyahNo;
        $inputs['Surah_id']=$id;
        $inputs['SurahNameEnglish']=DB::table('ayahs')->where(['AyahNo'=>$AyahNo,'surah_id'=>$id])->value('SurahNameEnglish');
        $inputs['SurahNameArabic']=DB::table('ayahs')->where(['AyahNo'=>$AyahNo,'surah_id'=>$id])->value('SurahNameArabic');
        $inputs['EnglishTranslation']=DB::table('ayahs')->where(['AyahNo'=>$AyahNo,'surah_id'=>$id])->value('EnglishTranslation');
        $inputs['OrignalArabicText']=DB::table('ayahs')->where(['AyahNo'=>$AyahNo,'surah_id'=>$id])->value('OrignalArabicText');

        auth()->user()->wirds()->create($inputs);

        return redirect()->route('ayah.wirdCart');


    }
    public function getWird(){

        $ayahs=auth()->user()->wirds()->get();
        return view('ayahs.wird_cart',['ayahs'=>$ayahs]);

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
                <th scope="row" >'.$row->SurahNameArabic.'</th>
                 <th scope="row" >'.$row->SurahNameEnglish.'</th>
                <th class="searchContent" scope="row"><a class="fix" href="'.$routeurl.'">'.$row->ArabicText.'</a></th>
                <th scope="row" >'.$row->EnglishTranslation.'</th>

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


