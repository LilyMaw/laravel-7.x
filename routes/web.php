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
Route::get('/login', 'Auth\AuthController@login')->name('login');
Route::post('/post-login', 'Auth\AuthController@postLogin')->name('post-login');
Route::get('/logout', 'Auth\AuthController@logout')->name('logout');

Route::get('testManytoManyR', 'Auth\AuthController@testOnetoOneR');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/user', 'User\UserController@index')->name('user-list');

    Route::get('/user/create', 'User\UserController@createUser')->name('register');
    Route::post('/user/create/confirm', 'User\UserController@confirmUser')->name('confirm-register');
    Route::post('/user/create', 'User\UserController@storeUser')->name('store-user');

    Route::get('/todo', 'Todo\TodoController@index')->name('todo-list');

    Route::get('/todo/create', 'Todo\TodoController@createTodo')->name('create-todo');
    Route::post('/todo/create/confirm', 'Todo\TodoController@confirmTodo')->name('confirm-todo');
    Route::post('/todo/create', 'Todo\TodoController@storeTodo')->name('store-todo');

    Route::get('/todo/show/{todo}', 'Todo\TodoController@showTodo')->name('detail-todo');

    Route::get('/todo/edit/{todo}', 'Todo\TodoController@editTodo')->name('edit-todo');
    Route::post('/todo/edit/{todo}/confirm', 'Todo\TodoController@editConfirmTodo')->name('edit-confirm-todo');
    Route::post('/todo/edit/{todo}', 'Todo\TodoController@updateTodo')->name('update-todo');

    Route::get('/todo/delete/{todo}', 'Todo\TodoController@destroyTodo')->name('delete-todo');
});
