<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//List posts
Route::get('posts', 'ApiPostController@index');

//List single posts
Route::get('/post/{id}', 'ApiPostController@show');

//Create new post
Route::post('/post', 'ApiPostController@store');

//Update post
Route::put('/post/{id}', 'ApiPostController@update');

//Delete post
Route::delete('/post/{id}', 'ApiPostController@destroy');


