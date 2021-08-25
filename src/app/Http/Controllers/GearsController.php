<?php

namespace App\Http\Controllers;

use App\Gear;
use App\Http\Requests\GearRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Services\GearService;

class GearsController extends Controller
{
    protected $gearService;

    public function __construct(GearService $gearService)
    {
        $this->gearService =$gearService;
    }

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
        $this->gearService->store($request, $gear);
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
        $this->gearService->destroy($gear);
        return redirect()->route('top')->with('flash_message', 'ギアを削除しました');;
    }
}
