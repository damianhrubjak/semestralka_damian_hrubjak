<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

/**
 * AUTHENTIFICATION ROUTES
 * 
 *  Copied from https://github.com/laravel/breeze/
 */
Route::name('auth.')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])
        ->middleware('guest')
        ->name('register.create');

    Route::post('/register', [RegisteredUserController::class, 'store'])
        ->middleware('guest')
        ->name('register.store');

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->middleware('guest')
        ->name('login.create');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest')
        ->name('login.store');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth')
        ->name('logout');
});
