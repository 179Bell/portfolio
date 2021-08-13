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
    public function __construct()
    {
        $this->authorizeResource(Camp::class, 'camp');
    }

    public function index()
    {
        //N+1問題対策
        $camps = Camp::with('user', 'campImgs')->orderBy('id', 'desc')->paginate(10);
        return view('camps.index', compact('camps'));
    }

    public function show(Camp $camp)
    {
        $campImgs = Camp::with('campImgs')->get();
        return view('camps.show', compact('camp', 'campImgs'));
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
        if ($request->hasFile('camp_img')) {
            $filename = $request->file('camp_img')->getClientOriginalName();
            $img_path = $request->file('camp_img')->storeAs('public/images', $filename);
            $camp->campImgs()->create(['img_path' => $filename]);
        }
        return redirect()->route('camps.index')->with('flash_message', '投稿が完了しました');;
    }

    public function edit(Camp $camp)
    {
        //画像を取得
        $campImgs = Camp::with('campImgs')->get();
        return view('camps.edit', compact('camp', 'campImgs'));
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
        return redirect()->route('camps.index')->with('flash_message', '投稿を更新しました');;
    }

    public function destroy(Camp $camp)
    {
        $camp->delete();
        return redirect()->route('camps.index')->with('flash_message', '投稿を削除しました');
    }

    public function camp_list($id)
    {
        $user = User::find($id);
        // キャンプ情報を取得
        $camps = $user->camps()->get();
        if ($camps->isEmpty()) {
            return view('camps.list', compact('user', 'camps'));
        } else {
            //コレクションからidを取得
            foreach ($camps as $key => $value) {
                $camp_id = $value->id;
            }
        }
        //キャンプ画像の取得
        $campImgs = Camp::with('campImgs')->find($camp_id);
        return view('camps.list', compact('user', 'camps', 'campImgs'));
    }

    public function search(Request $request){
        //requestから検索ワードを受け取る
        $keyword = $request->keyword;

        $query = Camp::query();
        // キャンプを検索
        if (!empty($keyword)) {
            $query->where('location', 'like', '%'.$keyword.'%');
        }
        $data = $query->get();
        // 取得したクエリからidを取得しユーザー情報と画像を取得
        foreach ($data as $key => $value) {
            $camp_id = $value->id;
            $user_id = $value->user_id;
            $user = User::find($user_id);
            $campImgs = Camp::with('campImgs')->find($camp_id);
        }
        return view('camps.result', compact('data', 'user', 'campImgs'));
    }
}
