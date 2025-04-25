<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin | Rentals Tacloban</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <style>
        .password-wrapper {
    position: relative;
    display: flex;
    align-items: center;
}

.password-wrapper input {
    width: 100%;
    padding: 10px;
    padding-right: 60px; /* Make space for button */
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1rem;
    color: var(--black);
    box-sizing: border-box;
}

.toggle-password {
    position: absolute;
    right: 12px;
    background: none;
    border: none;
    color: var(--green);
    font-weight: bold;
    cursor: pointer;
    font-size: 0.9rem;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

        .toggle-password:hover {
            color: var(--green-hover);
        }

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

        /* Header */
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

        .header-nav a {
            color: var(--white);
            text-decoration: none;
            margin-left: 20px;
            font-weight: 500;
            transition: color 0.2s ease-in-out;
        }

        .header-nav a:hover {
            color: var(--green-hover);
        }

        /* Main Section */
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
            padding-right: 60px; /* Make room for the toggle button */
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

        /* Sign Up Dropdown */
        .signup-dropdown {
            position: relative;
            display: inline-block;
        }

        .signup-options {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: var(--green);
            padding: 10px;
            border-radius: 6px;
            animation: fadeIn 0.3s ease-in-out;
            width: 180px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .signup-options a {
            display: block;
            color: var(--white);
            padding: 8px 10px;
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.2s ease-in-out;
        }

        .signup-options a:hover {
        }

        .signup-dropdown:hover .signup-options {
            display: block;
        }
    </style>
</head>
<body>

    <!-- HEADER -->
    <header class="header">
        <div class="header-content">
            <h1>Rentals Tacloban</h1>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <div class="login-container">
        <form method="POST" action="{{ url('/admin/login') }}" class="login-form">
            @csrf
            <h2>Admin</h2>

            @if($errors->any())
                <div style="color: red; margin-bottom: 15px;">
                    <ul style="padding-left: 20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="input-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" placeholder="Enter your admin email" value="{{ old('email') }}" required>
            </div>

            <div class="input-group">
    <label for="password">Password</label>
    <div class="password-wrapper">
        <input type="password" name="password" id="password" placeholder="Enter your password" required>
        <button type="button" class="toggle-password" onclick="togglePassword()">Show</button>
    </div>
</div>



            <div style="text-align: right; margin-bottom: 15px;">
                <a href="{{ url('/admin/forgot-password') }}" style="font-size: 0.9rem; color: var(--green); text-decoration: none;">
                    Forgot Password?
                </a>
            </div>

            <button type="submit" class="login-btn">Login</button>
        </form>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleBtn = document.querySelector('.toggle-password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleBtn.textContent = 'Hide';
            } else {
                passwordInput.type = 'password';
                toggleBtn.textContent = 'Show';
            }
        }
    </script>

</body>
</html>
