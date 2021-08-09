@extends('layouts.view')

@section('content')

    @include('users.user')

    @include('commons.tab')

    <div class="container">
    <div class="row">
        @if($gears->isEmpty())
            <p>ギアの登録はありません</p>
        @else
            @foreach($gears as $gear)
                    <a href="">
                        <div class="card-deck">
                            <div class="card mt-4" style="width: 20rem;">
                                @foreach($gear->gearImgs as $gearImg)
                                    <img src="{{ asset('storage/images/'.$gearImg->img_path) }}" width="300" height="200" >
                                @endforeach
                                <div class="card-title">
                                    <h3 class="text-dark">{{ $gear->name }}</h3>
                                </div>
                            </div>
                        </div>
                    </a>
            @endforeach
        @endif
    </div>
    </div>
@endsection('content')