<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token"content="{{csrf_token()}}">
    <title>تدبر</title>
    <link rel="stylesheet" href="{{asset('css/first_style.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>








</head>
<body>
<!--  The Header Of the site   -->
<header id="header" >
    <div class="container">
        <div class="left-grid">
            <h1><a href="#mhome">تدبـــــــــــر</a></h1>
        </div>
        <nav>
            <ul>
                <li><a href="#mreading">القراءة</a></li>
               @if(auth()->user()->userHasRole('Admin'))
                <li><a href={{route('admin.index')}}>Admin</a></li>
                @endif
                <li><a href="#msearch">البحث والتفاسير</a></li>

                <li><a href="#mcontact">تواصل معنا</a></li>
                <li> <a href="{{route('ayah.wirdCart')}}">ورد</a></li>
                <li class="nav-item">
                    <form action="/logout"method="post">
                        @csrf
                        <button class="btn btn-danger "id="log">Logout</button>
                    </form>
                </li>

            </ul>
        </nav>
    </div>
</header>
<!--   Inside the image    -->
<section class="home" id="mhome">
    <div>

        <img class="essa" >

        <h1>تــدبـــر</h1>
        <p>موقع يساعدك على قراءة القرآن الكريم وفهم معانيه والبحث عن ما تريد من الكلمات والتفاسير المختلفة و الأستماع لمجموعة من القراء المتاحين بالإضافة إلى خدمة البث المباشر </p>
        <button>اعرف أكثر</button>
    </div>
</section>
<!--   Reading  -->
<section class="reading" id="mreading">
    <div class="container">
        <div>
            <h2 class="hh">إقرأ وتدبر</h2>
            <p>إختر المصحف أو الكتاب المفضل لديك من مجموعة المصاحف والكتب المتاحة بالجودة العالية من إصدارات مجمع الملك فهد لطباعة المصحف الشريف بالمدينة المنورة وابدأ في القراءة.</p>
            <h3>المصاحف والكتب المتاحة</h3>
            <div class="ul-grid" id="gird">
                <ul>
                    <li><i class="fas fa-check"></i><a href="{{route('ayah')}}">المصحف العادي</a></li>
                    <li><i class="fas fa-check"></i><a href="{{route('wastt')}}">المصحف الوسط</a></li>

                </ul>
                <ul>

                    <li><i class="fas fa-check"></i><a href="{{route('warshh')}}">مصحف ورش</a></li>
                    <li><i class="fas fa-check"></i><a href="{{route('dourii')}}">مصحف الدوري</a></li>
                </ul>
                <ul>

                </ul>
            </div>
        </div>
        <div>
            <img src="https://i1.sndcdn.com/artworks-000578406500-630991-t500x500.jpg">
        </div>
    </div>
</section>
<!--  Search  -->

<section class="search" id="msearch">
    <div class="container containers">
        <h2 class="hh">إبحث وتعمق</h2>

        <h3  class="text-center text-danger texting">بحث عن أي كلمة تريد أن تجدها وتعرف أين موقعها في القرآن مع اختيار تفسيرك المفضل من مجموعة التفسيرات
            المتاحة والأختيار من بين مجموعة من القراء لتلاوتها</h3>
        <div class="input">

            <input type="text"name="search"id="search"placeholder="ابخث"class="form-control"onfocus="">

        </div>
        <div id="search_list"></div>


    </div>

</section>
<script>
    $(document).ready(function () {
        $('#search').on('keyup',function () {
            var query=$(this).val();
            $.ajax({
                url:"search",
                type:"GET",
                data:{'search':query},
                success:function (data) {
                    $('#search_list').html(data);
                }
            });
        });
    });
</script>

<!--  Receting -->

<!--  LiveStream  -->

<!--   Contact us   -->
<section class="contact" id="mcontact">
    <div class="container">
        <h2 class="hh">تواصـــل معنـــا</h2>
        <p>Tadbur@gmail.com</p>
        <div class="links">
            <ul>
                <li><a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook" id="ft"></i></a>
                </li>
                <li><a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter" id="ft"></i></a>
                </li>
                <li><a href="https://www.youtube.com" target="_blank"><i class="fab fa-youtube" id="y"></i></a>
                </li>
                <li><a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram" id="insta"></i></a>
            </ul>
        </div>
    </div>
</section>
<footer id="footer">
    جميع الحقوق محفوظة © 2021
</footer>
</body>
</html>













{{--

<div class="input">
            <form action="{{route('quran.search')}}">
                @csrf

            <input type="text" name="search_text" id="search_text" class="form-control" placeholder=" الكلمة المراد البحث عنها" required>
            <button>ابحث</button>
            <br>
            </form>

            <button id="save" style="margin-right:370px">Record</button>

        </div>
        <div class="audio"id="audio"></div>

            <script type="text/javascript">
                save.onclick=()=> {
                    var device = navigator.mediaDevices.getUserMedia({audio: true});
                    var items = [];
                    device.then(stream => {
                        var recorder = new MediaRecorder(stream);
                        recorder.ondataavailable = e => {
                            items.push(e.data);
                            if (recorder.state == 'inactive') {
                                var blob = new Blob(items, {type: 'audio/webm'})
                                var audio = document.getElementById('audio');
                                var mainaudio = document.createElement('audio');
                                mainaudio.setAttribute('controls', 'controls');
                                audio.appendChild(mainaudio);
                                mainaudio.innerHTML = '<source src="' + URL.createObjectURL(blob) + '"type="video/webm"/>';


                            }
                        }
                        recorder.start(100);
                        setTimeout(() => {
                            recorder.stop();
                        }, 5000);
                    })
                }
            </script>
--}}


{{--
 <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <h3 class="text-center text-danger">بحث عن أي كلمة تريد أن تجدها وتعرف أين موقعها في القرآن مع اختيار تفسيرك المفضل من مجموعة التفسيرات
                    المتاحة والأختيار من بين مجموعة من القراء لتلاوتها</h3>
                <div class="form-group">
                    <h4> Type in Arabic or English</h4>
                    <input type="text"name="search"id="search"placeholder="ابخث"class="form-control"onfocus="">

                </div>
                <div id="search_list"></div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>


</section>


<script>
    $(document).ready(function () {
        $('#search').on('keyup',function () {

            var query=$(this).val();
            $.ajax({
                url:"search",
                type:"GET",
                data:{'search':query},
                success:function (data) {
                    $('#search_list').html(data);
                }

            });
        });

    });
</script>


--}}
{{--
<div class="input">
            <input type="text" placeholder=" الكلمة المراد البحث عنها" required class="search-input">
            <button>ابحث</button>
            <div class="card">
                <div class="card-header">Search Result</div>
                <div class="list-group-flush search-result">
                    <li class="list-group-item"></li>
                    <li class="list-group-item"></li>
                    <li class="list-group-item"></li>
                    <li class="list-group-item"></li>

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".search-input").on('keyup',function () {
                var _q=$(this).val();
                if(_q.length>=2){
                    $.ajax({
                       url:"{{url('search')}}",
                        data:{
                           q:_q
                        },
                        beforeSend:function () {
                           $(".search-result").html('<li class="list-q">loading...</li>');

                        },
                        success:function (res) {
                           console.log(res);

                        }
                    });
                }

            });


        });
    </script>

--}}
{{--
<script type="text/javascript">
    $.ajaxSetup({
       headers:{
           'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
       }
    });
    $('#user_data').keyup(function (e) {
        var search_data = $('#user_data').val();
        e.preventDefault();
        $.ajax({
           type:'POST',
            url:"{{route('search')}}",
            data:{search_data:search_data},
            success:function ($data) {
                $('#output').html($data)

            }

        });

    });
</script>



--}}
