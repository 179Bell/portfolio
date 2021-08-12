<!-- いいねボタン -->
<div class="container mb-3">
    <div class="row ">
        <div class="col-lg-12">
            <!-- 自分の投稿にはボタンを表示しない -->
            @if (Auth::check() && Auth::id() !=  $camp->user_id)
                @if (Auth::user()->is_like($camp->id))
                    <div class="d-flex flex-row justify-content-end">
                        <form action="{{ route('unlike', $camp->id) }}" method="POST">
                            @csrf
                            <input type="submit" value="&#xf164;いいね" class="fas btn btn-danger">
                        </form>
                        <div>
                        <p>:{{ $camp->like_users()->count() }}</p>
                        </div>
                    </div>
                @else
                    <div class="d-flex flex-row justify-content-end">
                        <form action="{{ route('like', $camp->id) }}" method="POST">
                        @csrf
                            <input type="submit" value="&#xf164;いいね" class="fas btn btn-success">
                        </form>
                        <div>
                        <p>:{{ $camp->like_users()->count() }}</p>
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            @if (Auth::check() && Auth::id() !=  $camp->user_id)
                @if (Auth::user()->is_bookmark($camp->id))
                    <div class="d-flex flex-row justify-content-end">
                        <form action="{{ route('unbookmark', $camp->id) }}" method="POST">
                            @csrf
                            <input type="submit" value="&#xf7a9;お気に入り" class="fas btn btn-danger">
                        </form>
                        <div>
                            <p>:{{ $camp->bookmark_users()->count() }}</p>
                        </div>
                    </div>
                @else
                    <div class="d-flex flex-row justify-content-end">
                        <form action="{{ route('bookmark', $camp->id) }}" method="POST">
                        @csrf
                            <input type="submit" value="&#xf004;お気に入り" class="fas btn btn-success">
                        </form>
                        <div>
                            <p>:{{ $camp->bookmark_users()->count() }}</p>
                        </div>
                    </div>
                @endif 
            @endif
        </div>
    </div>
</div>