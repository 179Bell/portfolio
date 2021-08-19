<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Gear;
use App\User;

class UsersControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
    }

    /**
     * @test
     */
    public function プロフィールページを表示()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $response = $this->get(action('UsersController@profile',  ['id' => $user->id]));
        $response->assertStatus(200);
        $response->assertViewIs('users.profile');
    }
    /**
     * @test
     */
    public function ユーザー情報編集画面を表示()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $response = $this->get(route('users.edit', ['user' => $user->id]));
        $response->assertStatus(200);
        $response->assertViewIs('users.edit');
    }

    /**
     * @test
     */
    public function ユーザー情報を変更、保存()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $data = [
            'name' => 'テスト太郎',
            'bike' => 'NINJA'
        ];
        $response = $this->put(route('users.update', ['user' => $user->id]), $data);
        $this->assertDatabaseHas('users', [
            'name' => 'テスト太郎',
            'bike' => 'NINJA'
        ]);
    }

    /**
     * @test
     */
    public function 退会処理()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $response = $this->delete(route('users.destroy', $user->id));
        $this->assertDeleted('users', [
            'name' => $user->name,
            'bike' => $user->bike,
            'email' => $user->email,
        ]);
    }
}
