<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center my-2 text-dark">
            <i class="fas fa-user mr-2 text-dark"></i>
            ユーザーページ
            </h3>

            <div class="row">
                <div class="col-lg-5 d-flex justify-content-end">
                    <img src="{{ asset('storage/images/'.$user->avatar )}}" class="rounded-circle border border-black" height="300" width="300">
                </div>
                
                <div class="col-lg-7 d-flex justify-content-center align-items-center">
                    <div class="">
                        <h3>名前&emsp;:&emsp;{{ $user->name }}</h3>
                        <h3>愛車&emsp;:&emsp;{{ $user->bike }}</h3>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-2 my-2">
                <a class="btn btn-secondary col-md-2 mr-2" href="{{ route('camps.index') }}" role="button">戻る</a>
                @if(Auth::id() == $user->id)
                    <a class="btn btn-primary col-md-2" href="{{ route('users.edit', ['user' => $user]) }}" role="button"><i class="fas fa-user-edit"></i>編集</a>
                @endif
            </div>

            @if (Auth::id() == $user->id)
                <div class="d-flex justify-content-center ">
                    <a class="btn btn-success col-md-6" href="{{ route('gears.create') }}" role="button"><i class="far fa-plus-square"></i>ギアを登録する</a>
                </div>
            @endif
        </div>
    </div>
</div>

