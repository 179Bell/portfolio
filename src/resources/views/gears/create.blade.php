@extends('layouts.view')

@section('content')


<div class="row">
    <div class="col-12">
        <div class="card mt-3">
            <div class="card-body pt-0">
                <div class="card-text">
                    <form method="POST" action="{{ route('gears.store') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="col-md-8 mt-3">
                                <label for="title">ギア名</label>
                                <input 
                                    id="name"
                                    type="text" 
                                    name="name" 
                                    class="form-control" 
                                    value="{{ old('name') }}" 
                                    autofocus
                                >
                            </div>
                            <div class="text-danger">
                                <p>{{ $errors->first('name') }} </p>
                            </div>

                            <div class="form-group row">
                                <label for="maker">メーカーを選択</label>
                                <p>
                                <select id="maker" name="maker_id">
                                    @foreach(\MakerConst::MAKER_LIST as $key => $name)
                                    <option value="{{ $key }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                                </p>
                            </div>
                            <div class="text-danger">
                                <p>{{ $errors->first('') }} </p>
                            </div>

                            <div class="form-group row">
                                <label for="gear_img">画像を追加</label>
                                <div class="col-md-6">
                                    <input 
                                        id="gear_img"
                                        type="file" 
                                        name="gear_img"
                                    >
                                    <br><small class="text-dark">サイズは1024Kbyteまで</small>
                                </div>
                            </div>
                            <div class="text-danger">
                                <p>{{ $errors->first('gear_img') }}</p>
                            </div>

                            <div class="col-md-8 form-group">
                            <label for="comment">コメント</label>
                            <textarea
                                id="comment"
                                name="comment" 
                                class="form-control" 
                                rows="16" 
                                placeholder="本文">{{ old('comment') }}</textarea>
                            </div>
                            <div class="text-danger">
                                <p>{{ $errors->first('comment') }}</p>
                            </div>

                        <button type="submit" class="btn col-md-8 btn-primary btn-block">投稿する</button>
                        <a  class="btn btn-secondary col-md-8 btn-block" href="{{ route('camps.index') }}">戻る</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection('content')