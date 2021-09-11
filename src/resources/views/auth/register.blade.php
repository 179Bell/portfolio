@extends('layouts.view')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card  mt-4">
                    <div class="card-header font-weight-bold text-center border-bottom pb-3 pt-3" style="font-size: 24px">ユーザー登録</div>

                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf
                        <div>
                            
                        </div>
                            <div class="form-group row">
                                <p class="col-md-12 text-center text-dark mt-2">
                                    <span class="text-danger">(※)</span>は入力必須項目です。
                                </p>
                            </div>

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
                                        value="{{ old('name') }}" 
                                        autocomplete="name"
                                        placeholder="二輪太郎"
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

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right text-dark">
                                    メールアドレス<span class="text-danger">(※)</span>
                                </label>
                                <div class="col-md-6">
                                    <input 
                                        id="email" 
                                        type="email" 
                                        class="form-control @error('email') is-invalid @enderror" 
                                        name="email" 
                                        value="{{ old('email') }}" 
                                        autocomplete="email" 
                                        placeholder="****@mail.com"
                                    >
                                    <small class="text-dark">今回は仮のメールアドレスを入力ください。</small>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
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
                                    <br><small class="text-dark">画像は任意です。JPEG,PNGのみ</small>
                                </div>
                            </div>

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
                                        value="{{ old('bike') }}" 
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

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right text-dark">
                                    パスワード<span class="text-danger">(※)</span>
                                </label>
                                <div class="col-md-6">
                                    <input 
                                        id="password" 
                                        type="password" 
                                        class="form-control @error('password') is-invalid @enderror" 
                                        name="password" 
                                        autocomplete="new-password" 
                                        placeholder="********"
                                    >
                                    <small class="text-dark">半角英数字8文字以上を入力してください。</small>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right text-dark">
                                    パスワード(確認)<span class="text-danger">(※)</span>
                                </label>
                                <div class="col-md-6">
                                    <input 
                                        id="password-confirm" 
                                        type="password" 
                                        class="form-control" 
                                        name="password_confirmation" 
                                        autocomplete="new-password" 
                                        placeholder="********"
                                    >
                                    <small class="text-dark">確認のためパスワードを再度入力してください。</small>
                                </div>
                            </div>

                            <div class="col-md-5 offset-md-5 mb-5">
                                <button type="submit" class="btn aqua-gradient">
                                    登録</button>
                            </div>

                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection('content')
