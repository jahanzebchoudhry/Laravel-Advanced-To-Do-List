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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/upload', 'UploadImageController@index');

Route::get('/todos', 'ToDoController@index');

Route::get('/todos/create', 'ToDoController@create');

Route::post('/todos/create', 'ToDoController@store');

Route::get('/todos/{todo}/edit', 'ToDoController@edit');

Route::put('/todos/{todo}/update', 'ToDoController@update');

Route::delete('/todos/{todo}/delete', 'ToDoController@destroy')->name('todo.delete');

Route::put('/todos/{todo}/complete', 'ToDoController@complete')->name('todo.complete');

Route::put('/todos/{todo}/incomplete', 'ToDoController@incomplete')->name('todo.incomplete');






