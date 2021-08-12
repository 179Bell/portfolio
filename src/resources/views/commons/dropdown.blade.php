<!-- ドロップダウン -->
<div class="dropdown">
    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-ellipsis-v"></i>
    </a>

    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="{{ route('camps.edit', ['camp' => $camp]) }}">
            <i class="fas fa-pen mr-1"></i>編集する
        </a>
    <div class="dropdown-divider"></div>
        <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $camp->id }}">
            <i class="fas fa-trash-alt mr-1"></i>削除する
        </a>
    </div>
</div>
<!-- ドロップダウン -->
<!-- モーダル -->
<div id="modal-delete-{{ $camp->id }}" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('camps.destroy', ['camp' => $camp]) }}">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    投稿を削除します。よろしいですか？
                </div>
                <div class="modal-footer justify-content-between">
                    <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                    <button type="submit" class="btn btn-danger">削除する</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- モーダル -->