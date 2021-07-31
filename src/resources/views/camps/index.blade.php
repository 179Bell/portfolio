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
                                                <a class="dropdown-item" href="">
                                                    <i class="fas fa-pen mr-1"></i>記事を更新する
                                                    </a>
                                            <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-danger" data-toggle="modal" data-target=>
                                                    <i class="fas fa-trash-alt mr-1"></i>記事を削除する
                                                </a>
                                            </div>
                                            <!--  -->
                                        </div>  
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
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection('content')