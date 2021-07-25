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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</head>
<body>
<!--  The Header Of the site   -->
<header>
    <div class="container">
        <div class="left-grid">
            <h1><a href="{{route('home')}}">تدبـــــــــــر</a></h1>
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
<section class="readmoshaf" id="mreadmoshaf">
    <div class="container">
        <h2 class="hh">مصحف ورش</h2>
        <center> <iframe width="830" height="600"src='https://epub.qurancomplex.gov.sa/issues/qiraat/warsh39/' style='border:0'></iframe></center>
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
<footer>
    جميع الحقوق محفوظة 2021
</footer>
</body>
</html>
