<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminPagesController;


Route::name('admin.')->prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminPagesController::class, 'index'])->name('home');
});
