<?php

namespace App\Http\Controllers;

use App\Gear;
use App\Http\Requests\GearRequest;
use Illuminate\Support\Facades\Auth;

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
            $filename = $request->file('gear_img')->getClientOriginalName();
            $img_path = $request->file('gear_img')->storeAs('public/images', $filename);
            $gear->gearImgs()->create(['img_path' => $filename]);
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
        $gear->delete();
        return redirect()->route('top')->with('flash_message', 'ギアを削除しました');;
    }
}
