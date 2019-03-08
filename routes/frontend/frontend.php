<?php

use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('index');


Route::group(['prefix' => 'contact/'], function () {
    Route::get('contact', [ContactController::class, 'index'])->name('contact');
    Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');
});


Route::get('category/{$category}', [\App\Http\Controllers\Frontend\CategoryController::class, 'index'])->name('category');
Route::get('page/{$page}', [\App\Http\Controllers\Frontend\CategoryController::class, 'index'])->name('page');
Route::get('post/{$post}', [\App\Http\Controllers\Frontend\PostController::class, 'index'])->name('post');

