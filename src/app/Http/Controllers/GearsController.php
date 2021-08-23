<?php

namespace App\Http\Controllers;

use App\Gear;
use App\Http\Requests\GearRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GearsController extends Controller
{
    /**
     * ギアの登録画面を返す
     */
    public function create()
    {
        return view('gears.create');
    }

    /**
     * ギアの登録
     * 
     * @param GearRequest $request
     * @param Gear $gear
     * @return Illuminate\Http\RedirectResponse
     */
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
            $defalut_img = 'portfolio/noimage2.jpg';
            $gear->gearImgs()->create(['img_path' => $defalut_img]);
        }
        return redirect()->route('top')->with('flash_message', 'ギアを登録しました');;
    }

    /**
     * ギアの削除
     * 
     * @param Gear $gear
     * @return Illuminate\Http\RedirectResponse
     */

    public function destroy(Gear $gear)
    {
        $gear_imgs = Gear::find($gear->id)->gearImgs;
        foreach ($gear_imgs as $key => $value) {
            $url = $value->img_path;
        }
        $s3_delete = Storage::disk('s3')->delete($url);
        $gear->delete();
        return redirect()->route('top')->with('flash_message', 'ギアを削除しました');;
    }
}
