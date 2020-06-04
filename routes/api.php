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

Route::namespace('Api')->group(function () {
    Route::post('register','LoginController@register');
    Route::post('/user','LoginController@getUser')->middleware('auth:sanctum');
    Route::post('/login','LoginController@login');
});
