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

<nav class="navbar navbar-expand navbar-light bg-default" border="0">
    <p class="navbar-brand text-white mt-2 font-weight-bold"><i class="fas fa-campground"></i>ポートフォリオ</p>
</nav>

<body class="bg-white d-flex flex-column" style="min-height: 100vh">
    <main class="mb-auto">
            <div class="container-fluid">
                <div class="row row-0"> 
                    <div class="card" style="width: 100%">
                        <img class="img-fluid" src="{{ asset('https://shingoportfolio.s3.ap-northeast-1.amazonaws.com/portfolio/IMG_1794.jpeg') }}" height="200px" border="0" style="max-width:100%;"> 
                        <div class="card-img-overlay text-center">
                            <h1 class="text-dark font-bold pt-4 font-weight-bold">キャンツー仲間とつながる</h1>
                            <p class="text-dark font-bold">あなたのキャンプツーリングの思い出を共有してみませんか？</p>
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
                    <h1 class="border-bottom pt-5 font-weight-bold">このアプリでできること</h1>
                </div>

                <div class="row justify-content-center mt-4">
                    <div class="col-lg-12">
                        <div class="row justify-content-center">
                            <div class="app-example col-lg-4 mr-5">
                                <h3 class="text-white text-center mt-3 font-weight-bold">キャンツー仲間とつながろう</h3>
                                <img class="example-img img-fluid ml-4 mt-2" src="{{ asset('https://shingoportfolio.s3.ap-northeast-1.amazonaws.com/portfolio/4271555_m.jpg') }}" height="250px" style="max-width:90%;">
                                <p class="text-white mt-4">いざキャンプ場へ行ってみたらバイクが止めにくい、サイトへの道がバイクでは進めないそんな悩みありませんか？<br>
                                キャンツー仲間同士でキャンツーに向いたキャンプ場を共有しましょう！</p>
                            </div>
                            <div class="app-example col-lg-4">
                                <h3 class="text-white text-center mt-3 font-weight-bold">おすすめのギアを共有しよう！</h3>
                                <img class="example-img img-fluid ml-4 mt-2" src="{{ asset('https://shingoportfolio.s3.ap-northeast-1.amazonaws.com/portfolio/1897405_m.jpg') }}" height="250px" style="max-width:90%;">
                                <p class="text-white mt-4">自分のおすすめのギアを紹介したり、他の人のギアを見て<br>
                                ギア選びの参考にしましょう！</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="row justify-content-center mt-5">
                            <h1 class="font-weight-bold border-bottom">さあはじめよう！</h1>
                        </div>
                        <div class="row justify-content-center mt-3 mb-5">
                        <a class="btn peach-gradient text-white" href="{{ route('guest.login') }}">ゲストログイン</a>
                            <a class="btn btn-default text-white" href="{{ route('login') }}">ログイン</a>
                            <a class="btn btn-default text-white" href="{{ route('register') }}">ユーザー登録はこちらから</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
@include('commons.footer') 
</body>

