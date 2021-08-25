<?php

namespace App\Services;

use App\User;

final class BookmarkService
{
    public function show($id)
    {
        $user = User::find($id);
        //お気に入りがあるかどうか確認
        if ($user->bookmarks->isEmpty()) {
            return $user;
        } else {
            return $user;
            // あった場合はidを取得して画像を取得
            foreach ($user->bookmarks as $bookmark) {
                $camp_id = $bookmark->id;
            }
        $campImgs = Camp::with('campImgs')->find($camp_id);
        return $campImgs;
        }
    }
}