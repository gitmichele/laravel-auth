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
