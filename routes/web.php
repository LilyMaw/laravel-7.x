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

// Route::get('/', 'WelcomeController@showWelcomeView')->name('welcome-view');
Route::get('/', 'Todo\TodoController@index')->name('todo-list');

Route::get('/todo/create', 'Todo\TodoController@createTodo')->name('create-todo');
Route::post('/todo/create', 'Todo\TodoController@storeTodo')->name('store-todo');

Route::get('/todo/{todo}/show', 'Todo\TodoController@showTodo')->name('detail-todo');

Route::get('/todo/{todo}/edit', 'Todo\TodoController@editTodo')->name('edit-todo');
Route::post('/todo/{todo}/edit', 'Todo\TodoController@updateTodo')->name('update-todo');

Route::get('/todo/{todo}/delete', 'Todo\TodoController@destroyTodo')->name('delete-todo');