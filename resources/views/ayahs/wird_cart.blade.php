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

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Surahs</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">





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
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold "style="color: #E4B63D">Wirds</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">


                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <thead>
                    <tr>
                        <th>Surah Name in English</th>
                        <th>Surah Name in Arabic</th>
                        <th>Ayah Words In English</th>
                        <th>Ayah Words In Arabic</th>


                    </tr>

                    </thead>
                    <tfoot>
                    <tr>
                        <th>Surah Name in English</th>
                        <th>Surah Name in Arabic</th>
                        <th>Ayah Words In English</th>
                        <th>Ayah Words In Arabic</th>


                    </tr>
                    </tfoot>
                    <tbody>

                    @foreach($ayahs as $ayah)
                        <tr>
                            <td>{{$ayah->SurahNameEnglish}}</td>
                            <td>{{$ayah->SurahNameArabic}}</td>
                            <td>{{$ayah->EnglishTranslation}}</td>
                            <td scope="row"><a href="{{route('ayah.showWird',[$ayah->Surah_id,"#".$ayah->Ayah_Num])}}">{{$ayah->OrignalArabicText}}</a></td>



                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>


{{--
<strong>{{$ayah['item']->id}}</strong>
 {{$amr=$ayah['item']->surah_id}}
                            {{$ids="#".$ayah['item']->AyahNo}}
                            <td scope="row"><a href="{{route('ayah.showWird',[$amr,$ids])}}">{{$ayah['item']->OrignalArabicText}}</a></td>

--}}
