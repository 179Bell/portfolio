<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Camp;
use App\CampImg;
use Illuminate\Http\UploadedFile;

class CampsControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
    }
    /**
     * @test
     */
    public function キャンプ一覧画面のURLにアクセスして画面が表示される()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $response = $this->get(action('CampsController@index'));
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function キャンプ一覧画面のURLにアクセスしてキャンプ一覧画面が表示される()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $response = $this->get(action('CampsController@index'));
        $response->assertViewIs('camps.index');
    }

    /**
     * @test
     */
    public function 投稿一覧画面にすべてのキャンプ情報が表示される()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // 一番目の投稿
        $firstPost = factory(Camp::class)
                        ->create()
                        ->each (function($camp) {$camp->campImgs()->save(factory(CampImg::class)->make());
                        });

        $secondPost = factory(Camp::class)
                        ->create()
                        ->each (function($camp) {$camp->campImgs()->save(factory(CampImg::class)->make());
                        });

        $thirdPost = factory(Camp::class)
                        ->create()
                        ->each (function($camp) {$camp->campImgs()->save(factory(CampImg::class)->make());
                        });
        
        $response = $this->get(action('CampsController@index'));
        $response->assertSee($firstPost, $secondPost, $thirdPost);
    }

    /**
     * @test
     */
    public function 投稿作成画面のURLにアクセスして画面が表示される()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $response = $this->get(action('CampsController@create'));
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function 投稿作成画面のURLにアクセス地て投稿画面が表示される()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $response = $this->get(action('CampsController@create'));
        $response->assertViewIs('camps.create');
    }

    /**
     * @test
     */ 
    public function 投稿を作成して保存する()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('avatar.jpg');     
        $path = $file->store('public');                          
        $read_temp_path = str_replace('public/', '/storage/', $path);

        $data = [
            'user_id' => '1',
            'date' => '2021-1-6',
            'title' => 'testtile',
            'discription' => 'This is test',
            'location' => 'test',
            ];
        $response = $this->post(route('camps.store'), $data);

        $this->assertDatabaseHas('camps', [
            'user_id' => '1',
            'date' => '2021-1-6',
            'title' => 'testtile',
            'discription' => 'This is test',
            'location' => 'test',
        ]);
    }

    /**
     *@test
    */
    public function 投稿完了したら一覧画面に移る()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $data = [
            'user_id' => '1',
            'date' => '2021-1-6',
            'title' => 'testtile',
            'discription' => 'This is test',
            'location' => 'test',
            ];

        $response = $this->post(route('camps.store'), $data);
        $response->assertRedirect(action('CampsController@index'));
    }

    /**
     * @test
     */
    public function 詳細画面のURLにアクセスして画面が表示される()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $camp = factory(Camp::class)->create();

        $response = $this->get(route('camps.show', $camp->id));
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function 詳細画面のURLにアクセスして詳細画面が表示される()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $camp = factory(Camp::class)->create();

        $response = $this->get(route('camps.show', $camp->id));
        $response->assertViewIs('camps.show');
    }
    
    /**
     * @test
     */
    public function 編集画面のURLにアクセスしたら画面が表示される()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $camp = factory(Camp::class)->create([
            'user_id' => $user->id
        ]);
        $response = $this->get(route('camps.edit', $camp->id));
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function 編集画面が表示され編集を保存する。完了したら一覧に戻る()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $camp = factory(Camp::class)->create([
            'user_id' => $user->id
        ]);
        $data = [
            'date' => '2021-1-6',
            'title' => 'testtile',
            'discription' => 'This is test',
            'location' => 'test',
        ];
        $response = $this->put(route('camps.update', $camp->id), $data);
        $this->assertDatabaseHas('camps', [
            'date' => '2021-1-6',
            'title' => 'testtile',
            'discription' => 'This is test',
            'location' => 'test',
        ]);
        $response->assertRedirect(action('CampsController@index'));
    }

    /**
     * @test
     */
    public function 投稿を削除する()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $camp = factory(Camp::class)->create([
            'user_id' => $user->id,
            'date' => '2021-1-6',
            'title' => 'testtile',
            'discription' => 'This is test',
            'location' => 'test',
        ]);
        $response = $this->get(route('camps.show', $camp->id));
        $response->assertSee('編集する', '削除する');
        $response->assertStatus(200);
        $this->delete(route('camps.destroy', $camp->id));
        $this->assertDeleted('camps', [
            'date' => '2021-1-6',
            'title' => 'testtile',
            'discription' => 'This is test',
            'location' => 'test',
        ]);
    }
}
