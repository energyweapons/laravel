<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

Route::get('/articles', [ArticleController::class, 'index'])
    ->name('articles.index');

Route::get('/articles/{id}', [ArticleController::class, 'show'])
    ->name('articles.show');

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
});

Route::group([
    'prefix' => '/admin'
], function () {
    Route::resource('/users', UserController::class);

});
