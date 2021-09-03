@extends('layouts.view')

@section('content')

    @include('users.user')

    @include('commons.tab')

    <div class="container">
        <div class="row">
            <div class=col-lg-12>
                @if($camps->isEmpty())
                    <div class="card mt-4">
                        <div class="card-body">
                            <div class="card-title">
                                <p>投稿はまだありません</p>
                            </div>
                        </div>
                    </div>
                @else
                    @foreach($camps as $camp)
                        <a href="{{ route('camps.show', ['camp' => $camp]) }}" class="text-dark">
                            <div class="card-deck">
                                <div class="card mt-4">
                                    <div class="row no-gutters">
                                        <div class="col-lg-5 my-auto">
                                            @foreach($camp->campImgs as $campImg)
                                                <img src="{{ asset('https://shingoportfolio.s3.ap-northeast-1.amazonaws.com/'.$campImg->img_path) }}" width="350" height="250" >
                                            @endforeach
                                        </div>
                                        <div class="card-body col-lg-7">
                                            <div class="card-title">
                                                <h3>{{ $camp->title }}</h3>
                                            </div>
                                            <div class="card-text">
                                                <p><i class="fas fa-map-marker-alt"></i>{{ $camp->location }}</p>
                                                <p>{{ $camp->discription }}</p>
                                            </div>
                                            <div class="card-text">
                                                @if($user->id == Auth::id())
                                                <a class="btn btn-danger text-white" data-toggle="modal" data-target="#modal-delete-{{ $camp->id }}">
                                                    <i class="fas fa-trash-alt mr-1"></i>削除する
                                                </a>
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
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                      
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

@endsection('content')