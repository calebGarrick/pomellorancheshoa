<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AlertController;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Mail\ContactController;

Route::middleware('auth')->group(function () {

    Route::get('/alerts/{alert}/edit', [AlertController::class, 'edit'])->name('alerts.edit');
    Route::post('/alerts', [AlertController::class, 'store'])->name('alerts.store');
    Route::delete('/alerts/{alert}', [AlertController::class, 'destroy'])->name('alerts.destroy');
    Route::put('/alerts/{alert}', [AlertController::class, 'update'])->name('alerts.update');

    Route::post('/logout', Logout::class);
});

    Route::get('/', [AlertController::class, 'index']);
    Route::get('/about', function() {return view('about');})->name('about');
    Route::get('/contact', function() {return view('contact');})->name('contact');
    Route::post('/contact/send', ContactController::class)->name('contact.send');
    Route::get('/meetings', function() {return view('meetings');})->name('meetings');
    Route::get('/minutes', function() {return view('minutes');})->name('minutes');
    
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

    Route::get('/path-check', function () {
    return [
        'base_path' => base_path(),
        'storage_path' => storage_path(),
        'log_path' => storage_path('logs/laravel.log'),
    ];
});