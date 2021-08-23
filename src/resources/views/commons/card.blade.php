<!-- カードヘッダー -->
<div class="card-header">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex flex-row align-items-center">
                    <a href="{{ route('users.profile', ['id' => $camp->user->id]) }}">
                        <img src="{{ asset('https://shingoportfolio.s3.ap-northeast-1.amazonaws.com/'.$camp->user->avatar) }}" class="rounded-circle border" width="90" height="90">
                    </a>
                    <h5 class="font-weight-bold ml-2">{{ $camp->user->name }}</h5>
                    <p class="font-weight-lighter ml-2">{{ $camp->created_at->format('Y/m/d H:i') }}</p>
                </div>
            </div>
                @if (Auth::id() == $camp->user->id)
                    @include('commons.dropdown')
                @endif
        </div>
    </div>
</div>
<!--カードヘッダー-->
<div class="container">
    <a style="text-decoration:none" href="{{ route('camps.show', ['camp' => $camp]) }}" class="text-dark">
        <div class="card-body">
            <h2>{{ $camp->title }}</h2>
            @foreach ($camp->campImgs as $campImg)
                <img src="{{ asset('https://shingoportfolio.s3.ap-northeast-1.amazonaws.com/'.$campImg->img_path) }}" width="400" height="300">
            @endforeach
        </div>
        <div  class="card-body">
            <p><i class="fas fa-map-marker-alt"></i>{{ $camp->location }}</p>
            <p>{{ $camp->discription }}</p>
        </div>
    </a>
</div>




