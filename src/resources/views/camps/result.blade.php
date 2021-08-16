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
        <p>{{ $message }}</p>
    @endisset

@endsection('content')