<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use LaravelJsonApi\Laravel\Facades\JsonApiRoute;
use LaravelJsonApi\Laravel\Http\Controllers\JsonApiController;
use LaravelJsonApi\Laravel\Routing\Relationships;
use LaravelJsonApi\Laravel\Routing\ResourceRegistrar;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

JsonApiRoute::server('v1')->prefix('v1')->resources(function (ResourceRegistrar $server) {
    $server->resource('posts', JsonApiController::class)
           ->readOnly()
           ->relationships(function (Relationships $relations) {
               $relations->hasOne('author')->readOnly();
               $relations->hasMany('comments')->readOnly();
               $relations->hasMany('tags')->readOnly();
           });

    $server->resource('users', JsonApiController::class)
           ->readOnly()
           ->relationships(function(Relationships $relations) {
               $relations->hasMany('posts')->readOnly();
               $relations->hasMany('comments')->readOnly();
           });

    $server->resource('tags', JsonApiController::class)
           ->readOnly()
           ->relationships(function(Relationships $relations) {
               $relations->hasMany('posts')->readOnly();
           });

    $server->resource('comments', JsonApiController::class)
           ->readOnly()
           ->relationships(function(Relationships $relations) {
               $relations->hasOne('post')->readOnly();
               $relations->hasOne('user')->readOnly();
           });
});

