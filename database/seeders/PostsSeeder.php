<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $random_user_id = fn() => User::inRandomOrder()->first()->id;

        $posts = Post::factory()
            ->count(100)
            ->has(Comment::factory()->count(2)->state(fn()=> ['user_id' => $random_user_id]))
            ->create(['author_id' => $random_user_id]);

        $posts->each(function(Post $post) {
            $post->tags()->saveMany(Tag::inRandomOrder()->take(2)->get());
        });
    }
}
