<?php

use Illuminate\Support\Facades\Route;

Route::prefix('permissions')->middleware('auth')->group(function () {

    Route::middleware('role:admin')->group(function () {

        Route::get('/', 'PermissionController@index')->name('permission.index');

    });



});
