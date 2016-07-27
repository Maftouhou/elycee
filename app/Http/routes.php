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
    
    Route::any('login', 'LoginController@login');
    Route::any('logout', 'LoginController@logout');
    
    Route::resource('post', 'PostController');
    
    /**
     * Mettre les Route specifique pour les article 
     * en page d'accueil et les article en dashbord
     */
    Route::group(['midleware' => ['auth']], function(){
        route::resource('articles', 'PostController');
    });
});
