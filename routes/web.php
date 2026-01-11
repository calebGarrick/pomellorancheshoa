<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AlertController;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Mail\ContactController;

// Route for admin user routes
Route::middleware(['auth', 'can:delete,user'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::delete('user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/user/{user}', [UserController::class, 'edit'])->name('user.edit');
});

// Routes for any logged in user
Route::middleware('auth')->group(function () {
    Route::get('/settings', [UserController::class, 'settings'])->name('settings');

    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
    
    Route::get('/alerts/{alert}/edit', [AlertController::class, 'edit'])->name('alerts.edit');
    Route::post('/alerts', [AlertController::class, 'store'])->name('alerts.store');
    Route::delete('/alerts/{alert}', [AlertController::class, 'destroy'])->name('alerts.destroy');
    Route::put('/alerts/{alert}', [AlertController::class, 'update'])->name('alerts.update');

    Route::post('/logout', Logout::class);
});

//public routes
Route::get('/', [AlertController::class, 'index'])->name('home');
Route::get('/about', function() {return view('about');})->name('about');
Route::get('/contact', function() {return view('contact');})->name('contact');
Route::get('/documents', function() {return view('documents');})->name('documents');
Route::get('/meetings', function() {return view('meetings');})->name('meetings');
Route::get('/projects', function() {return view('projects');})->name('projects');

Route::post('/contact/send', ContactController::class)->name('contact.send');

Route::post('/register', [UserController::class, 'store'])
    ->middleware('guest')
    ->name('user.create');
Route::post('/login', Login::class)
    ->middleware('guest');

Route::view('/register', 'auth.register')
    ->middleware('guest')
    ->name('register');

Route::view('/login', 'auth.login')
    ->middleware('guest')
    ->name('login');