@extends('layouts.view')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            @foreach ( $camps as $camp )
                <div class="col-md-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="container">
                                <div class="row">
                                    <div class="col align-items-center">
                                        <div class="d-md-inline-block">
                                            <img src="{{ asset('storage/images/'.$camp->user->avatar) }}" class="d-block rounded-circle mb-3">
                                            <div class="font-weight-bold">{{ $camp->user->name }}</div>
                                            <div class="font-weight-lighter">{{ $camp->created_at->format('Y/m/d H:i') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            @foreach($camp->campImgs as $campImg)
                                <img src="{{ asset('storage/images/'.$campImg->img_path) }}" width="400" height="300">
                            @endforeach
                        </div>
                        <div  class="card-body">
                            <h3>{{ $camp->title }}</h3>
                            <p>{{ $camp->location }}</p>
                            <p>{{ $camp->discription }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection('content')