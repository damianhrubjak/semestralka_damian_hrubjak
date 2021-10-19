<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::name('fe-pages.')->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name("home");
    Route::get('/products', function () {
        return view('products');
    })->name("products");
    Route::get('/contact', function () {
        return view('contact');
    })->name("contact");
});
