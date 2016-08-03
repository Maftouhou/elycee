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
    
    Route::any('login', 'LoginController@login');
    
    Route::resource('index', 'FrontController');
    Route::resource('comments', 'CommentController');
    
Route::group(['prefix' => 'api/', 'midleware' => ['web']], function(){
    Route::any('login', 'LoginController@login');
    Route::any('logout', 'LoginController@logout');
    
    Route::resource('articles', 'ArticlesController');
    
    Route::group(['midleware' => ['auth']], function(){
        route::resource('post', 'PostController');
        Route::resource('choices', 'ChoiceController');
        route::resource('questions', 'QuestionController');
        Route::get('qcmreposne', 'ResponseController@show');
        Route::post('qcmreposne', 'ResponseController@store');
        
        route::get('dashboard', 'PostController@dashboard');
    });
});
