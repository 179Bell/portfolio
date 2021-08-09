@extends('layouts.view')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card mt-3">
            <div class="card-body pt-0">
                <div class="card-text">
                    <form method="POST" action="{{ route('camps.update' , ['camp' => $camp]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                            <div class="col-md-8 mt-3">
                                <label for="title">タイトル</label>
                                <input 
                                    id="title"
                                    type="text" 
                                    name="title" 
                                    class="form-control" 
                                    value="{{ old('title') ?? $camp->title }}" 
                                    autofocus
                                >
                            </div>
                            <div class="text-danger">
                                <p>{{ $errors->first('title') }} </p>
                            </div>

                            <div class="col-md-8 mt-3">
                                <label for="location">キャンプ場名</label>
                                <input
                                    id="location"
                                    type="text" 
                                    name="location" 
                                    class="form-control" 
                                    value="{{ old('location') ?? $camp->location }}"
                                >
                            </div>
                            <div class="text-danger">
                                <p>{{ $errors->first('location') }}</p>
                            </div>

                            <div class="col-md-8 mt-3">
                                <label for="date">行った日</label>
                                <input
                                    id="date"
                                    type="date" 
                                    name="date" 
                                    class="form-control" 
                                    value="{{ old('date') ?? $camp->date }}"
                                >
                            </div>
                            <div class="text-danger">
                                <p>{{ $errors->first('date')}} </p>
                            </div>

                            <div class="form-group row">
                                <label for="camp_img">キャンプ画像を追加</label>
                                <div class="col-md-6">
                                    <input 
                                        id="camp_img"
                                        type="file" 
                                        name="camp_img"
                                    >
                                    <br><small class="text-dark">サイズは1024Kbyteまで</small>
                                </div>
                            </div>
                            <div class="text-danger">
                                <p>{{ $errors->first('camp_img') }} </p>
                            </div>

                            <div class="card-body">
                                @foreach ($camp->campImgs as $campImg)
                                    <img src="{{ asset('storage/images/'.$campImg->img_path) }}" width="200" height="150">
                                @endforeach
                            </div>

                            <div class="col-md-8 form-group">
                            <label for="discription">コメント</label>
                            <textarea
                                id="discription"
                                name="discription" 
                                class="form-control" 
                                rows="16" 
                                placeholder="本文">{{ old('discription') ?? $camp->discription }}</textarea>
                            </div>
                            <div class="text-danger">
                                <p>{{ $errors->first('discription') }}</p>
                            </div>



                        <button type="submit" class="btn col-md-8 btn-primary btn-block">編集する</button>
                        <a  class="btn btn-secondary col-md-8 btn-block" href="{{ route('camps.index') }}">戻る</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection('content')