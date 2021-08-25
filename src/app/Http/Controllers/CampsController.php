<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CampRequest;
use App\Camp;
use App\Services\CampService;

class CampsController extends Controller
{
    protected $campService;

    public function __construct(CampService $campService)
    {
        $this->authorizeResource(Camp::class, 'camp');
        $this->campService = $campService;
    }

    /**
     * 一覧画面にキャンプ一覧を表示する
     * 
     * @return Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $camps = $this->campService->index();
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
        $campImgs = $this->campService->show();
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
        $this->campService->store($request, $camp);
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
        $campImgs = $this->campService->edit();
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
        $this->campService->update($request, $camp);
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
        $this->campService->destroy($camp);
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
        list($user, $camps, $campImgs) = $this->campService->camp_list($id);
        return view('camps.list', compact('user', 'camps', 'campImgs'));
    }

    /**
     * キャンプを検索する
     * 
     * @param Request $request
     * @return Illuminate\Contracts\View\Factory
     */
    public function search(Request $request){
        $message = $this->campService->search($request);
        list($data, $user, $campImgs) = $this->campService->search($request);
        return view('camps.result', compact('data', 'user', 'campImgs', 'message'));
    }
}
