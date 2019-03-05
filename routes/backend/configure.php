<?php

use App\Http\Controllers\Backend\Setting\ConfigureController;

Route::group(['prefix' => 'setting/', 'as' => 'setting.'], function () {
    Route::group(['prefix' => 'configure/', 'as' => 'configure.'], function () {
        Route::get('/', [ConfigureController::class, 'index'])->name('index');

        Route::get('create', [ConfigureController::class, 'create'])->name('create');
        Route::post('store', [ConfigureController::class, 'store'])->name('store');

        Route::get('{item}/edit', [ConfigureController::class, 'edit'])->name('edit');
        Route::post('{item}/update', [ConfigureController::class, 'update'])->name('update');

        Route::post('{item}/delete', [ConfigureController::class, 'delete'])->name('delete');

        Route::get('{category}/category', [ConfigureController::class, 'category'])->name('category');
        Route::post('{category}/category/save', [ConfigureController::class, 'save'])->name('save');
    });
});
