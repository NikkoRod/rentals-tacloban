<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// ========== PUBLIC ROUTES ==========

// Welcome page
Route::get('/', fn () => view('welcome'))->name('home');

// Login page
Route::get('/login', fn () => view('auth.login'))->name('login');

// Define a route for handling post-login redirection
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.submit');


// Redirect users based on their role after login
Route::middleware('auth')->group(function () {
    // Tenant routes
    Route::middleware('role:tenant')->get('/tenant/dashboard', function() {
        return view('tenant.dashboard');
    })->name('tenant.dashboard');

    // Landlord routes
    Route::middleware('role:landlord')->get('/landlord/dashboard', function() {
        return view('landlord.dashboard');
    })->name('landlord.dashboard');

});

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('home'); // Redirect to home or any route you'd like after logging out
})->name('logout');