<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

// ========== PUBLIC ROUTES ==========

//welcomepage
Route::get('/', fn () => view('welcome'))->name('home');
Route::get('/login', fn () => view('auth.login'))->name('login');


//testmail la
Route::get('/test-mail', function () {
    Mail::raw('Hello from Mailpit test!', function ($message) {
        $message->to('test@example.com')->subject('Mailpit Test');
    });
    return 'Email sent!';
});
