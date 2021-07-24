@extends('layouts.view')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            
                
                    <h3 class="text-center my-2 text-dark">
                        <i class="fas fa-user mr-2 text-dark"></i>
                        ユーザーページ
                    </h3>
                
                    <div class="row justify-content-center my-4">
                        <img src="{{ asset('storage/images/'.$auth->avatar )}}" width="100px">
                    </div>
                
                    <div class="row">
                        <h3 class="col-md-6 text-dark">
                            {{ $auth->name }}
                        </h3>
                    </div>
                    
                    <div class="row">
                        <h3 class="col-md-6 text-md-right text-dark">愛車</h3>
                        <h3 class="col-md-6 text-dark">
                            {{ $auth->bike }}
                        </h3>
                    </div>

                    <div class="d-flex justify-content-center my-2">
                    <a class="btn btn-secondary col-md-3 mr-2" href="" role="button">キャンプを見る</a>
                        <a class="btn btn-secondary col-md-2 mr-2" href="/" role="button">戻る</a>
                        @if( Auth::check() )
                            <a class="btn btn-success col-md-2" href="" role="button">編集</a>
                        @endif
                    </div>

                
            
            <h3 class="text-center mb-4 text-dark">ギア一覧</h3>


        </div>
    </div>
</div>
@endsection('content')