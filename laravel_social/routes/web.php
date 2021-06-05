<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', 'GuestController@welcome')
    -> name('welcome');

Route::get('/home', 'LoggedController@index')
    ->name('logged_home');

Route::get('new_user', 'LoggedController@new_user')
    ->name('new_user');

Route::get('/show/user/{id}', 'LoggedController@show_user')
    -> name('show_user');

Route::get('/show/topic/{id}', 'LoggedController@show_topic')
-> name('show_topic');

Route::get('create/post', 'LoggedController@create_post')
    -> name('create_post');
Route::post('submit/post', 'LoggedController@submit_post')
    -> name('submit_post');