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

Auth::routes();

Route::get('/', 'PostController@index')->name('posts');
Route::get('post/view/{id}', 'PostController@view')->name('post.view');
Route::get('post/edit/{id}', 'PostController@edit')->name('post.edit')->middleware('auth');
Route::post('post/update/{id}', 'PostController@update')->name('post.update')->middleware('auth');
Route::post('post/create', 'PostController@store')->name('post.store')->middleware('auth');
Route::get('post/create', 'PostController@create')->name('post.create')->middleware('auth');
Route::get('post/delete/{id}', 'PostController@delete')->name('post.delete')->middleware('auth');
