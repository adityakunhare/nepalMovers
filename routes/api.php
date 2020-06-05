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

<<<<<<< HEAD
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
=======
Route::namespace('Api')->group(function () {
    Route::post('register','LoginController@register');
    Route::post('/user','LoginController@getUser')->middleware('auth:sanctum');
    Route::post('/login','LoginController@login');
>>>>>>> 105331cc5305c0b4b4b0d96e51eb59250e1c6c94
});

Route::get('/login','UserController@index');
