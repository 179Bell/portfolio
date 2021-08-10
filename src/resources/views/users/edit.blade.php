@extends('layouts.view')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div>
                    <div class="font-weight-bold text-center border-bottom pb-3 pt-3 mt-4" style="font-size: 24px">ユーザー情報編集</div>

                        <form method="POST" action="{{ route('users.update', ['user' => $user]) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                            <div class="form-group row">
                                <p class="col-md-12 text-center text-dark">
                                    <span class="text-danger">(※)</span>は入力必須項目です。
                                </p>
                            </div>

                            <!-- <div class="row justify-content-center mb-3">
                                <img src="/images/human.png">
                            </div> -->

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right text-dark">
                                    名前<span class="text-danger">(※)</span>
                                </label>
                                <div class="col-md-6">
                                    <input 
                                        id="name" 
                                        type="text" 
                                        class="form-control @error('name') is-invalid @enderror" 
                                        name="name" 
                                        value="{{ old('name') ?? $user->name }}" 
                                        autocomplete="name"
                                        placeholder="名無し名人"
                                        autofocus
                                    >
                                    <small class="text-dark">15字以内で入力してください。</small>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- <div class="form-group row">
                                <label for="avatar" class="col-md-4 col-form-label text-md-right">プロフィール画像</label>
                                <div class="col-md-6">
                                    <input 
                                        id="avatar" 
                                        type="file" 
                                        name="avatar" 
                                        class="@error('avatar') is-invalid @enderror"
                                        accept="image/jpeg, image/png"
                                    >
                                    @error('avatar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <br><small class="text-dark">サイズは1024Kbyteまで</small>
                                </div>
                            </div> -->

                            <div class="form-group row">
                                <label for="bike" class="col-md-4 col-form-label text-md-right text-dark">
                                    愛車<span class="text-danger">(※)</span>
                                </label>
                                <div class="col-md-6">
                                    <input 
                                        id="bike" 
                                        type="text" 
                                        class="form-control @error('bike') is-invalid @enderror" 
                                        name="bike" 
                                        value="{{ old('bike') ?? $user->bike }}" 
                                        autocomplete=""
                                        placeholder="ホンダ CB400SF"
                                    >
                                    <small class="text-dark">愛車の車種を入力してください</small>
                                    @error('bike')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-5 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    変更する</button>
                                <form action="{{ route('users.destroy', ['user' => $user]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div>
                                        <button type="submit" class="btn btn-danger">退会する</button>
                                    </div>
                                </form>
                            </div>

                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection('content')
