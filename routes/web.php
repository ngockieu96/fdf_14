<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/redirect/{provider}', 'SocialAuthController@redirectToProvider');
Route::get('/callback/{provider}', 'SocialAuthController@handleProviderCallback');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
    Route::resource('category', 'Admin\CategoryController');
    Route::resource('user', 'Admin\UsersController');
    Route::resource('product', 'Admin\ProductController');
});

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function()
{
    Route::resource('profile', 'User\UsersController', [
         'only' => ['index', 'update']
     ]);
});
