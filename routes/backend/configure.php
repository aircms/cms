<?php

use App\Http\Controllers\Backend\Setting\ConfigureController;
use App\Http\Controllers\Backend\Setting\ItemController;

Route::group(['prefix' => 'setting/', 'as' => 'setting.'], function () {

    Route::group(['prefix' => 'configure/', 'as' => 'configure.'], function () {
        Route::get('{category}/category', [ConfigureController::class, 'category'])->name('category');
        Route::post('{category}/category/save', [ConfigureController::class, 'save'])->name('save');
    });

    Route::group(['prefix' => 'item/', 'as' => 'item.'], function () {
        Route::get('/', [ItemController::class, 'index'])->name('index');

        Route::get('create', [ItemController::class, 'create'])->name('create');
        Route::post('store', [ItemController::class, 'store'])->name('store');

        Route::get('{item}/edit', [ItemController::class, 'edit'])->name('edit');
        Route::post('{item}/update', [ItemController::class, 'update'])->name('update');

        Route::post('{item}/delete', [ItemController::class, 'delete'])->name('delete');

        Route::get('{item}/up', [ItemController::class, 'up'])->name('up');
        Route::get('{item}/down', [ItemController::class, 'down'])->name('down');
    });

});
