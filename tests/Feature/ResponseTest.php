<?php

namespace Tests\Feature;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ResponseTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        Post::factory()
            ->for(User::factory(), 'author')
            ->has(Comment::factory()->for(User::factory()))
            ->has(Tag::factory())
            ->create([
                'published_at' => now(),
            ]);
    }

    /**
     * @param string $uri
     * @return void
     * @dataProvider uris
     */
    public function test_the_application_returns_a_successful_response(string $uri): void
    {
        $this->get($uri)->assertStatus(200);
    }

    public function uris(): array
    {
        return [
            ['/'],
            ['/api/v1/comments'],
            ['/api/v1/comments/1'],
            ['/api/v1/comments/1/post'],
            ['/api/v1/comments/1/relationships/post'],
            ['/api/v1/comments/1/relationships/user'],
            ['/api/v1/comments/1/user'],
            ['/api/v1/posts'],
            ['/api/v1/posts/1'],
            ['/api/v1/posts/1/author'],
            ['/api/v1/posts/1/comments'],
            ['/api/v1/posts/1/relationships/author'],
            ['/api/v1/posts/1/relationships/comments'],
            ['/api/v1/posts/1/relationships/tags'],
            ['/api/v1/posts/1/tags'],
            ['/api/v1/tags'],
            ['/api/v1/tags/1'],
            ['/api/v1/tags/1/posts'],
            ['/api/v1/tags/1/relationships/posts'],
            ['/api/v1/users'],
            ['/api/v1/users/1'],
            ['/api/v1/users/1/comments'],
            ['/api/v1/users/1/posts'],
            ['/api/v1/users/1/relationships/comments'],
            ['/api/v1/users/1/relationships/posts'],
        ];
    }
}
