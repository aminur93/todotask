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

Route::get('/', 'HomeController@index');
Route::post('/add-task','HomeController@store');
Route::get('/show-task','HomeController@show');
Route::get('/delete_task/{id}','HomeController@destroy');
Route::get('/done_task/{id}','HomeController@done');

