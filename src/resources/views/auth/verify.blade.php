@extends('layouts.main')

@section('content')
<div class="page-wrapper">
    <div class="verify-container">
        <h2>Email Verification Required</h2>

        @if (session('message'))
            <div class="message">{{ session('message') }}</div>
        @endif

        <p class="mb-3" style="text-align: center;">
            Before accessing your account, please check your email inbox for a verification link.<br>
            If you didn’t receive one, click the button below to request a new one.
        </p>

        <form method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn-submit">Resend Verification Email</button>
        </form>

    </div>
</div>

<style>
    .page-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 80vh;
        background-color: #f9f9f9;
        padding: 40px 20px;
    }

    .verify-container {
        background: white;
        padding: 30px;
        max-width: 500px;
        width: 100%;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .verify-container h2 {
        color: #14532d;
        text-align: center;
        margin-bottom: 20px;
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

    .btn-link-logout {
        background: none;
        border: none;
        color: red;
        font-weight: bold;
        cursor: pointer;
        text-decoration: underline;
    }

    .message {
        color: green;
        background-color: #e6f4ea;
        border: 1px solid #c7e5c3;
        padding: 10px;
        text-align: center;
        border-radius: 6px;
        margin-bottom: 15px;
    }
</style>
@endsection
