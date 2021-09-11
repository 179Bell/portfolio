<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @hasSection('title')
        <title>@yield('title')</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif
</head>

<nav class="navbar navbar-expand navbar-light bg-default border">
    <p class="navbar-brand text-white mt-2"><i class="fas fa-campground"></i>ポートフォリオ</p>
</nav>

<body class="bg-white d-flex flex-column" style="min-height: 100vh">
    <main class="mb-auto">
            <div class="container-fluid">
                <div class="row row-0"> 
                    <div class="card" style="width: 100%">
                        <img src="{{ asset('https://shingoportfolio.s3.ap-northeast-1.amazonaws.com/portfolio/IMG_1794.jpeg') }}" height="380px" > 
                        <div class="card-img-overlay">
                            <h1 class="text-white">さあ思い出を共有しよう</h1>
                            <div class="btn peach-gradient">
                                <a class="text-white" href="{{ route('guest.login') }}">ゲストログイン</a>
                            </div>
                            <div class="btn btn-default">
                                <a class="text-white" href="{{ route('login') }}">ログイン</a>
                            </div>
                            <div class="btn btn-default">
                                <a class="text-white" href="{{ route('register') }}">ユーザー登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <h3 class="border-bottom">このアプリでできること</h3>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <img src="{{ asset('https://shingoportfolio.s3.ap-northeast-1.amazonaws.com/portfolio/4271555_m.jpg') }}" height="300px" height="300px">
                            </div>
                            <div class="col-lg-5">
                            <p>キャンツー仲間とつながろう</p>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-5">
                            <div class="col-lg-5">
                                <img src="{{ asset('https://shingoportfolio.s3.ap-northeast-1.amazonaws.com/portfolio/1897405_m.jpg') }}" height="300px" height="300px">
                            </div>
                            <div class="col-lg-5">
                                <p>おすすめのギアを共有しよう！</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <h1>さあはじめよう！</h1>
                        <div class="btn peach-gradient">
                            <a class="text-white" href="{{ route('guest.login') }}">ゲストログイン</a>
                        </div>
                        <div class="btn btn-default">
                            <a class="text-white" href="{{ route('login') }}">ログイン</a>
                        </div>
                        <div class="btn btn-default">
                            <a class="text-white" href="{{ route('register') }}">ユーザー登録はこちらから</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
@include('commons.footer') 
</body>

