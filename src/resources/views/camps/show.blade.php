@section('title', 'キャンプ詳細')
@extends('layouts.view')

@section('content')
    <div class="card mt-3">
        <!-- カードヘッダー -->
        <div class="card-header">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="d-flex flex-row align-items-center">
                            <a href="{{ route('users.profile', ['id' => $camp->user->id]) }}">
                                <img src="{{ asset('https://shingoportfolio.s3.ap-northeast-1.amazonaws.com/'.$camp->user->avatar) }}" class="rounded-circle border" width="70" height="70">
                            </a>
                            <h4 class="font-weight-bold ml-2">{{ $camp->user->name }}</h4>
                            <p class="text-right font-weight-lighter ml-2">{{ $camp->created_at->format('Y/m/d H:i') }}</p>
                        </div>
                    </div>
                        @if (Auth::id() == $camp->user->id)
                            @include('commons.dropdown')
                        @endif
                </div>
            </div>
        </div>
        <!--カードヘッダー-->
        <!-- カードボディー -->
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    @foreach ($camp->campImgs as $campImg)
                        <img src="{{ asset('https://shingoportfolio.s3.ap-northeast-1.amazonaws.com/'.$campImg->img_path) }}" class="d-block mx-auto" width="400" height="300">
                    @endforeach
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-10">
                    <h2 class="mt-4">{{ $camp->title }}</h2>
                    <p style="font-size: 18px;"><i class="fas fa-map-marker-alt"></i>{{ $camp->location }}</p>
                    <p>{{ $camp->date }}</p>
                    <p>{{ $camp->discription }}</p>
                </div>
            </div>
        </div>

        @if(Auth::check())
        @include('commons.button')
            <!-- コメント投稿 -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="container">
                        <div class="card-body">
                            <div class="border-bottom p-1">
                                <h3>コメント</h3>
                            </div>
                            <form method="POST" action="{{ route('comments.store') }}">
                                @csrf
                                <div class="col-lg-12 mt-1"> 
                                    <input type="hidden" name="user_name" value="{{ Auth::user()->name }}">
                                    <input type="hidden" name="camp_id" value="{{ $camp->id }}">
                                    <label for="comment"></label>
                                        <textarea
                                            id="comment"
                                            type="text"
                                            name="comment"
                                            class="form-control"
                                            placeholder="コメントを記入"
                                            rows="5">{{ old('comment') }}</textarea>
                                </div>
                                <div class="text-danger">
                                    <p>{{ $errors->first('comment') }}</p>
                                </div>

                                <div class="mt-4 text-center">
                                    <button type="submit" class="col-lg-6 btn aqua-gradient">
                                    <i class="fas fa-pen mr-1"></i>コメントする
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- コメント投稿 -->
        @endif

        <!-- コメント表示 -->
        <div class="container">
            <div class="card-body">                
                @forelse($camp->comments as $comment)
                    <div class="border-top p-3">
                        <h4>{{ $comment->user_name }}</h4>
                        <p>{{ $comment->created_at->format('Y.m.d H:i') }}</p>
                        <p>{{ $comment->comment }}</p>
                    </div>
                @empty
                    <p>コメントはまだありません</p>
                @endforelse
            </div>
        </div>
        <!-- コメント表示 -->
    </div>

    <div class="row d-flex justify-content-center mt-4">
        <a class="btn btn-blue-grey col-lg-6 btn-block" href="{{ route('top') }}"><i class="fas fa-angle-double-left"></i>戻る</a>
    </div>


@endsection('content')