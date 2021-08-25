<?php

namespace App\Http\Controllers;

use App\User;
use App\Gear;
use App\Http\Requests\UserRequest;
use App\Services\UserService;

class UsersController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->authorizeResource(User::class, 'user');
        $this->userService = $userService;
    }

    /**
     * ユーザーページのためにギア情報を取得
     * 
     * @param int $id
     * @return Illuminate\Contracts\View\Factory
     */
    public function profile($id)
    {
        list($user, $gears) = $this->userService->profile($id);
        $gearImgs = $this->userService->profile($id);
        return view('users.profile', compact('user', 'gears', 'gearImgs'));
    }

    /**
     * ユーザー情報の編集画面を返す
     * 
     * @param User $user
     * @return Illuminate\Contracts\View\Factory
     */
    public function edit(User $user) 
    {
        return view('users.edit', compact('user'));
    }

    /**
     * 編集したユーザー情報の保存
     * 
     * @param UserRequest $request
     * @param User $user
     * @return Illuminate\Contracts\View\Factory
     */
    public function update(UserRequest $request, User $user)
    {
        list($user, $gears) = $this->userService->update($request, $user);
        $gearImgs = $this->userService->update($request, $user);
        return view('users.profile', compact('user', 'gears', 'gearImgs'));
        
    }

    /**
     * ユーザーの退会
     * 
     * @param User $user
     * @return Illuminate\Contracts\View\Factory
     */
    public function destroy(User $user)
    {
        $this->userService->destroy($user);
        return redirect('/');
    }
}
