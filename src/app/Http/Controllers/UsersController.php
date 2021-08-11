<?php

namespace App\Http\Controllers;

use App\User;
use App\Gear;
use App\Camp;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    public function profile($id)
    {
        $user = new User;
        $user = User::find($id);
        //ユーザーの持つギアの取得
        $gears = $user->gears()->get();
        //ユーザーがギアを持つかどうか確認
        if($gears->isEmpty()){
            return view('users.profile', compact('user', 'gears'));
            } else {
            //コレクションからidを取得
            foreach ($gears as $key => $value) {
                $gear_id = $value->id;
            }
            //ギア画像の取得、viewに返す
            $gearImgs = Gear::with('gearImgs')->find($gear_id);
            return view('users.profile', compact('user', 'gears', 'gearImgs'));
        }
    }

    public function edit(User $user) 
    {
        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $user->fill($request->all())->save();
        //ユーザーの持つギアの取得
        $gears = $user->gears()->get();
        //ユーザーがギアを持つかどうか確認
        if ($gears->isEmpty()) {
            return view('users.profile', compact('user', 'gears'));
            } else {
            //コレクションからidを取得
            foreach ($gears as $key => $value) {
                $gear_id = $value->id;
            }
            //ギア画像の取得、viewに返す
            $gearImgs = Gear::with('gearImgs')->find($gear_id);
            return view('users.profile', compact('user', 'gears', 'gearImgs'));
        }
    }

    public function destroy(User $user, Camp $camp)
    {
        $user->delete();
        return view('welcome');
    }
}
