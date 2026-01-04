<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Login;

Route::middleware('auth')->group(function () {
    Route::post('/chirps', [ChirpController::class, 'store']);
    Route::delete('/chirps/{chirp}', [ChirpController::class, 'destroy']);
    Route::get('/chirps/{chirp}/edit', [ChirpController::class, 'edit']);
    Route::put('/chirps/{chirp}', [ChirpController::class, 'update']);
    Route::post('/logout', Logout::class);
});

    Route::get('/', [ChirpController::class, 'index']);
    
    Route::post('/register', Register::class)
        ->middleware('guest');
    Route::post('/login', Login::class)
        ->middleware('guest');

    Route::view('/register', 'auth.register')
        ->middleware('guest')
        ->name('register');
    
    Route::view('/login', 'auth.login')
        ->middleware('guest')
        ->name('login');