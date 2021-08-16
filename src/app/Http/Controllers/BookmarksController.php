<?php

namespace App\Http\Controllers;

use App\User;
use App\Camp;
use Illuminate\Support\Facades\Auth;

class BookmarksController extends Controller
{
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
        $user = User::find($id);
        //お気に入りがあるかどうか確認
        if ($user->bookmarks->isEmpty()) {
            return view('bookmark.show', compact('user'));
        } else {
            // あった場合はidを取得して画像を取得
            foreach ($user->bookmarks as $bookmark) {
                $camp_id = $bookmark->id;
            }
            $campImgs = Camp::with('campImgs')->find($camp_id);
            return view('bookmark.show', compact('user', 'campImgs'));
        }        
    }
}
