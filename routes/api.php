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
Route::group(['prefix' => 'users'], function(){
    Route::post('add', 'UserController@add');
});
Route::group(['prefix' => 'chats'], function(){
    Route::post('add', 'ChatController@add');
    Route::post('get', 'ChatController@get');
});
Route::group(['prefix' => 'messages'], function(){
    Route::post('add', 'MessageController@add');
    Route::post('get', 'MessageController@get');
});
