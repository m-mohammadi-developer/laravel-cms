<?php

use Illuminate\Support\Facades\Route;

Route::prefix('roles')->middleware('auth')->group(function () {

    Route::middleware('role:admin')->group(function () {

        Route::get('/', 'RoleController@index')->name('role.index');
        
        Route::post('/', 'RoleController@store')->name('role.store');

        Route::delete('{role}/destroy', 'RoleController@destroy')->name('role.destroy');

        Route::put('{role}/update', 'RoleController@update')->name('role.update');

        Route::get('{role}/edit', 'RoleController@edit')->name('role.edit');

    });



});
