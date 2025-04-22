<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenant Dashboard | Rentals Tacloban</title>
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
        .dashboard-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 100px);
            padding: 20px;
            background-color: #f9f9f9;
        }

        .dashboard-card {
            background-color: var(--white);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        .dashboard-card h2 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 1.5rem;
            color: var(--green);
        }

        .dashboard-card p {
            font-size: 1.1rem;
            line-height: 1.6;
            color: var(--black);
        }

        .dashboard-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .dashboard-actions a {
            background-color: var(--green);
            color: var(--white);
            padding: 12px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .dashboard-actions a:hover {
            background-color: var(--green-hover);
        }
    </style>
</head>
<body>

    <!-- HEADER -->
    <header class="header">
        <div class="header-content">
            <h1>Rentals Tacloban</h1>
            <nav class="header-nav">
                <a href="{{ route('logout') }}" class="logout-btn">Logout</a>
            </nav>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <div class="dashboard-container">
        <div class="dashboard-card">
            <h2>Welcome, {{ Auth::user()->name }}!</h2>
            <p>As a tenant, you can manage your rental bookings, view available listings, and update your profile details.</p>
        
        </div>
    </div>

</body>
</html>
