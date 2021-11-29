<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;


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
    Route::get('/', [PagesController::class, 'homePage'])->name("home");
    Route::get('/products', [ProductController::class, 'indexFrontEnd'])->name("products.index-fe");
    Route::view('/contact', 'contact')->name("contact");
});

Route::name('files.')->group(function () {
    Route::get('/thumbnail-image/{file}', [FileController::class, 'showFile'])->name('show-file');
    Route::get('/image/{file}', [FileController::class, 'showFileFullResolution'])->name('show-file-full-resolution');
});


//* AUTH
require __DIR__ . '/auth.php';

//* Admin
require __DIR__ . '/admin.php';
