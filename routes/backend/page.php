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

        Route::get('{page}/edit', [PageController::class, 'edit'])->name('edit');
        Route::post('{page}/update', [PageController::class, 'update'])->name('update');

        Route::delete('{page}/delete', [PageController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'fragment/', 'as' => 'fragment.', 'namespace' => 'Page'], function () {
        Route::get('/', [FragmentController::class, 'index'])->name('index');

        Route::get('create', [FragmentController::class, 'create'])->name('create');
        Route::post('store', [FragmentController::class, 'store'])->name('store');

        Route::get('{fragment}/edit', [FragmentController::class, 'edit'])->name('edit');
        Route::post('{fragment}/update', [FragmentController::class, 'update'])->name('update');

        Route::delete('{fragment}/delete', [FragmentController::class, 'delete'])->name('delete');
    });

});
