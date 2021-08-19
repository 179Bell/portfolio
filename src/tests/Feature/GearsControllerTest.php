<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Gear;

class GearsControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
    }

    /**
     * @test
     */
    public function 投稿画面に移動する()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $response = $this->get(action('GearsController@create'));
        //レスポンスが返ってくるか
        $response->assertStatus(200);
        // viewが表示されるか
        $response->assertViewIs('gears.create');
    }

    /**
     * @test
     */
    public function ギアを登録する()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $gear = factory(gear::class)->create([
            'user_id' => $user->id
        ]);
        // 登録
        $response = $this->post(route('gears.store'));
        // DBに値があるか確認
        $this->assertDatabaseHas('gears', [
            'user_id' => $user->id,
            'name' => $gear->name,
            'comment' => $gear->comment,
            'maker_name' => $gear->maker_name,
        ]);
        // トップ画面に戻る
        $response->assertRedirect(action('CampsController@index'));
    }

    /**
     * @test
     */
    public function ギアを削除()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $gear = factory(gear::class)->create([
            'user_id' => $user->id
        ]);
        // 削除
        $response = $this->delete(route('gears.destroy', $gear->id));
        // DBに値がないか確認
        $this->assertDeleted('gears', [
            'user_id' => $user->id,
            'name' => $gear->name,
            'comment' => $gear->comment,
            'maker_name' => $gear->maker_name,
        ]);
        // トップ画面に戻る
        $response->assertRedirect(action('CampsController@index'));
    }
}
