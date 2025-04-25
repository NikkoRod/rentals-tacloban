<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Rentals Tacloban')</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    
    <!-- Page-specific styles -->
    @stack('styles')

    <style>
        :root {
            --black: #000;
            --white: #fff;
            --green: #14532d;
            --green-hover: #1f6b3d;
            --light-green: #4CAF50;
        }

        body {
            background-color: var(--white);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--black);
            margin: 0;
            padding: 0;
        }

        /* Header */
        .header {
            background-color: var(--green);
            color: var(--white);
            padding: 20px 0;
            width: 100%;
            border-bottom: 3px solid var(--green-hover);
            position: sticky;
            top: 0; /* Stick to the top */
            z-index: 1000; /* Stay above other content */
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

        .header-nav {
            display: flex;
            align-items: center;
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

        .form-container {
            max-width: 500px;
            margin: 60px auto;
            padding: 30px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        h2 {
            text-align: center;
            color: var(--green);
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: 600;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button {
            background-color: var(--green);
            color: var(--white);
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            margin-top: 20px;
            width: 100%;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: var(--green-hover);
        }

        .success {
            background-color: var(--light-green);
            color: white;
            padding: 10px;
            margin-top: 10px;
            text-align: center;
            border-radius: 6px;
        }

        .error {
            color: red;
            font-size: 0.9rem;
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
</head>

<body class="@yield('body-class', '')">
    <!-- HEADER -->
    <header class="header">
        <div class="header-content">
            <h1>Rentals Tacloban</h1>
            <nav class="header-nav">
    @guest
        <div class="signup-dropdown">
            <a href="#">Sign Up</a>
            <div class="signup-options">
                <a href="{{ url('/register/tenant') }}">As Tenant</a>
                <a href="{{ url('/register/landlord') }}">As Landlord</a>
            </div>
        </div>
        <a href="{{ route('login') }}">Login</a>
    @endguest

    @auth
        <!-- Optionally, show something like a user profile or logout -->
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endauth
</nav>

        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main>
        @yield('content')
    </main>

</body>
</html>
