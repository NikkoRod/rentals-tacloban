<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password | Admin</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <style>
        :root {
            --black: #000;
            --white: #fff;
            --green: #14532d;
            --green-hover: #1f6b3d;
            --light-green: #4CAF50;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--white);
            color: var(--black);
        }

        .header {
            background-color: var(--green);
            color: var(--white);
            padding: 20px 0;
            width: 100%;
            border-bottom: 3px solid var(--green-hover);
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .header h1 {
            font-size: 1.8rem;
            margin: 0;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 100px);
            padding: 20px;
            background-color: #f9f9f9;
        }

        .login-form {
            background-color: var(--white);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-form h2 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 1.5rem;
            color: var(--green);
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            font-weight: 600;
            display: block;
            margin-bottom: 5px;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            color: var(--black);
            box-sizing: border-box;
        }

        .input-group input:focus {
            border-color: var(--green);
            outline: none;
        }

        .login-btn {
            background-color: var(--green);
            color: var(--white);
            padding: 12px;
            border: none;
            border-radius: 6px;
            width: 100%;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .login-btn:hover {
            background-color: var(--green-hover);
        }

        .status-message {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
        }

        .status-message.success {
            background-color: #e6f9e6;
            color: #28a745;
        }

        .status-message.error {
            background-color: #f8d7da;
            color: #dc3545;
        }
        #overlay {
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        z-index: 1000;
    }

    .popup-message {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        max-width: 400px;
        width: 90%;
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        z-index: 1001;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
    }

    .popup-message.success {
        border-left: 6px solid #28a745;
    }

    .popup-message.error {
        border-left: 6px solid #dc3545;
    }
    </style>
</head>
<body>

    <header class="header">
        <div class="header-content">
            <h1>Rentals Tacloban</h1>
        </div>
    </header>
    <div class="login-container">
        <form method="POST" action="{{ route('admin.password.update') }}" class="login-form">
            @csrf
            <h2>Reset Password</h2>

            <div id="overlay" style="display: none;"></div>

@if (session('status') === 'Password reset successfully!')
<div class="popup-message success" id="feedback-box">
    <p>{{ session('status') }}</p>
    <button onclick="window.location.href='{{ route('admin.login') }}'" class="login-btn" style="margin-top: 10px;">Proceed to Login</button>
</div>
@endif

@if ($errors->any())
<div class="popup-message error" id="feedback-box">
    <ul style="padding-left: 20px;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button onclick="closePopup()" class="login-btn" style="margin-top: 10px;">Close</button>
</div>
@endif


            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">

            <div class="input-group">
                <label for="password">New Password</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="input-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>

            <button type="submit" class="login-btn">Reset Password</button>
        </form>
    </div>
    <script>
    window.addEventListener('DOMContentLoaded', () => {
        const feedbackBox = document.getElementById('feedback-box');
        const overlay = document.getElementById('overlay');

        if (feedbackBox) {
            overlay.style.display = 'block';
        }
    });

    function closePopup() {
        document.getElementById('feedback-box').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
    }
</script>

</body>
</html>
