@extends('layouts.view')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">                            
                <div class="font-weight-bold text-center border-bottom pb-3 pt-3 mt-4" style="font-size: 24px">
                    ログイン
                </div>
                    
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group row mt-4">
                        <label for="email" class="col-lg-4 col-form-label text-md-right">メールアドレス</label>
                        <div class="col-lg-6">
                            <input id="email" type="email" class="form-control " name="email" value="{{ old('email') }}" autocomplete="email" autofocus="">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-lg-4 col-form-label text-lg-right">パスワード</label>
                        <div class="col-lg-6">
                            <input id="password" type="password" class="form-control " name="password" autocomplete="current-password">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row justify-content-center mb-0">
                        <button type="submit" class="btn btn-primary">
                            ログイン
                        </button>
                    </div>
                </form> 
            </div>
        </div>
    </div>
@endsection('content')