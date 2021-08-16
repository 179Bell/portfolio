<?php

namespace App\Http\Controllers;

use App\User;
use App\Gear;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * ユーザーページのためにギア情報を取得
     * 
     * @param int $id
     * @return Illuminate\Contracts\View\Factory
     */
    public function profile($id)
    {
        $user = new User;
        $user = User::find($id);
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

    /**
     * ユーザー情報の編集画面を返す
     * 
     * @param User $user
     * @return Illuminate\Contracts\View\Factory
     */
    public function edit(User $user) 
    {
        return view('users.edit', compact('user'));
    }

    /**
     * 編集したユーザー情報の保存
     * 
     * @param UserRequest $request
     * @param User $user
     * @return Illuminate\Contracts\View\Factory
     */
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

    /**
     * ユーザーの退会
     * 
     * @param User $user
     * @return Illuminate\Contracts\View\Factory
     */
    public function destroy(User $user)
    {
        $user->delete();
        return view('top');
    }
}
