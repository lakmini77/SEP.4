

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



            
            <!-- right content -->
            <div class="twelve wide column">
                <h1>Child Registration Form</h1>


                <?php

                    if(isset($_POST['submit_child'])) {
                        $child_name = $_POST['child_name'];
                        $child_dob = $_POST['child_dob'];
                        $child_yoe = $_POST['child_yoe'];
                        $child_class = $_POST['child_class'];
                        $child_story_behind = $_POST['child_story_behind'];
                        $child_pic = $_POST['child_pic'];

                        $sql = "INSERT INTO children (cname, cdob, cyoe, cclass, cstory, cphoto) VALUES ('$child_name', '$child_dob', '$child_yoe', '$child_class', '$child_story_behind', '$child_pic')";

                        if ($conn->query($sql) === TRUE) {
                            echo "<script> alert('New record created successfully'); </script>";
                        } else {
                            echo "<script> alert('Error in Insertion'); </script>";
                        }
                        
                        $conn->close();

                    }

                ?>

                
                <form action="<?php $_PHP_SELF ?>" method="post" class="ui form">
                    <div class="seven wide field">
                        <label>Child Name</label>
                        <input type="text" name="child_name" placeholder="Child's Name" required>
                    </div>
                    <div class="seven wide field">
                        <label>Date of Birth</label>
                        <input type="date" name="child_dob" required>
                    </div>
                    <div class="seven wide field">
                        <label>Year of Enroll</label>
                        <input type="number" min="1900" max="2200" name="child_yoe" required>
                    </div>
                    <div class="seven wide field">
                        <label>Class / Grade</label>
                        <input type="number" min="1" max="12" name="child_class" required>
                    </div>
                    <div class="field">
                        <label>Story Behind</label>
                        <textarea name="child_story_behind" rows="2" required></textarea>
                    </div>
                    <div class="field">
                        <label>Upload Child Image</label>
                        <input type="file" name="child_pic" accept="image/*">
                    </div>
                    <button name="submit_child" type="submit" class="ui primary button">Submit</button>
                    <button type="reset" class="ui button">Reset</button>
                </form>

                
            </div>

        </div>

    </div>
    
<?php include './admin_components/admin_footer.php' ?>