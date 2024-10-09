<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\PostController;
use App\Http\Controllers\Auth\CategoryController;
use App\Http\Controllers\Auth\TagController;



Route::get('/', function () {
    // auth()->logout();
    return view('welcome');
});

Auth::routes([
    'register' => false
]);


Route::get('dashboard', [DashboardController::class,'dashboard'])->name('dashboard')->middleware('auth');

Route::resource('auth/posts', PostController::class)->middleware('auth');
// Route::get('auth/categories', CategoriesController::class,"categoriesController")->name('auth.categories');

// Route::get('auth/categories', CategoriesController::class, "categoriesController")->name('auth.categories');

Route::get('auth/categories', [CategoryController::class, 'index'])->name('auth.categories');
Route::get('auth/tags', [TagController::class, 'index'])->name('auth.tags');
