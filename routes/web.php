<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// user search routes.

Route::get('/users', 'UserController@index');
Route::post('/users', 'UserController@search');