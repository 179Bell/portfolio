<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CampRequest;
use App\Camp;
use App\User;
use App\CampImg;
use Illuminate\Support\Facades\Auth;

class CampsController extends Controller
{
    public function index()
    {
        return view('camps.index');
    }

    public function create()
    {
        return view('camps.create');
    }

    public function store(CampRequest $request, Camp $camp, CampImg $campImg)
    {
        // キャンプ情報を保存
        $camp->user_id = Auth::id();
        $camp->fill($request->all())->save();
        //画像のパスを取得、保存
        $filename = $request->file('camp_img')->getClientOriginalName();
        $img_path = $request->file('camp_img')->storeAs('public/images', $filename);
        $camp->campImgs()->create(['img_path' => $img_path]);

        return redirect()->route('camps.index');
    }
}
