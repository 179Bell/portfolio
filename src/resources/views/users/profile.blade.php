@section('title', 'プロフィール')
@extends('layouts.view')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        @include('users.user')
        @include('commons.tab')
        @include('gears.list')
    </div>
</div>

@endsection('content')