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

// all lists:   localhost/list/index
Route::get('/', 'ListController@index')->name('list');

// http://127.0.0.1:8000/taskPage/4
Route::get('/task/{id}', 'TaskController@index')->name('taskView');

Route::get('/task/{list_id}/create', 'TaskController@create')->name('task.create');

Route::resource('task', 'TaskController');

// Route::get('/home', 'TaskController@loggedInPage')->name('login');

Auth::routes();

Route::resource('list', 'ListController');
