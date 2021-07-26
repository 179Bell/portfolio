@extends('layouts.view')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-body pt-0">
                    <div class="card-text">
                        <form method="POST" action="{{ route('camps.store') }}">
                            @csrf
                                <div class="col-md-8 mt-3">
                                    <label for="title">タイトル</label>
                                    <input 
                                        id="title"
                                        type="text" 
                                        name="title" 
                                        class="form-control" 
                                        value="{{ old('title') }}" 
                                        autofocus
                                    >
                                </div>

                                <div class="col-md-8 mt-3">
                                    <label for="location">キャンプ場名</label>
                                    <input
                                        id="location"
                                        type="text" 
                                        name="location" 
                                        class="form-control" 
                                        value="{{ old('location') }}"
                                    >
                                </div>

                                <div class="col-md-8 mt-3">
                                    <label for="date">行った日</label>
                                    <input
                                        id="date"
                                        type="date" 
                                        name="date" 
                                        class="form-control" 
                                        value="{{ old('date') }}"
                                    >
                                </div>
                                <!-- <div class="text-danger">
                                    <p>{{ $errors->first('title')}} </p>
                                </div> -->
                                <div class="form-group row">
                                    <label for="camp_img">キャンプ画像を追加</label>
                                    <div class="col-md-6">
                                        <input 
                                            id="camp_img"
                                            type="file" 
                                            name="camp_img"
                                            accept="image/jpeg, image/png"
                                            multiple
                                        >
                                        @error('avatar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <br><small class="text-dark">サイズは1024Kbyteまで</small>
                                    </div>
                                </div>

                                <div class="col-md-8 form-group">
                                <label for="discription">コメント</label>
                                <textarea
                                    id="discription"
                                    name="body" 
                                    class="form-control" 
                                    rows="16" 
                                    placeholder="本文"></textarea>
                                    <!-- <div class="text-danger">
                                        <p>{{ $errors->first('body') }}</p>
                                    </div> -->
                                </div>
                                
                            <button type="submit" class="btn col-md-8 btn-primary btn-block">投稿する</button>
                            <a  class="btn btn-secondary col-md-8 btn-block" href="{{ route('camps.index') }}">戻る</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection('content')