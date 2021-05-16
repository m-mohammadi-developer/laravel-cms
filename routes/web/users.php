<?php

use Illuminate\Support\Facades\Route;

Route::prefix('users')->middleware('auth')->group(function () {

    Route::middleware('role:admin')->group(function () {

        Route::get('/', 'UserController@index')->name('users.index');
        Route::delete('{user}/delete', 'UserController@destroy')->name('user.destroy');
        
        Route::put('{user}/attach', 'UserController@attachRole')->name('user.user.attach');
        Route::put('{user}/detach', 'UserController@detachRole')->name('user.user.detach');
    });

    Route::middleware('can:view,user')->group(function () {

        Route::get('{user}/profile', 'UserController@show')->name('user.profile.show');
        Route::put('{user}/update', 'UserController@update')->name('user.profile.update');
    });

});
