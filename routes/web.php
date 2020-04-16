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

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();

Route::get('/', 'UserController@index')->name('home')->middleware('auth');
Route::get('users', 'UserController@index')->middleware('auth')->name('users');
Route::post('users', 'UserController@store')->name('user.store'); //Guarda
Route::delete('users/{user}', 'UserController@destroy')->name('user.destroy');