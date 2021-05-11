<?php

use Illuminate\Support\Facades\Route;

Auth::routes();


Route::get('/', 'HomeController@index')->name('home');
Route::get('/post/{post}', 'PostController@index')->name('post');

Route::middleware('auth')->group(function () {
    Route::get('/admin', 'AdminsController@index')->name('admin.index');

    Route::get('/admin/posts/create', 'PostController@create')->name('post.create');
    Route::post('/admin/posts', 'PostController@store')->name('post.store');

});
