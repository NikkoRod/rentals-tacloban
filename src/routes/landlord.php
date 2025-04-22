<?php

use Illuminate\Support\Facades\Route;

// ========== LANDLORD ROUTES ==========

use App\Http\Controllers\LandlordController;


Route::get('/register/landlord', [LandlordController::class, 'showRegisterForm'])->name('landlord.register');
Route::post('/register/landlord', [LandlordController::class, 'register']);
