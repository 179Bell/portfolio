@extends('layouts.view')

@section('content')

    @include('users.user')
    @include('commons.tab')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            @if($gears->isEmpty())
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="card-title">
                            <p>ギアの登録はありません</p>
                        </div>
                    </div>
                </div>
            @else
                @foreach($gears as $gear)
                    <div class="card-deck">
                        <div class="card mt-4">
                            <div class="row no-gutters">
                                <div class="col-lg-5 my-auto">
                                    @foreach($gear->gearImgs as $gearImg)
                                    <img src="{{ asset('https://shingoportfolio.s3.ap-northeast-1.amazonaws.com/'.$gearImg->img_path) }}" width="350" height="250" >
                                    @endforeach
                                </div>
                                <div class="card-body col-lg-7">
                                    <div class="card-title">
                                        <h3>{{ $gear->name }}</h3>
                                        <p>{{ $gear->maker_name }}</p>
                                        <p>{{ $gear->comment }}</p>
                                    </div>

                                    <div class="card-text">
                                        @if($user->id == Auth::id())
                                        <a class="btn btn-danger text-white" data-toggle="modal" data-target="#modal-delete-{{ $gear->id }}">
                                            <i class="fas fa-trash-alt mr-1"></i>削除する
                                        </a>
                                        <!-- モーダル -->
                                        <div id="modal-delete-{{ $gear->id }}" class="modal fade" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="POST" action="{{ route('gears.destroy', ['gear' => $gear]) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-body">
                                                            ギアを削除します。よろしいですか？
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
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            </div>
        </div>
    </div>
@endsection('content')