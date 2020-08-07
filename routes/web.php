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

Route::get('/user', '\App\Http\Controllers\UserController@web');
Route::post('/user', '\App\Http\Controllers\UserController@store');
Route::post('/user/{id}', '\App\Http\Controllers\UserController@update');
Route::get('/user/{id}', '\App\Http\Controllers\UserController@delete');
