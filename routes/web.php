<?php

use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function() {
    $comment = Comment::first();
    $post = Post::first();
    $tag = Tag::first();
    $user = User::first();
    return view('index', ['links' => [
        route('v1.comments.index', absolute: false),
        route('v1.comments.show', $comment, false),
        route('v1.comments.post.show', $comment, false),
        route('v1.comments.user.show', $comment, false),
        route('v1.comments.user', $comment, false),
        route('v1.posts.index', absolute: false),
        route('v1.posts.show', $post, false),
        route('v1.posts.author', $post, false),
        route('v1.posts.comments', $post, false),
        route('v1.posts.author.show', $post, false),
        route('v1.posts.comments.show', $post, false),
        route('v1.posts.tags.show', $post, false),
        route('v1.posts.tags', $post, false),
        route('v1.tags.index', absolute: false),
        route('v1.tags.show', $tag, false),
        route('v1.tags.posts', $tag, false),
        route('v1.tags.posts.show', $tag, false),
        route('v1.users.index', absolute: false),
        route('v1.users.show', $user, false),
        route('v1.users.comments', $user, false),
        route('v1.users.posts', $user, false),
        route('v1.users.comments.show', $user, false),
        route('v1.users.posts.show', $user, false),
    ]]);
});

