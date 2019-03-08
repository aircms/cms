<?php

/*
 * All route names are prefixed with 'admin.'.
 */
Route::group(['prefix' => 'upload/', 'as' => 'upload.'], function () {
    Route::post("image", [\App\Http\Controllers\Backend\UploadeController::class, 'image'])->name('image');
});
