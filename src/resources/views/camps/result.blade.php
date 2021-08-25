@extends('layouts.view')

@section('content')

    @isset($data)
        @foreach($data as $camp)
            <div class="card mt-2">
                @include('commons.card')
                @include('commons.button')
            </div>
        @endforeach
    @else
    <div class="card mt-5">
        <div class="card-body d-flex row justify-content-center">
            <h4>{{ $message }}</h4>
        </div>
    </div>
    @endisset
    
    <div class="row d-flex justify-content-center mt-5">
        <a href="{{ route('top') }}" class="btn btn-secondary col-lg-6 btn-block">戻る</a>
    </div>
        

@endsection('content')