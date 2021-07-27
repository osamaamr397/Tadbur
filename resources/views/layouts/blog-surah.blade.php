<?php
use App\Surah;
?>
    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>تدبر</title>
    <link rel="stylesheet" href="{{asset('css/first_style.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>







</head>
<body>
<!--  The Header Of the site   -->
<header id="header" >
    <div class="container">
        <div class="left-grid">
            <h1><a href="{{route('home')}}">تدبـــــــــــر</a></h1>
        </div>
    </div>
</header>



 @foreach($ayahs as $ayah)
     <div class="ayat" id="{{$ayah->AyahNo}}">
         <form action="{{route('ayah.addToWard',[$ayah->AyahNo,$ayah->surah_id])}}">
         <button  id="saveward">Save Ward</button>
         </form>
         <div class="leftAyat">
             @if(($ayah->line_start ==$ayah->line_end))
                 <label id="surha"> الاايه باللغه العربيه : </label>

                 {{$ayah->ArabicText."  ".$ayah->AyahNo}}  <br> <br>
                     <label id="tafseer"> التفسير باللغه العربيه : </label>{{$ayah->aya_tafseer_moussar}}
             @else
                 <label id="surha"> الاايه باللغه العربيه : </label>
                 {{$ayah->ArabicText."  ".$ayah->AyahNo}}
                 <br> <br>
                 <label id="tafseer"> التفسير باللغه العربيه : </label>{{$ayah->aya_tafseer_moussar}}

             @endif
         </div>

         <div class="rightAyat">
             @if(($ayah->line_start ==$ayah->line_end))


                 {{$ayah->EnglishTranslation."  ".$ayah->AyahNo}}  <br>
                 <div class="Englishdiv">
                     <label class="surhaen">  : Ayah with English   </label>
                 </div>
             @else


                 {{$ayah->EnglishTranslation."  ".$ayah->AyahNo}}
                 <div class="Englishdiv">
                     <label class="surhaen">  : Ayah with English  </label>
                 </div>



             @endif
         </div>


             {{--{{$ayah->ArabicText."  ".$ayah->AyahNo}}--}}



</div>
@endforeach

<?php
////$ayahs=assert('ayah');
////$roles = DB::table('ayahs')->lists('OrignalArabicText', $ayah);
//$results = DB::select('select * from ayahs where surah_id = ?', ['surah_id' =>$ayahs]);
//
//foreach ($results as $result){
//    echo $result->OrignalArabicText;
//}
//
//?>
