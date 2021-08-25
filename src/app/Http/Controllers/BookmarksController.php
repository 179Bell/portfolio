<?php

namespace App\Http\Controllers;

use App\User;
use App\Camp;
use Illuminate\Support\Facades\Auth;
use App\Services\BookmarkService;

class BookmarksController extends Controller
{
    public function __construct(BookmarkService $bookmarkService)
    {
        $this->bookmarkService = $bookmarkService;
    }
    /**
     * お気に入りの登録
     * 
     * @param int $id キャンプのid
    */
    public function store($id)
    {
        Auth::user()->bookmark($id);
        return back();
    }

    /**
     * お気に入りの削除
     * 
     * @param int $id キャンプのid
     */
    public function destroy($id)
    {
        Auth::user()->unbookmark($id);
        return back();
    }

    /**
     * お気に入りをユーザーページのタブに表示する
     * 
     * @param int $id キャンプのid
     * @return array ユーザー情報、お気に入りがあった場合はその画像
     */
    public function show($id)
    {
        $user = $this->bookmarkService->show($id);
        $campImgs = $this->bookmarkService->show($id);
        return view('bookmark.show', compact('user', 'campImgs'));
    }
}
