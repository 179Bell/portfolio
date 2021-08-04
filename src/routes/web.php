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

//認証ルート
Auth::routes();
//キャンプ詳細表示
Route::resource('users', 'UsersController', ['only' => ['show']]);
// 認証済ユーザのみのルーティング
Route::group(['middleware' => ['auth']], function() {
    Route::group(['prefix'=>'camps/{id}'],function(){
        //いいね機能
        Route::post('like', 'LikesController@store')->name('like');
        Route::post('unlike', 'LikesController@destroy')->name('unlike');
        //お気に入り
        Route::post('bookmark', 'BookmarksController@store')->name('bookmark');
        Route::post('unbookmark', 'BookmarksController@destroy')->name('unbookmark');

    });
    Route::resource('camps', 'CampsController', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
});
//記事一覧ページへのルーティング
Route::resource('camps', 'CampsController', ['only' => ['index', 'show']]);