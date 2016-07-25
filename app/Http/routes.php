<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to  call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

Route::group(['prefix' => 'api/', 'midleware' => ['web']], function(){
    Route::resource('post', 'PostController');
    
    Route::any('login', 'LoginController@login');
    Route::any('logout', 'LoginController@logout');
    
    // Route::match(['get', 'post'], '/index', ['uses' =>'IndexController@index']);
    // Route::post('auth/login', 'AuthController@login');
});

