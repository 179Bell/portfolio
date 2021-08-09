<?php

namespace App\Http\Controllers;

use App\User;
use App\Gear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function profile($id)
    {
        $user = new User;
        $user = User::find($id);
        //ユーザーの持つギアの取得
        $gears = $user->gears()->get();
        // dd($gears);
        if($gears->isEmpty()){
            return view('users.profile', compact('user', 'gears'));
            } else {
            //コレクションからidを取得
            foreach($gears as $key=>$value){
                $gear_id = $value->id;
            }
            //ギア画像の取得
            $gearImgs = Gear::with('gearImgs')->find($gear_id);
            return view('users.profile', compact('user', 'gears', 'gearImgs'));
        }
    }
}
