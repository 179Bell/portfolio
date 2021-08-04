<!-- いいねボタン -->
<div class="container mb-3">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- 自分の投稿にはボタンを表示しない -->
            @if(Auth::check())
                @if( Auth::id() !=  $camp->user_id )
                    @if(Auth::user()->is_like($camp->id))
                        <div class="float-right">
                            <form action="{{ route('unlike', $camp->id) }}" method="POST">
                                @csrf
                                <input type="submit" value="&#xf164;いいねを取り消す" class="fas btn btn-danger">
                            </form>
                        </div>
                    @else
                        <div class="float-right">
                            <form action="{{ route('like', $camp->id) }}" method="POST">
                            @csrf
                                <input type="submit" value="&#xf164;いいね" class="fas btn btn-success">
                            </form>
                        </div>
                    @endif

                    @if(Auth::user()->is_bookmark($camp->id))
                        <div class="float-right ml-2">
                            <form action="{{ route('unbookmark', $camp->id) }}" method="POST">
                                @csrf
                                <input type="submit" value="&#xf7a9;お気に入りから外す" class="fas btn btn-danger">
                            </form>
                        </div>
                    @else
                        <div class="float-right">
                            <form action="{{ route('bookmark', $camp->id) }}" method="POST">
                            @csrf
                                <input type="submit" value="&#xf004;お気に入りに登録する" class="fas btn btn-success">
                            </form>
                        </div>
                    @endif 
                @endif
            @endif
        </div>
    </div>
</div>