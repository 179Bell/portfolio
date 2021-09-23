<?php

namespace App\Services;

use App\Gear;
use App\Http\Requests\GearRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

final class GearService
{
    public function store(GearRequest $request, Gear $gear)
    {
        // ギア情報を保存
        $gear->user_id = Auth::id();
        $gear->fill($request->all())->save();
        //画像のパスを取得、保存
        $gear_img = $request->file('gear_img');
        $path = Storage::disk('s3')->putFile('portfolio', $gear_img, 'public');
        $gear->gearImgs()->create(['img_path' => $path]);
    }

    public function destroy(Gear $gear)
    {
        $gear_imgs = Gear::find($gear->id)->gearImgs;
        foreach ($gear_imgs as $key => $value) {
            $url = $value->img_path;
        }
        $s3_delete = Storage::disk('s3')->delete($url);
        $gear->delete();
    }
}