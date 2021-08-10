<?php

namespace App\Http\Controllers;

use App\User;
use App\Gear;
use App\GearImg;
use Illuminate\Http\Request;
use App\Http\Requests\GearRequest;
use Illuminate\Support\Facades\Auth;

class GearsController extends Controller
{
    public function create()
    {
        return view('gears.create');
    }

    public function store(GearRequest $request, Gear $gear, GearImg $gearImg)
    {
        // ギア情報を保存
        $gear->user_id = Auth::id();
        $gear->fill($request->all())->save();
        //画像のパスを取得、保存
        $filename = $request->file('gear_img')->getClientOriginalName();
        $img_path = $request->file('gear_img')->storeAs('public/images', $filename);
        $gear->gearImgs()->create(['img_path' => $filename]);

        return redirect()->route('camps.index');
    }

    // public function gear_list($id)
    // {
    //     $user = User::find($id);
    //     return view('gears.list', compact('user', 'gears'));
    // }
}
