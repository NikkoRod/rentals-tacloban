<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <style>
        :root {
            --black: #1a1a1a;
            --white: #ffffff;
            --green: #2E7D32;
            --light-green: #4CAF50;
            --gray: #f8f9fa;
            --dark-gray: #343a40;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--gray);
            min-height: 100vh;
        }

        header {
            background-color: var(--white);
            color: var(--black);
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            font-weight: 600;
            font-size: 1.5rem;
        }

        .logout-btn {
            background-color: var(--green);
            color: var(--white);
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background-color: var(--light-green);
            transform: translateY(-2px);
        }

        .dashboard-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            padding: 2rem;
            margin: 1rem auto;
            max-width: 1400px;
        }

        .card {
            background-color: var(--white);
            border-radius: 16px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            padding: 1.5rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid rgba(0,0,0,0.05);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
        }

        .card h3 {
            color: var(--black);
            font-size: 1.3rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .card p {
            color: var(--dark-gray);
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .card .btn {
            background-color: var(--green);
            color: var(--white);
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .card .btn:hover {
            background-color: var(--light-green);
            transform: translateY(-2px);
        }

        footer {
            background-color: var(--white);
            color: var(--dark-gray);
            padding: 1.5rem;
            text-align: center;
            border-top: 1px solid rgba(0,0,0,0.05);
            margin-top: auto;
        }

        @media (max-width: 768px) {
            .dashboard-container {
                grid-template-columns: 1fr;
                padding: 1rem;
            }
            
            header {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>

<header>
    <h1>Admin</h1>
    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit" class="logout-btn">Logout</button>
    </form>
</header>

<div class="dashboard-container">
    <!-- Manage Pending Accounts Card -->
    <div class="card">
        <h3>Manage Pending Accounts</h3>
        <p>Review and approve landlord Accounts.</p>
        <a class="btn">Manage Accounts</a>
    </div>
    <div class="card">
        <h3>Manage Flagged Listings</h3>
        <p>Review listings that have been flagged for review.</p>
        <a class="btn">Manage Listings</a>
    </div>

    <div class="card">
        <h3>Manage User Accounts</h3>
        <p>Search, filter, and edit all user accounts.</p>
        <a class="btn">Manage Users</a>
    </div>

    <div class="card">
        <h3>Manage Listings</h3>
        <p>View and manage all property listings.</p>
        <a class="btn">Manage Listings</a>
    </div>
</div>

<footer>
    <p>&copy; 2025 Rentals Tacloban. All Rights Reserved.</p>
</footer>

</body>
</html>
