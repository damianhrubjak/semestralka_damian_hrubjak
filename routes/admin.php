<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\Admin\AdminPagesController;


Route::name('admin.')->prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminPagesController::class, 'index'])->name('home');
    Route::view('/products', 'admin.pages.products-index')->name('products.index');
    Route::view('/product-categories', 'admin.pages.product-categories-index')->name('product-categories.index');
});
