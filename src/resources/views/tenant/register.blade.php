@extends('layouts.main')

@section('title', 'Register as Tenant')

@section('content')
    <div class="form-container">
        <h2>Tenant Registration</h2>

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ url('/register/tenant') }}">
            @csrf

            <label for="name">Full Name</label>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name') <div class="error">{{ $message }}</div> @enderror

            <label for="email">Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
            @error('email') <div class="error">{{ $message }}</div> @enderror

            <label for="contact_number">Mobile Number</label>
            <input type="text" name="contact_number" value="{{ old('contact_number') }}">
            @error('contact_number') <div class="error">{{ $message }}</div> @enderror

            <label for="password">Password</label>
            <input type="password" name="password">
            @error('password') <div class="error">{{ $message }}</div> @enderror

            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation">

            <button type="submit">Register</button>
        </form>
    </div>
@endsection
