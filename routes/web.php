<?php

use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/news/{id}', 'news')->name('news');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
});

Route::group([
    'prefix' => '/admin',
    'middleware' => [
        'auth',
        IsAdmin::class,
    ],
], function () {
    Route::resource('/users', UserController::class);

    Route::resource('/articles', ArticleController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
