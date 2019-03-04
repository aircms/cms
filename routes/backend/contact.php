<?php

use App\Http\Controllers\Backend\Utils\ContactController;

/*
 * All route names are prefixed with 'admin.'.
 */
Route::group(['prefix' => 'utils/', 'as' => 'utils.', 'namespace' => 'Utils'], function () {

    // contacts
    Route::group(['prefix' => 'contact/', 'as' => 'contact.'], function () {
        Route::get('replied', [ContactController::class, 'replied'])->name('replied');
        Route::get('waiting', [ContactController::class, 'waiting'])->name('waiting');

        Route::get('create', [ContactController::class, 'create'])->name('create');
        Route::post('store', [ContactController::class, 'store'])->name('store');

        Route::get('{contact}/reply', [ContactController::class, 'reply'])->name('reply');
        Route::post('{contact}/send', [ContactController::class, 'send'])->name('send');

    });

});
