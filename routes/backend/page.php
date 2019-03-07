<?php

use App\Http\Controllers\Backend\Page\FragmentController;
use App\Http\Controllers\Backend\Page\PageController;

/*
 * All route names are prefixed with 'admin.'.
 */
Route::group(['prefix' => 'setting/pages/', 'as' => 'pages.'], function () {
    Route::redirect('/', '/setting/pages/page/index')->name('root');

    Route::group(['prefix' => 'page/', 'as' => 'page.', 'namespace' => 'Page'], function () {
        Route::get('/', [PageController::class, 'index'])->name('index');

        Route::get('create', [PageController::class, 'create'])->name('create');
        Route::post('store', [PageController::class, 'store'])->name('store');

        Route::get('{post}/edit', [PageController::class, 'edit'])->name('edit');
        Route::post('{post}/update', [PageController::class, 'update'])->name('update');

        Route::delete('{post}/delete', [PageController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'fragment/', 'as' => 'fragment.', 'namespace' => 'Page'], function () {
        Route::get('/', [FragmentController::class, 'index'])->name('index');

        Route::get('create', [FragmentController::class, 'create'])->name('create');
        Route::post('store', [FragmentController::class, 'store'])->name('store');

        Route::get('{post}/edit', [FragmentController::class, 'edit'])->name('edit');
        Route::post('{post}/update', [FragmentController::class, 'update'])->name('update');

        Route::delete('{post}/delete', [FragmentController::class, 'delete'])->name('delete');
    });

});
