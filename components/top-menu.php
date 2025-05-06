<!-- Top Navigation Bar -->
<div class="ui inverted menu navbar blue">

    <div class="ui container">
        <div class="header item logo">
            <strong>Orphan Foundation Development</strong>
        </div>
        <a class="item" href="index.php">Home</a>
        <div class="right menu">
            <?php
                if (empty($_SESSION['user_id'])) { 
            ?>
                    <a href="login.php" class="item <?php echo ($_SERVER['PHP_SELF'] == "/orphan/login.php" ? "active" : "");?>">Login</a>
            <?php
                } else { 
            ?>
                    <a href="admin/index.php" class="item">Admin Panel</a>
                    <a href="logout.php" class="item">Logout</a>
            <?php
                } 
            ?>
        </div>
    </div>
</div>

<style>


/* Blue gradient background */
.blue-gradient {
    background: linear-gradient(to right, #2193b0, #6dd5ed) !important;
    color: white !important;
}
.blue-gradient .item {
    color: white !important;
}

        .navbar-brand {
            font-weight: bold;
        }
        .nav-link {
            color: white !important;
            transition: transform 0.3s;
        }
        .nav-link:hover {
            transform: scale(1.1);
        }
    /* Navbar Styling */
    .navbar {
        background: linear-gradient(to right, #ff7e5f, #feb47b); /* Gradient effect */
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        padding: 1.2rem 0;
        z-index: 100;
        width: 100%;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .navbar .logo {
        font-size: 1.8rem;
        font-weight: bold;
        color: white;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .navbar .item {
        font-size: 1.2rem;
        color: white;
        padding: 1.1rem 1.5rem;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }
	

    .navbar .item:hover {
        background-color: rgba(255, 255, 255, 0.2); /* Subtle background color on hover */
        transform: scale(1.05);
    }

    .navbar .item.active {
        background-color: #e67e22; /* Active item background */
        color: white;
        font-weight: bold;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .navbar .item {
            font-size: 1rem;
            padding: 1rem;
        }

        .navbar .logo {
            font-size: 1.5rem;
        }
    }

    /* Container to keep the content aligned and spaced */
    .ui.container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .right.menu {
        display: flex;
        align-items: center;
    }

    /* Ensure the content below the navbar doesn't overlap */
    body {
        margin-top: 70px; /* Adjust this value based on navbar height */
    }
</style>
