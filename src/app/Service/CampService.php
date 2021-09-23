<?php

namespace App\Services;

use App\User;
use App\Camp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CampRequest;
use Illuminate\Support\Facades\Storage;

final class CampService
{
    /**
     * 一覧のためのキャンプ情報を取得
     * 
     * @return 
     */
    public function index()
    {
         //N+1問題対策
        $camps = Camp::with('user', 'campImgs')->orderBy('id', 'desc')->paginate(3);
        return $camps;
    }

    /**
     * キャンプ詳細画面のための情報を取得
     * 
     * @return
     */
    public function show()
    {
        $campImgs = Camp::with('campImgs')->get();
        return $campImgs;
    }

    /**
     * キャンプ情報を保存する
     * 
     * @return
     */
    public function store(CampRequest $request, Camp $camp)
    {
        // キャンプ情報を保存
        $camp->user_id = Auth::id();
        $camp->fill($request->all())->save();
        //画像のパスを取得、保存
        if ($request->hasFile('camp_img')) {
            //画像があった場合、リクエストから画像を取得
            $camp_img = $request->file('camp_img');
            // S3に保存
            $url = Storage::disk('s3')->putFile('portfolio', $camp_img, 'public');
            // DBにURLを保存
            $camp->campImgs()->create(['img_path' => $url]);
        } else {
            //リクエストに画像がない場合はデフォルト画像を保存する。
            $defalut_img = 'portfolio/noimage2.jpg';
            $camp->campImgs()->create(['img_path' => $defalut_img]);
        }
    }

    public function edit()
    {
        //画像を取得
        $campImgs = Camp::with('campImgs')->get();
        return $campImgs;
    }

    public function update(CampRequest $request, Camp $camp)
    {
        // キャンプ情報を更新
        $camp->fill($request->all())->save();
        //画像が更新されているか確認、更新
        if ($request->hasFile('camp_img')) {
            $camp_img = $request->file('camp_img');
            $url = Storage::disk('s3')->putFile('portfolio', $camp_img, 'public');
            $camp->campImgs()->create(['img_path' => $url]);
        }
    }

    public function destroy(Camp $camp)
    {
        // campimgsテーブルからパスを取得
        $camp_imgs = Camp::find($camp->id)->campImgs;
        foreach ($camp_imgs as $camp_img) {
            $url = $camp_img->img_path;
        }
        // S3から画像を削除
        if ($url != 'portfolio/noimage2.jpg') {
            $s3_delete = Storage::disk('s3')->delete($url);
            $camp->delete();
        } else {
        // デフォルト画像であればDBのみ削除
            $camp->delete();
        }        
    }

    public function camp_list($id)
    {
        $user = User::find($id);
        // キャンプ情報を取得
        $camps = $user->camps()->get();
        if ($camps->isEmpty()) {
            return [$user, $camps];
        } else {
            return [$user, $camps];
            //コレクションからidを取得
            foreach ($camps as $key => $value) {
                $camp_id = $value->id;
            }
            //キャンプ画像の取得
            $campImgs = Camp::with('campImgs')->find($camp_id);
            return $campImgs;
        }
    }

    public function search(Request $request)
    {
        //requestから検索ワードを受け取る
        $keyword = $request->keyword;

        $query = Camp::query();
        // キャンプを検索
        if (!empty($keyword)) {
            $query->where('location', 'like', '%'.$keyword.'%');
        } else {
            $message = '検索結果はありませんでした';
            return $message;
        }
        // クエリから検索結果を取得
        $data = $query->get();
        if ($data->isEmpty()) {
            $message = '検索結果はありませんでした';
            return $message;
        } else {
            // 取得したクエリからidを取得しユーザー情報と画像を取得
            foreach ($data as $key => $value) {
            $camp_id = $value->id;
            $user_id = $value->user_id;
            $user = User::find($user_id);
            $campImgs = Camp::with('campImgs')->find($camp_id);
        }
        return [$data, $user, $campImgs];
        }
    }
}