<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password | Admin</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
    <div class="login-container">
        <form method="POST" action="{{ route('admin.password.email') }}" class="login-form">
            @csrf
            <h2>Forgot Password</h2>

            @if (session('status'))
                <div style="color: green; margin-bottom: 15px;">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div style="color: red; margin-bottom: 15px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="input-group">
                <label for="email">Enter your admin email address</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
            </div>

            <button type="submit" class="login-btn">Send Reset Link</button>
        </form>
    </div>
</body>
</html>
