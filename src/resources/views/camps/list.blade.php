@extends('layouts.view')

@section('content')

    @include('users.user')

    @include('commons.tab')

    <div class="container">
        <div class="row">
            @foreach($camps as $camp)
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
            @endforeach
        </div>
    </div>

@endsection('content')