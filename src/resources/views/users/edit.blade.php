@extends('layouts.view')

@section('content')
    <div class="card  mt-4">
        <div class="card-header">
            <h3 class="text-center">ユーザー情報編集</h3>
        </div>

        <form method="POST" action="{{ route('users.update', ['user' => $user]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

            <div class="form-group row">
                <p class="col-lg-12 text-center text-dark mt-2">
                    <span class="text-danger">(※)</span>は入力必須項目です。
                </p>
            </div>

            <div class="form-group row">
                <label for="name" class="col-lg-4 col-form-label text-lg-right text-dark">
                    名前<span class="text-danger">(※)</span>
                </label>
                <div class="col-lg-6">
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

            <div class="form-group row">
                <label for="bike" class="col-lg-4 col-form-label text-lg-right text-dark">
                    愛車<span class="text-danger">(※)</span>
                </label>
                <div class="col-lg-6">
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

            <div class="d-flex justify-content-center mb-3">
                <button type="submit" class="btn aqua-gradient">
                    <i class="fas fa-user-edit"></i>変更する</button>
                <div class="ml-3">
                    <a class="btn btn-danger text-white" data-toggle="modal" data-target="#modal-delete-user">
                        <i class="fas fa-user-alt-slash"></i>退会する</button>
                    </a>
                </div>
            </div>
        </form>
    </div>
    <!-- モーダル -->
    <div id="modal-delete-user" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('users.destroy', ['user' => $user]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        退会するとすべてのデータが失われます。よろしいですか？
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                        <button type="submit" class="btn btn-danger">退会する</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection('content')
