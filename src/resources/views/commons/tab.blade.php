<ul class="nav nav-tabs nav-justified mt-4">
    <li class="nav-item">
        <a class="nav-link {{ Request::is('users/'.$user->id) ? 'active' : '' }} text-dark" href="{{ route('users.profile', ['id' => $user->id]) }}">ギア一覧</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('camps_list/'.$user->id) ? 'active' : '' }} text-dark" href="{{ route('camps.list', ['id' => $user->id]) }}">キャンプ一覧</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('bookmark/'.$user->id) ? 'active' : '' }} text-dark" href="{{ route('bookmark.show', ['id' => $user->id]) }}">お気に入り</a>
    </li>
</ul>
