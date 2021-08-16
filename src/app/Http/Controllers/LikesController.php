<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    /**
     * お気に入りの登録
     * 
     * @param int $id
     * @return Illuminate\Http\RedirectResponse
     */
    public function store($id)
    {
        Auth::user()->like($id);
        return back();
    }

    /**
     * お気に入りの削除
     * 
     * @param int $id
     * @return Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Auth::user()->unlike($id);
        return back();
    }
}
