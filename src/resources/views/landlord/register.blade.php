@extends('layouts.main')

@section('title', 'Register as Landlord')

@section('content')
    <div class="form-container">
        <h2>Landlord Registration</h2>

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ url('/register/landlord') }}" enctype="multipart/form-data">
            @csrf

            <label for="name">Full Name</label>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name') <div class="error">{{ $message }}</div> @enderror

            <label for="email">Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
            @error('email') <div class="error">{{ $message }}</div> @enderror

            <label for="password">Password</label>
            <input type="password" name="password">
            @error('password') <div class="error">{{ $message }}</div> @enderror

            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation">

            <label for="business_permit">Business Permit (PDF only)</label>
            <input type="file" name="business_permit">
            @error('business_permit') <div class="error">{{ $message }}</div> @enderror

            <button type="submit">Register</button>
        </form>
    </div>
@endsection
