<?php

use Illuminate\Support\Facades\Route;

Route::prefix('posts')->middleware('auth')->group(function () {

    Route::get('/', 'PostController@index')->name('post.index');
    Route::get('create', 'PostController@create')->name('post.create');
    Route::post('', 'PostController@store')->name('post.store');

    Route::delete('{post}/delete', 'PostController@destroy')->name('post.destroy');
    Route::patch('{post}/update', 'PostController@update')->name('post.update');
    Route::get('{post}/edit', 'PostController@edit')->name('post.edit');

});
