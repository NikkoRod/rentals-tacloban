<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Rentals Tacloban may nangyari na</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <style>
        :root {
            --black: #000;
            --white: #fff;
            --green: #14532d;
            --green-hover: #1f6b3d;
            --light-green: #4CAF50;  /* Lighter green for better contrast */
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

        /* Main Section */
        .welcome-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: calc(100vh - 100px);
            text-align: center;
            padding: 20px;
        }

        .welcome-title {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .subtitle {
            font-size: 1.2rem;
            color: #444;
            margin-bottom: 2rem;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
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

    <!-- MAIN -->
    <div class="welcome-container">
        <h2 class="welcome-title">Find the perfect rental around Tacloban</h2>
        <p class="subtitle">Join us as a tenant or list your property as a landlord.</p>
    </div>

</body>
</html>
