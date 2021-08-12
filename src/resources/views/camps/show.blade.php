@extends('layouts.view')

@section('content')

    <div class="card mt-3">
        @include('commons.card')

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

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary">
                                    コメントする
                                    </button>
                                </div>
                            </form>
                            @if (session('commentstatus'))
                                <div class="alert alert-success mt-4 mb-4">
                                    {{ session('commentstatus') }}
                                </div>
                            @endif
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
        <a class="btn btn-secondary col-lg-6 btn-block" href="{{ route('camps.index') }}">戻る</a>
    </div>


@endsection('content')