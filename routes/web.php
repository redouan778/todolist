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

Route::get('/', ['as' => 'index', 'uses' => 'TaskController@index']);

// Route::post('/', ['as' => 'index', 'uses' => 'TaskController@index']);

Route::resource('task', 'TaskController');

Route::get('/home', 'TaskController@loggedInPage')->name('home');

Auth::routes();

Route::resource('list', 'ListController');

Route::get('list', 'ListController@index')->name('list');
