<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Comment;

class CommentsControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
    }

    /**
     * @test
     */
    public function コメントをつける()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $comment = factory(Comment::class)->create([
            'user_name' => $user->name
        ]);
        $response = $this->post(route('comments.store'));
        $this->assertDatabaseHas('comments', [
            'user_name' => $user->name,
            'comment' => $comment->comment]);
    }
}
