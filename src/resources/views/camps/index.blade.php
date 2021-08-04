@extends('layouts.view')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            @foreach ( $camps as $camp )
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
                                                    <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $camp->id }}">
                                                        <i class="fas fa-trash-alt mr-1"></i>削除する
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- ドロップダウン -->

                                            <!-- モーダル -->
                                            <div id="modal-delete-{{ $camp->id }}" class="modal fade" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="POST" action="{{ route('camps.destroy', ['camp' => $camp]) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="modal-body">
                                                                投稿を削除します。よろしいですか？
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                                                                <button type="submit" class="btn btn-danger">削除する</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <!-- モーダル -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--カードヘッダー-->

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
                </div>
            @endforeach
        </div>
    </div>
@endsection('content')