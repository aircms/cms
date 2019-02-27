<?php

use App\Http\Controllers\Backend\Category\GroupController;

/*
 * All route names are prefixed with 'admin.'.
 */
Route::group(['prefix' => 'category/', 'as' => 'category.', 'namespace' => 'Category'], function () {

    // group
    Route::group(['prefix' => 'group/', 'as' => 'group.'], function () {

        Route::get('/', [GroupController::class, 'index'])->name('index');

        Route::get('create', [GroupController::class, 'create'])->name('create');
        Route::post('store', [GroupController::class, 'store'])->name('store');

        Route::get('edit', [GroupController::class, 'edit'])->name('edit');
        Route::post('update', [GroupController::class, 'update'])->name('update');

        Route::post('delete', [GroupController::class, 'delete'])->name('delete');

    });

});
