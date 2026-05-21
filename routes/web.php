<?php

use App\Http\Controllers\AlertController;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\RequestPassword;
use App\Http\Controllers\Auth\ResetPassword;
use App\Http\Controllers\Mail\ContactController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route for admin user routes
Route::middleware(['auth', 'can:viewAny, App\Models\User'])->group(function () {
    Route::patch('/user/approve/{user}', [UserController::class, 'approve'])->name('user.approve');
    Route::patch('/user/{user}/toggle-admin', [UserController::class, 'toggleAdmin'])->name('user.toggle-admin');
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::delete('user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/user/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::get('/lotmap2026', function () {
        return view('lotmap2026');
    })->name('lotmap2026');

    Route::get('/alerts/{alert}/edit', [AlertController::class, 'edit'])->name('alerts.edit');
    Route::post('/alerts', [AlertController::class, 'store'])->name('alerts.store');
    Route::delete('/alerts/{alert}', [AlertController::class, 'destroy'])->name('alerts.destroy');
    Route::put('/alerts/{alert}', [AlertController::class, 'update'])->name('alerts.update');
});

// Routes for any logged in user
Route::middleware('auth')->group(function () {
    Route::get('/documents', function () {
        return view('documents');
    })->name('documents');
    Route::get('/meetings', function () {
        return view('meetings');
    })->name('meetings');
    Route::get('/projects', function () {
        return view('projects');
    })->name('projects');

    Route::get('/settings', [UserController::class, 'settings'])->name('user.settings');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');

    Route::post('/logout', Logout::class);
});

// public page routes
Route::get('/', [AlertController::class, 'index'])->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact');
Route::get('/estoppel', function () {
    return view('estoppel');
})->name('estoppel');

Route::view('/register', 'auth.register')
    ->middleware('guest')
    ->name('register');

Route::view('/login', 'auth.login')
    ->middleware('guest')
    ->name('login');

Route::view('/forgot-password', 'auth.forgot-password')
    ->middleware('guest')
    ->name('password.request');

Route::view('/reset-password/{token}', 'auth.reset-password')
    ->middleware('guest')
    ->name('password.reset');

// public action routes
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::post('/register', [UserController::class, 'store'])
    ->middleware('guest')
    ->name('user.store');

Route::post('/login', Login::class)
    ->middleware('guest')
    ->name('auth.login');

Route::post('/forgot-password', RequestPassword::class)
    ->middleware('guest')
    ->name('password.email');

Route::post('/reset-password/{token}', ResetPassword::class)
    ->middleware('guest')
    ->name('password.update');
