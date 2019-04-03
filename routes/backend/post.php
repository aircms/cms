<?php

use Illuminate\Routing\RouteSignatureParameters;
use App\Http\Controllers\Backend\Post\PostController;
use App\Http\Controllers\Backend\Post\TypeController;
use App\Http\Controllers\Backend\Post\FieldController;
use App\Http\Controllers\Backend\Post\LayoutController;

/*
 * All route names are prefixed with 'admin.'.
 */
Route::group(['prefix' => 'post/{type}', 'as' => 'post.', 'namespace' => 'Post'], function () {
    Route::get('/', 'PostController@index')->name('index');

    Route::get('create', [PostController::class, 'create'])->name('create');
    Route::post('store', [PostController::class, 'store'])->name('store');

    Route::get('{post}/edit', [PostController::class, 'edit'])->name('edit');
    Route::post('{post}/update', [PostController::class, 'update'])->name('update');

    Route::delete('{post}/delete', [PostController::class, 'delete'])->name('delete');
});


Route::group(['prefix' => 'setting/'], function () {
    Route::group(['prefix' => 'post/', 'as' => 'post.', 'namespace' => 'Post'], function () {

        // type
        Route::group(['prefix' => 'type/', 'as' => 'type.'], function () {
            Route::get('/', [TypeController::class, 'index'])->name('index');

            Route::get('create', [TypeController::class, 'create'])->name('create');
            Route::post('store', [TypeController::class, 'store'])->name('store');

            Route::get('{type}/edit', [TypeController::class, 'edit'])->name('edit');
            Route::post('{type}/update', [TypeController::class, 'update'])->name('update');

            Route::post('{type}/delete', [TypeController::class, 'delete'])->name('delete');

            Route::get('{type}/move-up', [TypeController::class, 'up'])->name('up');
            Route::get('{type}/move-down', [TypeController::class, 'down'])->name('down');
        });

        // field
        Route::group(['prefix' => '/field', 'as' => 'field.'], function () {
            Route::get('/', [FieldController::class, 'index'])->name('index');

            Route::get('create', [FieldController::class, 'create'])->name('create');
            Route::post('store', [FieldController::class, 'store'])->name('store');

            Route::get('{field}/edit', [FieldController::class, 'edit'])->name('edit');
            Route::post('{field}/update', [FieldController::class, 'update'])->name('update');

            Route::post('{field}/delete', [FieldController::class, 'delete'])->name('delete');

            Route::get('{field}/move-up', [FieldController::class, 'up'])->name('up');
            Route::get('{field}/move-down', [FieldController::class, 'down'])->name('down');

            Route::get('{name}/demo', [FieldController::class, 'demo'])->name('demo');
        });


        // layout
        Route::group(['prefix' => 'type/{type}/layout', 'as' => 'layout.'], function () {
            Route::get('/', [LayoutController::class, 'index'])->name('index');

            Route::post('store', [LayoutController::class, 'store'])->name('store');

            Route::post('preview', [LayoutController::class, 'preview'])->name('preview');
        });

    });
});
