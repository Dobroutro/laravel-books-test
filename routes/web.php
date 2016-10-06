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
Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::resource('/authors', 'AuthorController');
    
    Route::get('/books/search', 'BookController@searchIndex');
    Route::post('/books/search', 'BookController@searchIndex');    
    Route::resource('/books', 'BookController');


    //Auth::routes();
    Route::get('/login', 'Auth\LoginController@showLoginForm');
    Route::post('/login', 'Auth\LoginController@login');
    Route::post('/logout', 'Auth\LoginController@logout');

    Route::get('/home', 'HomeController@index');


});