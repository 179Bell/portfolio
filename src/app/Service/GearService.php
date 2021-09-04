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
        if ($request->hasFile('gear_img')) {
            $gear_img = $request->file('gear_img');
            $path = Storage::disk('s3')->putFile('portfolio', $gear_img, 'public');
            $gear->gearImgs()->create(['img_path' => $path]);
        } else {
            // リクエストが画像を持たない場合
            $defalut_img = 'portfolio/noimage.jpg';
            $gear->gearImgs()->create(['img_path' => $defalut_img]);
        }
    }

    public function destroy(Gear $gear)
    {
        // campimgsテーブルからパスを取得
        $gear_imgs = Gear::find($gear->id)->gearImgs;
        foreach ($gear_imgs as $gear_img) {
            $url = $gear_img->img_path;
        }
        // S3から画像を削除
        if ($url != 'portfolio/noimage.jpg') {
            $s3_delete = Storage::disk('s3')->delete($url);
            $gear->delete();
        } else {
        // デフォルト画像であればDBのみ削除
            $gear->delete();
        }   
    }
}