@extends('layouts.view')

@section('content')

    @include('users.user')

    @include('commons.tab')

    <div class="container">
        <div class="row">
            @if($camps->isEmpty())
                <p>投稿はまだありません</p>
            @else
                @foreach($camps as $camp)
                    <a href="{{ route('camps.show', ['camp' => $camp]) }}" class="text-dark">
                        <div class="col-md-10 content-center">
                            <div class="card mt-4">
                                <div class="card-text">
                                    <h3>{{ $camp->title }}</h3>
                                </div>
                                <div class="card-body">
                                    @foreach($camp->campImgs as $campImg)
                                        <img src="{{ asset('storage/images/'.$campImg->img_path) }}" width="300" height="200" >
                                    @endforeach
                                </div>
                            </div>
                        </div>                        
                    </a>
                @endforeach
            @endif
        </div>
    </div>

@endsection('content')