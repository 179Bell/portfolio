@extends('layouts.view')

@section('content')

    @include('users.user')

    @include('commons.tab')

    <div class="container">
        <div class="row">
            <div class=col-lg-12>
                @if($camps->isEmpty())
                    <div class="card mt-4">
                        <div class="card-body">
                            <div class="card-title">
                                <p>投稿はまだありません</p>
                            </div>
                        </div>
                    </div>
                @else
                    @foreach($camps as $camp)
                        <a href="{{ route('camps.show', ['camp' => $camp]) }}" class="text-dark">
                            <div class="card-deck">
                                <div class="card mt-4">
                                    <div class="row no-gutters">
                                        <div class="col-lg-5 my-auto">
                                            @foreach($camp->campImgs as $campImg)
                                                <img src="{{ asset('https://shingoportfolio.s3.ap-northeast-1.amazonaws.com/'.$campImg->img_path) }}" width="300" height="200" >
                                            @endforeach
                                        </div>
                                        <div class="card-body col-lg-7">
                                            <div class="card-title">
                                                <h3>{{ $camp->title }}</h3>
                                            </div>
                                            <div class="card-text">
                                                <p><i class="fas fa-map-marker-alt"></i>{{ $camp->location }}</p>
                                                <p>{{ $camp->discription }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                      
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

@endsection('content')