@extends('layouts.view')

@section('content')

<div class="container">
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

                                @if(Auth::check())
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

                @include('commons.button')

                <a  class="btn btn-secondary col-md-8 btn-block" href="{{ route('camps.index') }}">戻る</a>

                <!--  -->


                
            </div>
        </div>
    </div>
</div>

@endsection('content')