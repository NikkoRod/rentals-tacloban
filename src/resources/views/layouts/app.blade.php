<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Rentals Tacloban')</title>
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

        /* Main Section */
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
    </style>
</head>
<body>

<!-- HEADER -->
<header class="header">
    <div class="header-content">
        <h1>Rentals Tacloban</h1>
        <nav class="header-nav">
            <div class="signup-dropdown">
                <a href="#">Sign Up</a>
                <div class="signup-options">
                    <a href="{{ url('/register/tenant') }}">As Tenant</a>
                    <a href="{{ url('/register/landlord') }}">As Landlord</a>
                </div>
            </div>
            <a href="{{ route('login') }}">Login</a>
        </nav>
    </div>
</header>

@yield('content')

</body>
</html>
