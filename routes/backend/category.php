<?php

use App\Http\Controllers\Backend\Category\ChildrenController;
use App\Http\Controllers\Backend\Category\GroupController;

/*
 * All route names are prefixed with 'admin.'.
 */
Route::group(['prefix' => 'setting/'], function () {
    Route::group(['prefix' => 'category/', 'as' => 'category.', 'namespace' => 'Category'], function () {

        // group
        Route::group(['prefix' => 'group/', 'as' => 'group.'], function () {

            Route::get('/', [GroupController::class, 'index'])->name('index');

            Route::get('create', [GroupController::class, 'create'])->name('create');
            Route::post('store', [GroupController::class, 'store'])->name('store');

            Route::get('{category}/edit', [GroupController::class, 'edit'])->name('edit');
            Route::post('{category}/update', [GroupController::class, 'update'])->name('update');

            Route::post('{category}/delete', [GroupController::class, 'delete'])->name('delete');

        });

        // children
        Route::group(['prefix' => '{ancestor}/children', 'as' => 'children.'], function () {

            Route::get('/', [ChildrenController::class, 'index'])->name('index');

            Route::get('{category}/up', [ChildrenController::class, 'up'])->name('up');
            Route::get('{category}/down', [ChildrenController::class, 'down'])->name('down');

            Route::get('{parent}/child/create', [ChildrenController::class, 'child'])->name('create.child');
            Route::post('{parent}/child/store', [ChildrenController::class, 'storeChild'])->name('store.child');

            Route::get('create', [ChildrenController::class, 'create'])->name('create');
            Route::post('store', [ChildrenController::class, 'store'])->name('store');

            Route::get('{category}/edit', [ChildrenController::class, 'edit'])->name('edit');
            Route::post('{category}/update', [ChildrenController::class, 'update'])->name('update');

            Route::post('{category}/delete', [ChildrenController::class, 'delete'])->name('delete');

        });
    });
});
