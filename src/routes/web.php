<?php

use Illuminate\Support\Facades\Route;

// Welcome page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Login page (uses Laravel Breeze, Jetstream, or your auth setup)
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Register as Tenant
Route::get('/register/tenant', function () {
    return view('auth.register-tenant');
})->name('register.tenant');

// Register as Landlord
Route::get('/register/landlord', function () {
    return view('auth.register-landlord');
})->name('register.landlord');

