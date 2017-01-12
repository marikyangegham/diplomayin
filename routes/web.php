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
Route::group(['middleware' => 'auth'], function () {
    Route::get('/goods','GoodsController@index');
    Route::get('/categories','CategoryController@show');
    Route::get('/add/new/goods','AddNewGoodsController@show');
    Route::post('/add/new/goods','AddNewGoodsController@create');
    Route::get('/add/new/category', 'AddNewCategoryController@show');
    Route::post('/remove/category', 'CategoryController@destroy');
    Route::post('/edit/category', 'CategoryController@edit');
    Route::post('/add/new/category', 'AddNewCategoryController@create');
    Route::get('/input/output','InputOutputController@show');
    Route::post('/remove/goods/type', 'GoodsController@destroy');
    Route::post('/edit/goods', 'GoodsController@edit');
    //Route::get('/logout' , 'Auth\LoginController@logout');
    Route::get('/account/sign-out', array(
        'as' => 'account-sign-out',
        'uses' => 'Auth\LoginController@logout'
    ));
});


Route::group(['middleware' => 'guest'], function () {
    Route::get('/', "Auth\LoginController@showLoginPage");
    Route::any('/login','Auth\LoginController@doLogin');
});




