<?php

use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\PostController;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::group(['prefix' => 'contact/'], function () {
    Route::get('contact', [ContactController::class, 'index'])->name('contact');
    Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');
});

Route::get('category/{slug}', [CategoryController::class, 'slug'])->name('category.slug');
Route::get('category/{id}', [CategoryController::class, 'id'])->name('category.id');

Route::get('page/{slug}', [PageController::class, 'slug'])->name('page.slug');
Route::get('page/{id}', [PageController::class, 'id'])->name('page.id');

Route::get('post/{slug}', [PostController::class, 'slug'])->name('post.slug');
Route::get('post/{id}', [PostController::class, 'id'])->name('post.id');
