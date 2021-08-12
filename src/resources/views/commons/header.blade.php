<nav class="navbar navbar-expand navbar-light bg-success border">
    <a class="navbar-brand text-light" href="{{ route('camps.index') }}"><i class="fas fa-campground"></i>ポートフォリオ</a>

    
    <ul class="navbar-nav ml-auto mr-3">
        @if (Auth::check())
            <li class="nav-item mt-3 mr-2">
            <a href="{{ route('camps.create') }}" class="btn btn-outline-light"><i class="fas fa-map-signs"></i>キャンプを投稿する</a>
            </li>
            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" 
                    aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('storage/images/'.Auth::user()->avatar) }}" class="rounded-circle" width="50" height="50">
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" type="button" href="{{ route('users.profile', ['id' => Auth::id()]) }}">
                    <i class="far fa-user"></i>マイページ
                </a>
                <div class="dropdown-divider"></div>
                <button form="logout-button" class="dropdown-item text-danger" type="submit" >
                    <i class="fas fa-sign-out-alt"></i>ログアウト
                </button>
                </div>
            </li>
            <form id="logout-button" method="POST" action="{{ route('logout') }}">
                @csrf
            </form>

        @else

            <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i>ログイン</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('register') }}"><i class="far fa-user"></i>ユーザー登録</a>
            </li>

        @endif
    </ul>
</nav>