<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Orphan Care System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        /* Navbar Styling */
        .navbar {
            background: linear-gradient(135deg, #007bff, #6610f2);
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
        .btn-custom {
            border-radius: 50px;
            padding: 8px 20px;
        }

        /* Hero Section */
        .hero-section {
            background: url('https://source.unsplash.com/1600x900/?children,help') no-repeat center center/cover;
            height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: relative;
        }
        .hero-overlay {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.6);
        }
        .hero-content {
            position: relative;
            z-index: 1;
        }

        /* Content Section */
        .content-section {
            padding: 60px 15px;
            text-align: center;
        }
        .content-section h2 {
            color: #007bff;
            font-weight: bold;
        }

        /* Gallery */
        .image-gallery img {
            width: 100%;
            border-radius: 15px;
            transition: transform 0.3s;
        }
        .image-gallery img:hover {
            transform: scale(1.05);
        }

        /* Footer */
        footer {
            background: #343a40;
            color: white;
            padding: 20px 0;
            text-align: center;
            position: relative;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Orphan Care System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
       <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="child-gallery-sponsored.php">Child Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="program.php">Program</a></li>
                <li class="nav-item"><a class="nav-link" href="photo-gallery.php">Photo Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="feedback-form.php">Feedback</a></li>
                <li class="nav-item"><a class="nav-link" href="contact-us.php">Contact</a></li>
                <li class="nav-item"><a class="btn btn-warning btn-custom" href="donation.php">Donate</a></li>
            </ul>
    </div>
</nav>

<!-- Hero Section -->
<div class="hero-section">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1>Welcome to Orphan Care System</h1>
        <p>Your contribution can change lives</p>
        <a href="#" class="btn btn-success btn-lg btn-custom">Make a Donation</a>
    </div>
</div>

<!-- Content Section -->
<div class="container content-section">
    <h2>About Us</h2>
    <p>Orphan Care  is a non-profit organization dedicated to the care and development of underprivileged children.</p>

    <!-- Gallery -->
    <div class="row image-gallery">
        <div class="col-md-6">
            <img src="https://source.unsplash.com/600x400/?children,education" alt="Children Image">
        </div>
        <div class="col-md-6">
            <img src="https://source.unsplash.com/600x400/?children,school" alt="Children Image">
        </div>
    </div>
</div>

<!-- Footer -->
<footer>
    <p>&copy; 2025 Orphan Care. All rights reserved.</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
