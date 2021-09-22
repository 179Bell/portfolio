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

Route::get('/', function(){
    return view('welcome');
});
Route::get('camps', 'CampsController@index')->name('top');
//認証ルート
Auth::routes();
Route::get('guest', 'Auth\LoginController@guestLogin')->name('guest.login');
Route::get('camps/search', 'CampsController@search')->name('camps.search');
// 認証済ユーザのみのルーティング
Route::group(['middleware' => ['auth']], function() {
    Route::group(['prefix' => 'camps/{id}'],function(){
        //いいね機能
        Route::post('like', 'LikesController@store')->name('like');
        Route::post('unlike', 'LikesController@destroy')->name('unlike');
        //お気に入り機能
        Route::get('bookmark', 'BookmarksController@store')->name('bookmark');
        Route::get('unbookmark', 'BookmarksController@destroy')->name('unbookmark');
    });
    // キャンプのCRUD処理
    Route::resource('camps', 'CampsController', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    // ギアの登録
    Route::resource('gears', 'GearsController', ['only' => ['create', 'store', 'destroy']]);
    // コメントの投稿
    Route::post('comments', 'CommentsController@store')->name('comments.store');
    // ユーザー情報の変更
    Route::resource('users', 'UsersController', ['only' => ['edit', 'update', 'destroy']]);
});
//キャンプの一覧と詳細表示
Route::resource('camps', 'CampsController', ['only' => ['show']]);
//プロフィールページ
Route::get('users/{id}', 'UsersController@profile')->name('users.profile');
Route::get('bookmark/{id}', 'BookmarksController@show')->name('bookmark.show');
Route::get('camps_list/{id}', 'CampsController@camp_list')->name('camps.list');
Route::get('gears_list/{id}', 'GearsController@gear_list')->name('gears.list');



