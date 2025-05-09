<?php include './admin_components/admin_header.php' ?>

<?php
// Database connection variables
$servername = "localhost";  // Change as necessary
$username = "root";         // Your MySQL username
$password = "";             // Your MySQL password (leave empty if none)
$dbname = "orphan";         // Name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback - Admin Panel</title>
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
        }

        .top-menu {
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            padding: 0 20px;
            font-size: 0.95rem;
        }

        .dashboard-container {
            display: flex;
            height: calc(100% - 100px);
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
            background-color: rgba(255, 255, 255, 0.1);
        }

        th, td {
            padding: 12px 15px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            text-align: left;
        }

        th {
            background-color: rgba(255, 255, 255, 0.15);
        }

        tr:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .add-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #00b5ad;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        .add-button:hover {
            background: #009c95;
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

    <!-- Top Menu -->
    <div class="top-menu">
        Welcome, Admin | Notifications | Settings | Logout
    </div>

    <!-- Main Layout -->
    <div class="dashboard-container">

        <!-- Side Menu -->
        <div class="side-menu">
            <?php
                function active($page) {
                    return strpos($_SERVER['PHP_SELF'], $page) !== false ? 'active' : '';
                }
            ?>
            <a class="<?= active('index.php') ?>" href="index.php">Dashboard</a>
            <a class="<?= active('children.php') ?>" href="children.php">Children</a>
            <a class="<?= active('sponsorer.php') ?>" href="sponsorer.php">Sponsorers</a>
            <a class="<?= active('donators.php') ?>" href="donators.php">Donators</a>
            <a class="<?= active('gift-sent.php') ?>" href="gift-sent.php">Gift Sent</a>
            <a class="<?= active('programs.php') ?>" href="programs.php">Programs</a>
            <a class="<?= active('feedback.php') ?>" href="feedback.php">Feedback</a>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <h1>Feedback - Orphan</h1>

            <table>
                <thead>
                    <tr>
                        <th>Feed ID</th>
                        <th>Full Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Comment</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        $sql = "SELECT * FROM feedback";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                    ?>

                    <tr>
                        <td><?php echo $row['feed_id']; ?></td>
                        <td><?php echo $row['full_name']; ?></td>
                        <td><?php echo $row['full_address']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['comment']; ?></td>
                    </tr>

                    <?php
                            }
                        } else {
                            echo "<tr><td colspan='6'>No feedback found.</td></tr>";
                        }
                    ?>

                </tbody>
            </table>

            <a href="feedback-add.php" class="add-button">+ Add Feedback</a>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; <?php echo date("Y"); ?> Admin Dashboard. All rights reserved.
    </div>

</body>
</html>

<?php include './admin_components/admin_footer.php' ?>
