<?php

/*
 * All route names are prefixed with 'admin.'.
 */
Route::post("upload", [\App\Http\Controllers\Backend\UploadeController::class, 'index'])->name('upload');
