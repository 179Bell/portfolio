@section('title', 'キャンプ編集')
@extends('layouts.view')

@section('content')

<div class="card mt-3">
    <div class="card-body pt-0">
        <div class="row justify-content-center">
            <div class="card-text col-lg-8">
                <form method="POST" action="{{ route('camps.update' , ['camp' => $camp]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mt-3">
                        <label for="title">タイトル</label>
                        <input 
                            id="title"
                            type="text" 
                            name="title" 
                            class="form-control @error('title') is-invalid @enderror" 
                            value="{{ old('title') ?? $camp->title }}" 
                            autofocus
                        >
                    </div>
                    <div class="text-danger">
                        <p>{{ $errors->first('title') }} </p>
                    </div>

                    <div class="form-group mt-3">
                        <label for="location">キャンプ場名</label>
                        <input
                            id="location"
                            type="text" 
                            name="location" 
                            class="form-control @error('location') is-invalid @enderror" 
                            value="{{ old('location') ?? $camp->location }}"
                        >
                    </div>
                    <div class="text-danger">
                        <p>{{ $errors->first('location') }}</p>
                    </div>

                    <div class="form-group mt-3">
                        <label for="date">行った日</label>
                        <input
                            id="date"
                            type="date" 
                            name="date" 
                            class="form-control @error('date') is-invalid @enderror" 
                            value="{{ old('date') ?? $camp->date }}"
                        >
                    </div>
                    <div class="text-danger">
                        <p>{{ $errors->first('date')}} </p>
                    </div>

                    <div class="form-group">
                        <label for="camp_img">キャンプ画像を追加</label>
                        <div class="col-lg-8">
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

                    <div class="form-group">
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

                    <div class="row justify-content-center">
                        <button type="submit" class="btn aqua-gradient btn-block col-lg-6">更新する</button>
                    </div>
                    <div class="row justify-content-center mt-2">
                        <a class="btn btn-blue-grey btn-block col-lg-6" href="{{ route('top') }}"><i class="fas fa-angle-double-left fa-lg"></i>戻る</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection('content')