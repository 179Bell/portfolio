<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;


class RegisterControllerTest extends TestCase
{

    /**
     * @test
     *  
     */
    public function ユーザー登録画面にアクセスしてユーザー登録画面を表示()
    {
        $response = $this->get(route('register'));
        $response->assertViewIs('auth.register');
    }

    /**
     * @test
     */
    public function ユーザー登録に成功したら一覧画面が表示される()
    {
        $file = UploadedFile::fake()->image('avatar.jpg');     
        $path = $file->store('public');                          
        $read_temp_path = str_replace('public/', '/storage/', $path);

        // ユーザー登録処理
        $response = $this->post(route('register'), [
            'name' => 'testUser',
            'email' => 'test@example.com',
            'avatar' => $read_temp_path,
            'bike' => 'testbike',
            'password' => 'testexample',
            'password_confirmation' => 'testexample',
        ]);

        $response->assertRedirect(action('CampsController@index'));
    }

    /**
     * @test
     */
    public function 名前を入力しない場合のエラー()
    {
        $file = UploadedFile::fake()->image('avatar.jpg');     
        $path = $file->store('public');                          
        $read_temp_path = str_replace('public/', '/storage/', $path);

        $response = $this->post(route('register'), [
            'name' => '',
            'email' => 'test@example.com',
            'avatar' => $read_temp_path,
            'bike' => 'testbike',
            'password' => 'testexample',
            'password_confirmation' => 'testexample',
        ]);

        $errorMessage = '名前は必ず指定してください';
        $this->get(route('register'))->assertSee($errorMessage);
    } 

    /**
     * @test
     */
    public function 名前の文字数を超えた場合のエラー()
    {
        $file = UploadedFile::fake()->image('avatar.jpg');     
        $path = $file->store('public');                          
        $read_temp_path = str_replace('public/', '/storage/', $path);

        $response = $this->post(route('register'), [
            'name' => 'testUsertestUsertestUsertestUsertestUsertestUser',
            'email' => 'test@example.com',
            'avatar' => $read_temp_path,
            'bike' => 'testbike',
            'password' => 'testexample',
            'password_confirmation' => 'testexample',
        ]);

        $errorMessage = '名前は、15文字以下で指定してください';
        $this->get(route('register'))->assertSee($errorMessage);
    } 

    /**
     * @test
     */
    public function メールアドレスを入力しない場合のエラー()
    {
        $file = UploadedFile::fake()->image('avatar.jpg');     
        $path = $file->store('public');                          
        $read_temp_path = str_replace('public/', '/storage/', $path);

        $response = $this->post(route('register'), [
            'name' => 'testUser',
            'email' => '',
            'avatar' => $read_temp_path,
            'bike' => 'testbike',
            'password' => 'testexample',
            'password_confirmation' => 'testexample',
        ]);

        $errorMessage = 'メールアドレスは必ず指定してください。';
        $this->get(route('register'))->assertSee($errorMessage);
    } 

    /**
     * @test
     */
    public function バイクを入力しない場合のエラー()
    {
        $file = UploadedFile::fake()->image('avatar.jpg');     
        $path = $file->store('public');                          
        $read_temp_path = str_replace('public/', '/storage/', $path);

        $response = $this->post(route('register'), [
            'name' => 'testUser',
            'email' => 'test@example.com',
            'avatar' => $read_temp_path,
            'bike' => '',
            'password' => 'testexample',
            'password_confirmation' => 'testexample',
        ]);

        $errorMessage = '愛車は必ず指定してください。';
        $this->get(route('register'))->assertSee($errorMessage);
    } 

    /**
     * @test
     */
    public function バイクの文字数を超えた場合のエラー()
    {
        $file = UploadedFile::fake()->image('avatar.jpg');     
        $path = $file->store('public');                          
        $read_temp_path = str_replace('public/', '/storage/', $path);

        $response = $this->post(route('register'), [
            'name' => 'testUser',
            'email' => 'test@example.com',
            'avatar' => $read_temp_path,
            'bike' => 'testbiketestbiketestbiketestbiketestbiketestbiketestbiketestbike',
            'password' => 'testexample',
            'password_confirmation' => 'testexample',
        ]);

        $errorMessage = '愛車は、30文字以下で指定してください。';
        $this->get(route('register'))->assertSee($errorMessage);
    } 
    
    /**
     * @test
     */
    public function パスワードを入力しない場合のエラー()
    {
        $file = UploadedFile::fake()->image('avatar.jpg');     
        $path = $file->store('public');                          
        $read_temp_path = str_replace('public/', '/storage/', $path);

        $response = $this->post(route('register'), [
            'name' => 'testUser',
            'email' => 'test@example.com',
            'avatar' => $read_temp_path,
            'bike' => 'testbike',
            'password' => '',
            'password_confirmation' => '',
        ]);

        $errorMessage = 'パスワードは必ず指定してください。';
        $this->get(route('register'))->assertSee($errorMessage);
    } 

    /**
     * @test
     */
    public function パスワードが短い場合のエラー()
    {
        $file = UploadedFile::fake()->image('avatar.jpg');     
        $path = $file->store('public');                          
        $read_temp_path = str_replace('public/', '/storage/', $path);

        $response = $this->post(route('register'), [
            'name' => 'testUser',
            'email' => 'test@example.com',
            'avatar' => $read_temp_path,
            'bike' => 'testbike',
            'password' => 'test',
            'password_confirmation' => 'test',
        ]);

        $errorMessage = 'パスワードは、8文字以上で指定してください。';
        $this->get(route('register'))->assertSee($errorMessage);
    } 

    /**
     * @test
     */
    public function パスワードが一致しない場合のエラー()
    {
        $file = UploadedFile::fake()->image('avatar.jpg');     
        $path = $file->store('public');                          
        $read_temp_path = str_replace('public/', '/storage/', $path);

        $response = $this->post(route('register'), [
            'name' => 'testUser',
            'email' => 'test@example.com',
            'avatar' => $read_temp_path,
            'bike' => 'testbike',
            'password' => 'testexample',
            'password_confirmation' => 'testexamples',
        ]);

        $errorMessage = 'パスワードと、確認フィールドとが、一致していません。';
        $this->get(route('register'))->assertSee($errorMessage);
    } 
}