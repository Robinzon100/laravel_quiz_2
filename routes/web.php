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

Route::get('/admin/Admin', 'admin\AdminController@index')->name('home');
Route::get('/admin/post/update/{id}', 'postController@getUpdatePost')->name('get_update');
Route::post('/admin/post/updatePost', 'postController@updatePost')->name('update');

Route::post('/admin/post/postComment', 'postController@insertComment')->name('update');

Route::post('/admin/post/insert', 'postController@insertPost')->name('insert');
Route::post('/admin/post/delete', 'postController@deletePost')->name('delete');

