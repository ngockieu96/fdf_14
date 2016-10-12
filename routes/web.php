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

Route::group(['prefix' => 'user'], function()
{
    Route::resource('product_detail', 'User\ProductController', [
    'only' => ['show']
    ]);
    Route::resource('item', 'User\ItemController', [
        'only' => ['index', 'store']
    ]);
    Route::resource('cart', 'User\CartController', [
        'only' => ['index', 'update', 'destroy']
    ]);
    Route::get('filter-product', [
        'as' => 'filter-product', 'uses' => 'User\FilterController@filter'
    ]);
    Route::post('filter-product', [
        'as' => 'filter-product', 'uses' => 'User\FilterController@filter'
    ]);
});

Route::get('/redirect/{provider}', 'SocialAuthController@redirectToProvider');
Route::get('/callback/{provider}', 'SocialAuthController@handleProviderCallback');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
    Route::resource('category', 'Admin\CategoryController');
    Route::resource('user', 'Admin\UsersController');
    Route::resource('product', 'Admin\ProductController');
    Route::resource('order', 'Admin\OrderController');
    Route::resource('admin-suggestion', 'Admin\SuggestionController');
});

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function()
{
    Route::resource('profile', 'User\UsersController', [
         'only' => ['index', 'update']
     ]);
    Route::resource('orders', 'User\OrderController', [
        'only' => ['index', 'create', 'show', 'store']
    ]);
    Route::resource('comment', 'User\CommentController', [
         'only' => ['store']
    ]);
    Route::resource('user-suggestion', 'User\SuggestionController', [
        'only' => ['index', 'store']
    ]);
});
