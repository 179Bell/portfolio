@extends('layouts.view')

@section('content')

    <div class="container">
            <div class="card mt-2">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="card-text col-lg-8">
                            <form method="POST" action="{{ route('gears.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mt-3 form-group row">
                                    <label for="title">ギア名</label>
                                    <input 
                                        id="name"
                                        type="text" 
                                        name="name" 
                                        class="form-control @error('name') is-invalid @enderror" 
                                        value="{{ old('name') }}" 
                                        autofocus
                                    >
                                </div>
                                <div class="text-danger">
                                    <p>{{ $errors->first('name') }} </p>
                                </div>

                                <div class="form-group">
                                    <label for="maker">メーカーを選択</label>
                                    <p>
                                    <select id="maker" name="maker_name">
                                        @foreach(\MakerConst::MAKER_LIST as $key => $name)
                                            <option value="{{ $name }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    </p>
                                </div>
                                <div class="text-danger">
                                    <p>{{ $errors->first('') }} </p>
                                </div>

                                <div class="form-group">
                                    <label for="gear_img">画像を追加</label>
                                    <div class="col-lg-6">
                                        <input 
                                            id="gear_img"
                                            type="file" 
                                            name="gear_img"
                                        >
                                        <br><small class="text-dark">画像は任意です。JPEG,PNGのみ対応</small>
                                    </div>
                                </div>
                                <div class="text-danger">
                                    <p>{{ $errors->first('gear_img') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="comment">コメント</label>
                                        <textarea
                                            id="comment"
                                            name="comment" 
                                            class="form-control @error('comment') is-invalid @enderror" 
                                            rows="16" 
                                            class="col-lg-8"
                                            placeholder="本文">{{ old('comment') }}</textarea>
                                    
                                </div>
                                <div class="text-danger">
                                    <p>{{ $errors->first('comment') }}</p>
                                </div>

                                <div class="row justify-content-center">
                                    <button type="submit" class="btn col-lg-6 btn-success btn-block">投稿する</button>
                                </div>
                                <div class="row justify-content-center mt-2">
                                <a  class="btn col-lg-6 btn-secondary btn-block" href="{{ route('camps.index') }}">戻る</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

                

        </div>
    </div>

@endsection('content')