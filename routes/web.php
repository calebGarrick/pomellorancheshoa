<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AlertController;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Login;

Route::middleware('auth')->group(function () {
    Route::post('/alerts', [AlertController::class, 'store']);
    Route::delete('/alerts/{alert}', [AlertController::class, 'destroy']);
    Route::get('/alerts/{alert}/edit', [AlertController::class, 'edit']);
    Route::put('/alerts/{alert}', [AlertController::class, 'update']);
    Route::post('/logout', Logout::class);
});

    Route::get('/', [AlertController::class, 'index']);
    
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