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
Route::get('threads', 'ThreadsController@index')->name('threads');
Route::get('threads/create', 'ThreadsController@create')->name('threads.create');
Route::get('threads/{channel}/{thread}', 'ThreadsController@show')->name('threads/show');
Route::post('threads', 'ThreadsController@store');
Route::get('threads/{channel}', 'ThreadsController@index');
Route::post('/threads/{channel}/{thread}/replies', 'RepliesController@store');
// Route::get('/replies/{replies}/favorites', 'FavoritesController@loginRedirect');
Route::post('/replies/{replies}/favorites', 'FavoritesController@store')->name('replies.favorite');
Route::get('/profiles/{user}', 'ProfilesController@show');


