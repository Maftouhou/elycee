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
    Route::get('search', 'FrontController@search');

    Route::post('send', 'MailController@sendEmail');
    Route::get('contact', 'MailController@contact');
    
Route::group(['prefix' => 'api/'], function(){
    Route::any('login', 'LoginController@login');
    Route::any('logout', 'LoginController@logout');
    
    Route::resource('articles', 'ArticlesController');
    
    Route::group(['middleware' => ['auth']], function(){
        route::get('dashboard', 'PostController@dashboard');
        Route::resource('qcm_reponse', 'ResponseController');
        route::resource('questions', 'QuestionController');
        
        Route::group(['middleware' => ['teacher']], function(){
            route::get('questions/{questions}', 'QuestionController@show');
            route::resource('post', 'PostController');
            Route::resource('choices', 'ChoiceController');
        });
    });
});
