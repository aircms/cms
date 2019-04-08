<?php

use App\Http\Controllers\Backend\FinderController;

/*
 * All route names are prefixed with 'admin.'.
 */
Route::group(['prefix' => 'finder/', 'as' => 'finder.'], function () {
    Route::get('/', [FinderController::class, 'dir'])->name('dir');
    Route::get('download', [FinderController::class, 'download'])->name('download');
    Route::get('show', [FinderController::class, 'show'])->name('show');
    Route::get('delete', [FinderController::class, 'delete'])->name('delete');
});
