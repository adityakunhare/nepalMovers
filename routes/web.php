<?php

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


//admin routes
Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function () {

    Route::get('/dashboard', 'HomeController@index')->name('home')->middleware('auth:admin');


    Route::namespace('Auth')->group(function () {

        //Login Routes
        Route::get('/login', 'LoginController@showLoginForm')->name('login');
        Route::get('/register', 'LoginController@showLoginForm')->name('register');
        Route::post('/login', 'LoginController@login');
        Route::post('/logout', 'LoginController@logout')->name('logout');

        //Forgot Password Routes
        Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');

        //Reset Password Routes
        Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset', 'ResetPasswordController@reset')->name('password.update');

    });
    Route::get('user-profile', 'HomeController@showUserProfile')->name('user.profile');


});

//client side routes...
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
