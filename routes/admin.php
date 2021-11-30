<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\Admin\AdminPagesController;


Route::name('admin.')->prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminPagesController::class, 'index'])->name('home');
    Route::resource('/products', ProductController::class)->except(['create', 'edit']);
    Route::get('/product-categories', [ProductCategoryController::class, 'showView'])->name('product-categories.index');
});
