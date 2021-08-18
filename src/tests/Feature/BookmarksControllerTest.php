<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Camp;

class BookmarksControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
    }

    /**
     * @test
     */
    public function お気に入りをつける()
    {   
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $camp = factory(Camp::class)->create();
        $respose = $this->post(route('bookmark', ['id' => $camp->id]));
        // データベースにそれぞれのidがあるか確認
        $this->assertDatabaseHas('bookmarks', [
            'user_id' => $user->id,
            'camp_id' => $camp->id]);
    }

    /**
     * @test
     */
    public function お気に入りを外す()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $camp = factory(Camp::class)->create();
        $respose = $this->delete(route('unbookmark', ['id' => $camp->id]));
        $this->assertDatabaseMissing('bookmarks', [
            'user_id' => $user->id,
            'camp_id' => $camp->id]);
    }

    /**
     * @test
     */
    public function お気に入りの表示()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $camp = factory(Camp::class)->create();
        $respose = $this->post(route('bookmark', ['id' => $camp->id]));
        $respose = $this->get(route('bookmark.show', $user->id));
        $respose->assertViewIs('bookmark.show');
    }
}
