@extends('layouts.view')

@section('content')

    @foreach($data as $camp)
        <div class="card mt-2">
            <div class="card-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 align-items-center d-flex flex-row">
                            <a href="{{ route('users.profile', ['id' => $user->id]) }}">
                                <img src="{{ asset('storage/images/'.$camp->user->avatar) }}" class="rounded-circle" width="90" height="90">
                            </a>
                            <p class="font-weight-bold ml-2">{{ $user->name }}</p>
                            <p class="font-weight-lighter ml-2">{{ $camp->created_at->format('Y/m/d H:i') }}</p>
                        </div>
                    </div>   
                </div>
            </div>

            <div class="container">
                <a style="text-decoration:none" href="{{ route('camps.show', ['camp' => $camp]) }}" class="text-dark">
                    @include('commons.card')
                </a>

                @include('commons.button')

                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <p>お気に入り数：{{ $camp->bookmark_users()->count() }}</p>
                        <p>いいね数：{{ $camp->like_users()->count() }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection('content')