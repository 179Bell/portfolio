<?php

namespace App\Services;

use App\User;
use App\Gear;
use App\Http\Requests\UserRequest;

final class UserService
{
    public function profile($id)
    {
        //ユーザーの検索
        $user = User::find($id);
        //ユーザーの持つギアの取得
        $gears = $user->gears;
        //ユーザーがギアを持つかどうか確認
        if ($gears->isEmpty()) {
            return [$user, $gears];
        } else {
            return [$user, $gears];
        //コレクションからidを取得
            foreach ($gears as $key => $value) {
                $gear_id = $value->id;
            }
        //ギア画像の取得、controllerに返す
            $gearImgs = Gear::with('gearImgs')->find($gear_id);
            return $gearImgs;
        }
    }

    public function update(UserRequest $request, User $user)
    {
        $user->fill($request->all())->save();
        //ユーザーの持つギアの取得
        $gears = $user->gears;
        //ユーザーがギアを持つかどうか確認
        if ($gears->isEmpty()) {
            return [$user, $gears];
        } else {
            return [$user, $gears];
            //コレクションからidを取得
            foreach ($gears as $key => $value) {
                $gear_id = $value->id;
            }
            //ギア画像の取得、controllerに返す
            $gearImgs = Gear::with('gearImgs')->find($gear_id);
            return [$user, $gears, $gearImgs];
        }
    }

    public function destroy(User $user)
    {
        $user->delete();
    }
}