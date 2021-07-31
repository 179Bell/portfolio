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
        //N+1問題対策
        $camps = Camp::with('user', 'campImgs')->orderBy('id', 'desc')->paginate(10);
        return view('camps.index', ['camps' => $camps]);
    }

    public function show(Camp $camp)
    {
        $campImgs = Camp::with('campImgs')->get();
        return view('camps.show', ['camp' => $camp, 'campImgs' => $campImgs]);
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
        $camp->campImgs()->create(['img_path' => $filename]);

        return redirect()->route('camps.index');
    }

    public function edit(Camp $camp)
    {
        //画像を取得
        $campImgs = Camp::with('campImgs')->get();
        return view('camps.edit', ['camp' => $camp, 'campImgs' => $campImgs]);
    }

    public function update(CampRequest $request, Camp $camp, CampImg $campImg)
    {
                // キャンプ情報を更新
                $camp->fill($request->all())->save();
                //画像が更新されているか確認、更新
                if ($request->hasFile('camp_img')) {
                    $filename = $request->file('camp_img')->getClientOriginalName();
                    $img_path = $request->file('camp_img')->storeAs('public/images', $filename);
                    $camp->campImgs()->create(['img_path' => $filename]);
                }
                return redirect()->route('camps.index');
    }

}
