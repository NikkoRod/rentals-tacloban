<?php

use Illuminate\Support\Facades\Route;

// ========== LANDLORD ROUTES ==========

// Landlord Registration
Route::get('/register/landlord', fn () => view('auth.register-landlord'))->name('register.landlord');

// Add more landlord-specific routes here (e.g., view listings, upload permits, etc.)
