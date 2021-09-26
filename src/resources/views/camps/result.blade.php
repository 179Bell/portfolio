@section('title', '検索結果')
@extends('layouts.view')

@section('content')

    @isset($data)
        @foreach($data as $camp)
            <div class="card mt-2">
                @include('commons.card')
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
        <a href="{{ route('top') }}" class="btn btn-blue-grey col-lg-6 btn-block"><i class="fas fa-angle-double-left"></i>戻る</a>
    </div>
        

@endsection('content')