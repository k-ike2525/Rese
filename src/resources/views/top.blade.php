<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Rese</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://kit.fontawesome.com/2ca8464001.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('css/login.css') }}" />


    <!-- Styles -->
    <style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .site-width {
        max-width: 1200px;
        margin: 0 auto;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 20px;

    }

    .links > a {
        padding: 0 25px;
        font-weight: 600;
        letter-spacing: .1rem;
    }

    .m-b-md a{
        margin-bottom: 30px;
        text-decoration:none;
    }

    .top-right.links {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-top: 100px;
        width: 100%;
    }

    .top-right.links a {
        color: blue;
        font-size: 30px;
        margin: 10px 0;
        text-decoration: none;
        text-shadow: none;
    }

        </style>
    </head>

        <!-- ロゴ -->
    <header>
      <div>
        <h1><a href="{{ url('/') }}"><i class="fa-solid fa-rectangle-list"></i></a></h1>

    <body>
        <div  class="site-width">
        <div class="position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/') }}">Home</a>
                        
                                <a class="" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                               Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                </form>

                         <a href="{{ url('my_page') }}">Mypage</a>
                    @else
                            <a href="{{ url('/') }}">Home</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registration</a>
                        @endif
                             <a href="{{ route('login') }}">Login</a>

                    @endauth
                </div>
            @endif

        </div>
        </div>
    </body>
</html>
