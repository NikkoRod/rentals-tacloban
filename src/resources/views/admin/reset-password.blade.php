<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password | Admin</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
    <div class="login-container">
        <form method="POST" action="{{ route('admin.password.update') }}" class="login-form">
            @csrf
            <h2>Reset Password</h2>

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

            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">

            <div class="input-group">
                <label for="password">New Password</label>
                <input type="password" name="password" required>
            </div>

            <div class="input-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" required>
            </div>

            <button type="submit" class="login-btn">Reset Password</button>
        </form>
    </div>
</body>
</html>
