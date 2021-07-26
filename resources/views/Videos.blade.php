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
            <h1><a href="{{route('home')}}">تدبـــــــــــر</a></h1>
        </div>
        <nav>
            <ul>
                <li><a href="#mreading">القراءة</a></li>
                @if(auth()->user()->userHasRole('Admin'))
                    <li><a href={{route('admin.index')}}>Admin</a></li>
                @endif
                <li><a href="#msearch">البحث والتفاسير</a></li>
                <li><a href="{{route('detectionre')}}">التعرف على القارئ</a></li>

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
<div class="container videoContainer">
    @foreach($videos as $video)

        @endforeach
</div>


</body>
</html>
