<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\User;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function ログイン画面のURLにアクセスして画面が表示される()
    {
        $response = $this->get(route('login'));
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function ログイン画面のURLにアクセスしてログイン画面が表示される()
    {
        $response = $this->get('login');
        $response->assertViewIs('auth.login');
    }

    /**
     * @test
     */
    public function 登録しておいたアドレスとパスワードでログインできる()
    {
        $user = factory(User::class)->create([
            'email' => 'test@example.com',
            'password' => bcrypt('loginPass')
        ]);
        // ログイン処理
        $response = $this->post(route('login'), [
            'email' => 'test@example.com',
            'password' => 'loginPass'
        ]);
        $this->assertAuthenticatedAs($user);
    }

    /**
     * @test
     */
    public function ログインに成功したら一覧画面が表示される()
    {
        $user = factory(User::class)->create([
            'email' => 'test@example.com',
            'password' => bcrypt('loginPass')
        ]);
        // ログイン処理
        $response = $this->post(route('login'), [
            'email' => 'test@example.com',
            'password' => 'loginPass'
        ]);

        $response->assertRedirect(action('CampsController@index'));
    }

    /**
     * @test
     */
    public function メールアドレスが異なる場合()
    {
        $user = factory(User::class)->create([
            'email' => 'test@example.com',
            'password' => bcrypt('loginPass')
        ]);
        // ログイン処理
        $response = $this->post(route('login'), [
            'email' => 'test@test.com',
            'password' => 'loginPass'
        ]);

        $this->assertGuest();
    }

    /**
     * @test
     */
    public function パスワードが異なる場合()
    {
        $user = factory(User::class)->create([
            'email' => 'test@example.com',
            'password' => bcrypt('loginPass')
        ]);
        // ログイン処理
        $response = $this->post(route('login'), [
            'email' => 'test@example.com',
            'password' => 'loginPuss'
        ]);

        $this->assertGuest();
    }

    /**
     * @test
     */
    public function メールアドレスが異なる場合エラーメッセージが表示される()
    {
        $user = factory(User::class)->create([
            'email' => 'test@example.com',
            'password' => bcrypt('loginPass')
        ]);
        // ログイン処理
        $response = $this->post(route('login'), [
            'email' => 'test@test.com',
            'password' => 'loginPass'
        ]);

        $errorMessage = 'ログイン情報が登録されていません。';
        $this->get(route('login'))->assertSee($errorMessage);
    }

    /**
     * @test
     */
    public function パスワードが異なる場合エラーメッセージが表示される()
    {
        $user = factory(User::class)->create([
            'email' => 'test@example.com',
            'password' => bcrypt('loginPass')
        ]);
        // ログイン処理
        $response = $this->post(route('login'), [
            'email' => 'test@test.com',
            'password' => 'loginPuss'
        ]);

        $errorMessage = 'ログイン情報が登録されていません。';
        $this->get(route('login'))->assertSee($errorMessage);
    }

    /**
     * @test
     */
    public function ログアウト()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $response = $this->post('logout');
        $this->assertGuest();
    }
}