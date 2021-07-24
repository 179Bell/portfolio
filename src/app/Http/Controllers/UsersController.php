<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function show()
    {
        //ユーザー情報の取得
        $auth = Auth::user();
        return view('users.show', ['auth' => $auth]);
    }
}
