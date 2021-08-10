<?php

namespace App\Http\Controllers;

use App\User;
use App\Camp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarksController extends Controller
{
    public function store(Request $request, $id)
    {
        \Auth::user()->bookmark($id);
        return back();
    }

    public function destroy($id)
    {
        \Auth::user()->unbookmark($id);
        return back();
    }

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
