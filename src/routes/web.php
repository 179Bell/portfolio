<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('users', 'UsersController', ['only' => ['show']]);
//記事一覧ページへのルーティング
Route::resource('camps', 'CampsController', ['only' => ['index']]);
// 認証済ユーザのみのルーティング
Route::group(['middleware' => ['auth']], function() {
    Route::resource('camps', 'CampsController', ['only' => ['create', 'store']]);
});