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
                                        <!-- モーダル -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  -->

                        <!-- 投稿本体 -->
                        <a style="text-decoration:none" href="{{ route('camps.show', ['camp' => $camp]) }}" class="text-dark">
                            <div class="container">
                                <div class="card-body">
                                    @foreach ($camp->campImgs as $campImg)
                                        <img src="{{ asset('storage/images/'.$campImg->img_path) }}" width="400" height="300">
                                    @endforeach
                                </div>
                                <div  class="card-body">
                                    <h3>{{ $camp->title }}</h3>
                                    <p><i class="fas fa-map-marker-alt"></i>{{ $camp->location }}</p>
                                    <p>{{ $camp->discription }}</p>
                                </div>
                            </div>
                        </a>
                        <!--  -->

                        <!-- いいねボタン -->
                        <div class="container mb-3">
                            <div class="row justify-content-center">
                                <div class="col-md-10">
                                    <!-- 自分の投稿にはボタンを表示しない -->
                                    @if( Auth::id() !=  $camp->user_id )
                                        @if(Auth::user()->is_like($camp->id))
                                            <div class="float-right">
                                                <form action="{{ route('unlike', $camp->id) }}" method="POST">
                                                    @csrf
                                                    <input type="submit" value="&#xf164;いいねを取り消す" class="fas btn btn-danger">
                                                </form>
                                            </div>
                                        @else
                                            <div class="float-right">
                                                <form action="{{ route('like', $camp->id) }}" method="POST">
                                                @csrf
                                                    <input type="submit" value="&#xf164;いいね" class="fas btn btn-success">
                                                </form>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- いいねボタン -->
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection('content')