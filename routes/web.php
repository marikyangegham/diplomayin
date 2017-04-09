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
    Route::get('/add/new/category', 'AddNewCategoryController@show');
    Route::get('/categories','CategoryController@show');
    Route::get('/add/new/goods','AddNewGoodsController@show');
    Route::get('/catalog','CatalogController@show');
    Route::get('/inputted','InputController@show');
    Route::get('/outputted','OutputController@show');
    Route::get('/add/new/deliveryman', 'DeliverymanController@show');
    Route::get('/deliveryman', 'DeliverymanController@showList');
    Route::post('/remove/goods/type', 'GoodsController@destroy');
    Route::post('/remove/deliveryman', 'DeliverymanController@destroy');
    Route::post('/edit/deliveryman', 'DeliverymanController@edit');
    Route::post('/edit/goods', 'GoodsController@edit');
    Route::get('/stocks', 'StocksController@show');
    Route::post('/input/goods', 'InputController@input');
    Route::post('/output/goods', 'OutputController@output');
    Route::post('/change/catalog/data', 'CatalogController@change');
    //Route::get('/logout' , 'Auth\LoginController@logout');
    Route::get('/account/sign-out', array(
        'as' => 'account-sign-out',
        'uses' => 'Auth\LoginController@logout'
    ));
});

Route::group(['middleware' => 'admin'], function () {
    Route::post('/add/new/deliveryman', 'DeliverymanController@create');
    Route::post('/edit/deliveryman', 'DeliverymanController@edit');
    Route::post('/add/new/goods','AddNewGoodsController@create');
    Route::post('/remove/category', 'CategoryController@destroy');
    Route::post('/edit/category', 'CategoryController@edit');
    Route::post('/add/new/category', 'AddNewCategoryController@create');
    Route::post('/add/new/deliveryman', 'DeliverymanController@create');
});


Route::group(['middleware' => 'guest'], function () {
    Route::get('/', "Auth\LoginController@showLoginPage");
    Route::any('/login','Auth\LoginController@doLogin');
});




