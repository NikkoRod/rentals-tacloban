<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <style>
        /* Color Palette */
        :root {
            --black: #000000;
            --white: #ffffff;
            --green: #14532d; /* Dark green */
            --gray: #f4f4f4;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--gray);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            position: sticky;
            top: 0;
            background-color: var(--black);
            color: var(--white);
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 10;
        }

        header h1 {
            margin: 0;
            font-size: 1.5em;
        }

        .logout-btn {
            background-color: var(--green);
            color: var(--white);
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 0.9em;
        }

        .logout-btn:hover {
            background-color: #0f3e1b;
        }

        .dashboard-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            padding: 20px;
            flex-grow: 1;
        }

        .card {
            background-color: var(--white);
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            text-align: center;
        }

        .card h3 {
            color: var(--green);
            margin-bottom: 15px;
            font-size: 1.2em;
        }

        .card p {
            margin-bottom: 20px;
            color: var(--black);
        }

        .card .btn {
            background-color: var(--green);
            color: var(--white);
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            font-size: 0.9em;
            text-align: center;
        }

        .card .btn:hover {
            background-color: #0f3e1b;
        }

        .card .btn-secondary {
            background-color: #333;
        }

        .card .btn-secondary:hover {
            background-color: #555;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: var(--black);
            color: var(--white);
            position: relative;
            bottom: 0;
            width: 100%;
        }

    </style>
</head>
<body>

<header>
    <h1>Admin Dashboard</h1>
    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit" class="logout-btn">Logout</button>
    </form>
</header>

<div class="dashboard-container">
    <!-- Manage Pending Accounts Card -->
    <div class="card">
        <h3>Manage Pending Accounts</h3>
        <p>Review and approve new accounts (tenant or landlord).</p>
        <a href="{{ route('admin.pending-accounts') }}" class="btn">Manage Accounts</a>
    </div>


    <!-- <div class="card">
        <h3>Manage Flagged Listings</h3>
        <p>Review listings that have been flagged for review.</p>
        <a href="{{ route('admin.manage.flagged') }}" class="btn">Manage Listings</a>
    </div>

    <div class="card">
        <h3>Manage User Accounts</h3>
        <p>Search, filter, and edit all user accounts.</p>
        <a href="{{ route('admin.manage.users') }}" class="btn">Manage Users</a>
    </div>

    <div class="card">
        <h3>Manage Listings</h3>
        <p>View and manage all property listings.</p>
        <a href="{{ route('admin.manage.listings') }}" class="btn">Manage Listings</a>
    </div> -->
</div>

<footer>
    <p>&copy; 2025 Rentals Tacloban. All Rights Reserved.</p>
</footer>

</body>
</html>
