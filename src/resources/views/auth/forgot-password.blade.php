@extends('layouts.main')

@section('title', 'Forgot Password')

@section('body-class', 'forgot-password-page')

@push('styles')
<style>
    body.forgot-password-page {
        background-color: #f9f9f9;
    }

    .page-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        height: calc(100vh - 100px);
    }

    .reset-container {
        background: white;
        padding: 30px;
        max-width: 400px;
        width: 100%;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .reset-container h2 {
        text-align: center;
        color: #14532d;
        margin-bottom: 20px;
    }

    .input-group {
        margin-bottom: 15px;
    }

    .input-group label {
        display: block;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .input-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 1rem;
    }

    .btn-submit {
        background-color: #14532d;
        color: white;
        border: none;
        padding: 12px;
        width: 100%;
        border-radius: 6px;
        font-size: 1rem;
        cursor: pointer;
    }

    .btn-submit:hover {
        background-color: #1f6b3d;
    }

    .message {
        color: green;
        margin-bottom: 10px;
        text-align: center;
    }

    .error {
        color: red;
        text-align: center;
        margin-bottom: 10px;
    }
</style>
@endpush

@section('content')
<div class="page-wrapper">
    <div class="reset-container">
        <h2>Forgot Your Password?</h2>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="input-group">
                <label for="email">Email Address</label>
                <input id="email" type="email" name="email" required autofocus>
            </div>
            <button type="submit" class="btn-submit">Send Reset Link</button>

            @if (session('status'))
                <div class="message">{{ session('status') }}</div>
            @endif

            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </form>
    </div>
</div>
@endsection
