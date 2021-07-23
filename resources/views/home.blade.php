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
            <h1><a href="#mhome">تدبـــــــــــر</a></h1>
        </div>
        <nav>
            <ul>
                <li><a href="#mreading">القراءة</a></li>
               @if(auth()->user()->userHasRole('Admin'))
                <li><a href={{route('admin.index')}}>Admin</a></li>
                @endif
                <li><a href="#msearch">البحث والتفاسير</a></li>
                <li><a href="#mreceting">التلاوات</a></li>
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
                    <li><i class="fas fa-check"></i><a href="wasat39.html">المصحف الوسط</a></li>
                    <li><i class="fas fa-check"></i><a href="jawamee39.html">المصحف الجوامعي</a></li>
                    <li><i class="fas fa-check"></i><a href="rubuyassen.html">ربع يس</a></li>
                </ul>
                <ul>
                    <li><i class="fas fa-check"></i><a href="sousi.html">مصحف السوسي</a></li>
                    <li><i class="fas fa-check"></i><a href="shuba.html">مصحف شعبة</a></li>
                    <li><i class="fas fa-check"></i><a href="warsh39.html">مصحف ورش</a></li>
                    <li><i class="fas fa-check"></i><a href="douri.html">مصحف الدوري</a></li>
                </ul>
                <ul>
                    <li><i class="fas fa-check"></i><a href="TafseerMuyassar.html">التفسير الميسر</a></li>
                    <li><i class="fas fa-check"></i><a href="TajweedMuyassar.html">التجويد الميسر</a></li>
                    <li><i class="fas fa-check"></i><a href="juzuamma.html">الفاتحة وجزء عم</a></li>
                    <li><i class="fas fa-check"></i><a href="MuyassarGhareeb.html">الميسر في غريب القرآن الكريم</a></li>
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
    <div class="container">
        <h2 class="hh">إبحث وتعمق</h2>
        <p>إبحث عن أي كلمة تريد أن تجدها وتعرف أين موقعها في القرآن مع اختيار تفسيرك المفضل من مجموعة التفسيرات المتاحة والأختيار من بين مجموعة من القراء لتلاوتها </p>
        <div class="input">
            <form action="{{route('quran.search')}}">
                @csrf

            <input type="text" placeholder=" الكلمة المراد البحث عنها" required>
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

    </div>
</section>



<!--  Receting -->
<section class="receting" id="mreceting">
    <div class="container">
        <h2 class="hh">استمع واستمتع</h2>
        <p>استمع لمجموعة من القراء المتاحين بمختلف أنواع القراءات المتاحة لكل قارئ على حدة </p>
        <div class="grid-works">
            <div class="sec">
                <a href="Hosary.html"><img src="https://images.akhbarelyom.com//images/images/medium/20210417182006637.jpg">
                    <div class="overlay">
                        <h3>محمود خليل الحصري</h3>
                    </div>
                </a>
            </div>
            <div class="sec">
                <a href="Minshawy.html"><img src="data:image/jpeg;base64,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">
                    <div class="overlay">
                        <h3>محمد صديق المنشاوي</h3>
                    </div>
                </a>
            </div>
            <div class="sec">
                <a href="abdulbast.html"> <img src="data:image/jpeg;base64,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">
                    <div class="overlay">
                        <h3>عبد الباسط عبد الصمد</h3>
                    </div>
                </a>
            </div>
            <div class="sec">
                <img src="https://cdn.elwatannews.com/watan/543x295/17022377441528316331.jpg">
                <div class="overlay">
                    <h3>محمود على البنا</h3></div>
            </div>
            <div class="sec">
                <img src="https://media.gemini.media/img/large/2017/12/26/2017_12_26_17_29_46_118.jpg">
                <div class="overlay">
                    <h3>مصطفى إسماعيل</h3></div>
            </div>
            <div class="sec">
                <img src="https://images.gr-assets.com/authors/1514098245p5/3353597.jpg">
                <div class="overlay">
                    <h3>أيمن سويد</h3></div>
            </div>
            <div class="sec">
                <img src="data:image/jpeg;base64,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">
                <div class="overlay">
                    <h3>ياسر الدوسري</h3>
                </div>
            </div>
            <div class="sec">
                <img src="data:image/jpeg;base64,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">
                <div class="overlay">
                    <h3>ناصر القطامي</h3>
                </div>
            </div>
            <div class="sec">
                <img src="https://pbs.twimg.com/profile_images/1392524806306869248/ulcRcBJT_400x400.jpg">
                <div class="overlay">
                    <h3>مشاري العفاسي</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  LiveStream  -->
<section class="livestream" id="mlivestream">
    <div class="container">
        <h2 class="hh">البث المباشـــــر</h2>
        <p>تابع البث المباشـــر من الحرم المكي </p>
        <center>
            <iframe width="853" height="480" src="https://www.youtube.com/embed/Wnxwif_4l60?autoplay=1&mute=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </center>
    </div>
</section>
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

var device= navigator.mediaDevices.getUserMedia({audio:true});
                var items=[];
                device.then(stream => {
                    var recorder = new MediaRecorder(stream);
                    recorder.ondataavailable = e=>{
                        items.push(e.data);
                        if(recorder.state=='inactive'){
                            var blob = new Blob(items,{type:'audio/webm'})
                            var audio =document.getElementById('audio');
                            var mainaudio=document.createElement('audio');
                            mainaudio.setAttribute('controls','controls');
                            audio.appendChild(mainaudio);
                            mainaudio.innerHTML='<source src="'+URL.createObjectURL(blob)+'"type="video/webm"/>';


                        }
                    }
                    recorder.start(100);
                    setTimeout(()=>{
                        recorder.stop();
                    },5000);
                })

--}}

