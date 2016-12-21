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
    Route::get('/adminPage','AdminController@adminPage');
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




