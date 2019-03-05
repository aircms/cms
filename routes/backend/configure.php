<?php

use App\Http\Controllers\Backend\Setting\ConfigureController;

Route::group(['prefix' => 'setting/', 'as' => 'setting.'], function () {
    Route::group(['prefix' => 'configure/', 'as' => 'configure.'], function () {
        Route::get('/', [ConfigureController::class, 'notfound'])->name('root');

        Route::get('{category}', [ConfigureController::class, 'category'])->name('category');
    });
});
