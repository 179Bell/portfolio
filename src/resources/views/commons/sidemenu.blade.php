<div class="sidemenu mt-3 d-flex border">
    <ul class="nav nav-pills flex-column">
        @if(Auth::check())
            <li class="nav-item mt-2">
                <a class="nav-link text-dark" href="{{ route('camps.create') }}"><i class="fas fa-pencil-alt"></i>キャンプを投稿する</a>
            </li>
        @endif
        <li class="nav-item mt-2">
            <a class="nav-link text-dark" href="#"><i class="fab fa-free-code-camp"></i>キャンプを調べる</a>
        </li>
        <li class="nav-item mt-2">
            <a class="nav-link text-dark" href="#"><i class="far fa-compass"></i>ギアを調べる</a>
        </li>
    </ul>
</div>

