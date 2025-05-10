<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #1e3c72, #2a5298);
            color: white;
        }

        .header {
            height: 60px;
            background: rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            padding: 0 20px;
            font-size: 1.5rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }

        .navbar {
            height: 50px;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            font-size: 0.95rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            transition: color 0.3s ease;
        }

        .navbar a:hover {
            color: #ffd700;
        }

        .navbar-left {
            font-weight: 500;
        }

        .navbar-right {
            display: flex;
            align-items: center;
        }

        .dashboard-container {
            display: flex;
            height: calc(100% - 110px); /* header (60) + navbar (50) */
        }

        .side-menu {
            width: 250px;
            background: rgba(0, 0, 0, 0.2);
            padding: 20px;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }

        .side-menu a {
            display: block;
            color: white;
            text-decoration: none;
            margin: 10px 0;
            padding: 12px 18px;
            border-radius: 10px;
            transition: background 0.3s ease;
        }

        .side-menu a:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .side-menu .active {
            background: rgba(255, 255, 255, 0.3);
            font-weight: bold;
        }

        .main-content {
            flex: 1;
            padding: 40px;
            overflow-y: auto;
        }

        h1 {
            text-align: center;
            margin-top: 40px;
        }

        .footer {
            height: 50px;
            background: rgba(0, 0, 0, 0.2);
            text-align: center;
            line-height: 50px;
            font-size: 0.85rem;
            color: #ccc;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        Admin Panel
    </div>

    <!-- Top Navbar -->
    <div class="navbar">
        <div class="navbar-left">
            Welcome, Admin
        </div>
        <div class="navbar-right">
            <a href="">Home</a>
             <!--  <a href="index.php">Settings</a>-->
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <!-- Main Layout -->
    <div class="dashboard-container">

        <!-- Side Menu -->
        <div class="side-menu">
            <?php
                $current = $_SERVER['PHP_SELF'];
                function active($page) {
                    return strpos($_SERVER['PHP_SELF'], $page) !== false ? 'active' : '';
                }
            ?>
            <a class="<?= active('index.php') ?>" href="index.php">Dashboard</a>
            <a class="<?= active('children.php') ?>" href="children.php">Children</a>
         
            <a class="<?= active('donators.php') ?>" href="donators.php">Donators</a>
            <a class="<?= active('gift-sent.php') ?>" href="gift-sent.php">Gift Sent</a>
            <a class="<?= active('programs.php') ?>" href="programs.php">Programs</a>
            <a class="<?= active('feedback.php') ?>" href="feedback.php">Feedback</a>
        </div>

        <!-- Content Area -->
        <div class="main-content">
            <h1>Welcome to Administrator</h1>
            <p style="text-align:center;">This is your central admin panel. Select a page from the left menu to manage data.</p>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; <?php echo date("Y"); ?> Admin Dashboard. All rights reserved.
    </div>

</body>
</html>
