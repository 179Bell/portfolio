<!-- いいねボタン -->
<div class="container mb-3">
    <div class="row d-flex flex-row">
        <div class="col-lg-12">
            <!-- 自分の投稿にはボタンを表示しない -->
            @if (Auth::check() && Auth::id() !=  $camp->user_id)
                @if (Auth::user()->is_bookmark($camp->id))
                <div class="text-right">
                    <img src="https://shingoportfolio.s3.ap-northeast-1.amazonaws.com/portfolio/%E3%83%8F%E3%83%BC%E3%83%88.png" width="30px">
                    <a href="{{ route('unbookmark', $camp->id) }}" class="btn peach-gradient btn-block btn-sm col-lg-2">
                        お気に入り
                        <span class="badge">
                            {{ $camp->bookmark_users()->count() }}
                        </span>
                    </a>
                </div>
                @else
                <div class="text-right">
                    <img src="https://shingoportfolio.s3.ap-northeast-1.amazonaws.com/portfolio/%E3%83%8F%E3%83%BC%E3%83%88.png" width="30px">
                    <a href="{{ route('bookmark', $camp->id) }}" class="btn grey btn-block btn-sm col-lg-2">
                        お気に入り
                        <span class="badge">
                            {{ $camp->bookmark_users()->count() }}
                        </span>
                    </a>
                </div>
                @endif 
            @endif
        </div>
    </div>
</div>