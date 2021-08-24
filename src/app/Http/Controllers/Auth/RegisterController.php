<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected function redirectPath()
    {
        return '/';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'avatar' => ['image'],
            'bike' => ['required', 'string', 'max:30'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // アバター画像の有無
        if (array_key_exists('avatar', $data)) {
            // リクエストから画像を取得
            $image = request()->file('avatar');
            // S3に保存
            $url = Storage::disk('s3')->putFile('/', $image, 'public');
            // あった場合の処理
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'avatar' => $url,
                'bike' => $data['bike'],
                'password' => Hash::make($data['password']),
            ]);
        } else {
            // なかった場合の処理
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'avatar' => 'portfolio/default.jpeg',
                'bike' => $data['bike'],
                'password' => Hash::make($data['password']),
            ]);
        }
    }
}
