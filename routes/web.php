<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/tweet', 'TweetController@update')->name('tweet_update');

Route::get('/users', 'UserController@index')->name('user_list');

// Route::post('/users/follow/{follow_id}', 'UserController@follow')->name('follow_create');

Route::post('/users/follow', 'UserController@follow')->name('follow_create');
