@extends('layouts.view')

@section('content')

    @include('users.user')
    @include('commons.tab')
    
    @forelse($user->bookmarks as $bookmark)
        <a href="" class="text-dark">                    
            <div class="card mt-4">
                <div class="card-text">
                    <h3>{{ $bookmark->title }}</h3>
                </div>
                <div class="card-body">
                    <p>{{ $bookmark->location }}</p>
                    @foreach($bookmark->campImgs as $campImg)
                        <img src="{{ asset('storage/images/'.$campImg->img_path) }}" width="300" height="200">
                    @endforeach
                </div>
            </div>                
        </a>
    @empty
        <p>お気に入りはありません</p>
    @endforelse

@endsection('content')