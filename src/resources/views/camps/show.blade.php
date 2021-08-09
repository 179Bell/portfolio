@extends('layouts.view')

@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card mt-3">
            <!-- カードヘッダー -->
            <div class="card-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 align-items-center d-flex flex-row">
                            <a href="">
                                <img src="{{ asset('storage/images/'.$camp->user->avatar) }}" class="rounded-circle" width="90" height="90">
                            </a>
                            <p class="font-weight-bold ml-2">{{ $camp->user->name }}</p>
                            <p class="font-weight-lighter ml-2">{{ $camp->created_at->format('Y/m/d H:i') }}</p>

                            @if (Auth::check())
                                <!-- ドロップダウン -->
                                <div class="dropdown">
                                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('camps.edit', ['camp' => $camp]) }}">
                                            <i class="fas fa-pen mr-1"></i>編集する
                                            </a>
                                    <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" data-toggle="modal" data-target=>
                                            <i class="fas fa-trash-alt mr-1"></i>削除する
                                        </a>
                                    </div>
                                    <!--  -->
                                </div>
                            @endif  
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->

            <!-- 投稿本体 -->

            @include('commons.card')

            @if(Auth::check())
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
                                        rows="5"
                                        autofocus>{{ old('comment') }}</textarea>
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
                @endif

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

            </div>

            @include('commons.button')

            <a  class="btn btn-secondary col-md-8 btn-block" href="{{ route('camps.index') }}">戻る</a>

            <!--  -->
            
        </div>
    </div>
</div>


@endsection('content')