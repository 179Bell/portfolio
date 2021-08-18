<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Camp;

class LikesControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
    }

    /**
     * @test
     */
    public function いいねをつける()
    {   
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $camp = factory(Camp::class)->create();
        $respose = $this->post(route('like', ['id' => $camp->id]));
        // データベースにそれぞれのidがあるか確認
        $this->assertDatabaseHas('likes', [
            'user_id' => $user->id,
            'camp_id' => $camp->id]);
    }

    /**
     * @test
     */
    public function いいねを外す()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $camp = factory(Camp::class)->create();
        $respose = $this->delete(route('unlike', ['id' => $camp->id]));
        $this->assertDatabaseMissing('likes', [
            'user_id' => $user->id,
            'camp_id' => $camp->id]);
    }
}
