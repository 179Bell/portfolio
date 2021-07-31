<nav class="navbar navbar-expand navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('camps.index') }}"><i class="fas fa-campground"></i>ポートフォリオ</a>
    <ul class="navbar-nav ml-auto mr-3">
        @if(Auth::check())

            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.show', Auth::user()) }}">マイページ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout').submit();">ログアウト</a>
                <form id="logout" method="POST" action="{{ route('logout') }}">
                    @csrf
                </form>
            </li>

        @else

            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">ログイン</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">ユーザー登録</a>
            </li>

        @endif
    </ul>
</nav>