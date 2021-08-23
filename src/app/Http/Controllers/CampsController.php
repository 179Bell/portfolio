<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CampRequest;
use App\Camp;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CampsController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Camp::class, 'camp');
    }

    /**
     * 一覧画面にキャンプ一覧を表示する
     * 
     * @return Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        //N+1問題対策
        $camps = Camp::with('user', 'campImgs')->orderBy('id', 'desc')->paginate(10);
        return view('camps.index', compact('camps'));
    }

    /**
     * キャンプの詳細を表示する
     * 
     * @param Camp $camp
     * @return Illuminate\Contracts\View\Factory
     */
    public function show(Camp $camp)
    {
        $campImgs = Camp::with('campImgs')->get();
        return view('camps.show', compact('camp', 'campImgs'));
    }

    /**
     * キャンプ投稿画面を返す
     * 
     * @return Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('camps.create');
    }
    
    /**
     * キャンプを投稿する
     * 
     * @param CampRequest $request
     * @param Camp $camp
     * @return Illuminate\Http\RedirectResponse
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
        return redirect()->route('top')->with('flash_message', '投稿が完了しました');;
    }

    /**
     * キャンプ編集画面を返す
     * 
     * @param Camp $camp
     * @return Illuminate\Contracts\View\Factory
     */
    public function edit(Camp $camp)
    {
        //画像を取得
        $campImgs = Camp::with('campImgs')->get();
        return view('camps.edit', compact('camp', 'campImgs'));
    }

    /**
     * 編集したキャンプを保存する
     * 
     * @param CampRequest $request
     * @param Camp $camp
     * @return Illuminate\Http\RedirectResponse
     */
    public function update(CampRequest $request, Camp $camp)
    {
        // キャンプ情報を更新
        $camp->fill($request->all())->save();
        //画像が更新されているか確認、更新
        if ($request->hasFile('camp_img')) {
            $camp_img = $request->file('camp_img');
            $url = Storage::disk('s3')->putFile('portfolio', $camp_img, 'public');
            $camp->campImgs()->create(['img_path' => $url]);
        } else {
            $defalut_img = 'portfolio/noimage2.jpg';
            $camp->campImgs()->create(['img_path' => $defalut_img]);
        }
        return redirect()->route('top')->with('flash_message', '投稿を更新しました');;
    }

    /**
     * キャンプを削除する
     * 
     * @param Camp $camp
     * @return Illuminate\Http\RedirectResponse
     */
    public function destroy(Camp $camp)
    {
        // campimgsテーブルからパスを取得
        $camp_imgs = Camp::find($camp->id)->campImgs;
        foreach ($camp_imgs as $key => $value) {
            $url = $value->img_path;
        }
        // S3から画像を削除
        if ($url != 'portfolio/noimage2.jpg') {
            $s3_delete = Storage::disk('s3')->delete($url);
            $camp->delete();
        } else {
        // デフォルト画像であればDBのみ削除
            $camp->delete();
        }
        
        return redirect()->route('top')->with('flash_message', '投稿を削除しました');
    }

    /**
     * キャンプ一覧をユーザーページのタブに表示する
     * 
     * @param int $id
     * @return Illuminate\Contracts\View\Factory
     */
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

    /**
     * キャンプを検索する
     * 
     * @param Request $request
     * @return Illuminate\Contracts\View\Factory
     */
    public function search(Request $request){
        //requestから検索ワードを受け取る
        $keyword = $request->keyword;
        
        $query = Camp::query();
        // キャンプを検索
        if (!empty($keyword)) {
            $query->where('location', 'like', '%'.$keyword.'%');
        } else {
            $message = '検索結果はありませんでした';
            return view('camps.result', compact('message'));
        }
        // クエリから検索結果を取得
        $data = $query->get();
        if ($data->isEmpty()) {
            $message = '検索結果はありませんでした';
            return view('camps.result', compact('message'));
        } else {
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
}
