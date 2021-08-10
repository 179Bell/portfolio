
<h3 class="text-center my-2 text-dark">
    <i class="fas fa-user mr-2 text-dark"></i>
    ユーザーページ
</h3>

<div class="row justify-content-center my-4">
    <img src="{{ asset('storage/images/'.$user->avatar )}}" width="100px">
</div>

<div class="row">
    <h3 class="col-md-6 text-dark">
        {{ $user->name }}
    </h3>
</div>

<div class="row">
    <h3 class="col-md-6 text-md-right text-dark">愛車</h3>
    <h3 class="col-md-6 text-dark">
        {{ $user->bike }}
    </h3>
</div>

<div class="d-flex justify-content-center my-2">
    <a class="btn btn-secondary col-md-2 mr-2" href="{{ route('camps.index') }}" role="button">戻る</a>
    @if(Auth::id() == $user->id)
        <a class="btn btn-success col-md-2" href="{{ route('users.edit', ['user' => $user]) }}" role="button">編集</a>
    @endif
</div>

@if (Auth::id() == $user->id)
    <div class="d-flex justify-content-center ">
        <a class="btn btn-success col-md-6" href="{{ route('gears.create') }}" role="button">ギアを登録する</a>
    </div>
@endif
