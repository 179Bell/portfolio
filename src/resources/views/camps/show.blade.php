@extends('layouts.view')

@section('content')

    <div class="card mt-3">
        @include('commons.card')

        @if(Auth::check())
            <!-- コメント投稿 -->
            <div class="container">
                <div class="card-body">
                    <h5>コメント</h5>
                    <form method="POST" action="{{ route('comments.store') }}">
                        @csrf
                        <div class="col-md-8 mt-3"> 
                            <input type="hidden" name="user_name" value="{{ Auth::user()->name }}">
                            <input type="hidden" name="camp_id" value="{{ $camp->id }}">
                            <label for="comment"></label>
                                <textarea
                                    id="comment"
                                    type="text"
                                    name="comment"
                                    class="form-control"
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
            <!-- コメント投稿 -->
        @endif

        <!-- コメント表示 -->
        <div class="container">
            <div class="card-body">
                <div class="border-bottom p-2">
                    <h3>コメント</h3>
                </div>
                
                @forelse($camp->comments as $comment)
                    <p>{{ $comment->user_name }}</p>
                    <p>{{ $comment->comment }}</p>
                    <p>{{ $comment->created_at }}</p>
                @empty
                    <p>コメントはありません</p>
                @endforelse
            </div>
        </div>
        <!-- コメント表示 -->
        @include('commons.button')
    </div>

    <div class="row">
        <a class="btn btn-secondary col-lg-8 btn-block" href="{{ route('camps.index') }}">戻る</a>
    </div>


@endsection('content')