<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Hope Bridge</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #ffffff;
    }

    .navbar {
      background: linear-gradient(135deg, #007bff, #6610f2);
    }

    .navbar-brand {
      font-weight: bold;
      font-size: 1.5rem;
    }

    .nav-link {
      color: white !important;
      font-size: 1.05rem;
      transition: transform 0.3s, color 0.3s;
    }

    .nav-link:hover {
      transform: scale(1.05);
      color: #ffcc00 !important;
    }

    .btn-custom {
      border-radius: 50px;
      padding: 8px 20px;
      font-size: 1rem;
      transition: transform 0.3s;
    }

    .btn-custom:hover {
      transform: scale(1.05);
    }

    .hero-section {
  background: url('img/main.jpg') no-repeat center center/cover;
  height: 100vh;
  min-height: 500px;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  text-align: center;
  color: white;
  background-attachment: fixed;
}


    .hero-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
    }

    .hero-content {
      position: relative;
      z-index: 2;
      padding: 0 20px;
    }

    .hero-content h1 {
      font-size: 3rem;
      font-weight: 700;
    }

    .hero-content p {
      font-size: 1.25rem;
      font-weight: 300;
    }

    .content-section {
      padding: 80px 15px;
      text-align: center;
    }

    .content-section h2 {
      color: #007bff;
      font-weight: 600;
      font-size: 2rem;
      margin-bottom: 20px;
    }

    .content-section p {
      font-size: 1.1rem;
      color: #333;
      line-height: 1.6;
      max-width: 800px;
      margin: 0 auto;
    }

    footer {
      background: #343a40;
      color: white;
      padding: 40px 20px;
      text-align: center;
    }

    footer p {
      font-size: 1rem;
      margin: 0;
    }

    @media (max-width: 768px) {
      .hero-content h1 {
        font-size: 2.2rem;
      }

      .hero-content p {
        font-size: 1rem;
      }

      .nav-link {
        font-size: 1rem;
      }
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Hope Bridge</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="child-gallery-sponsored.php">Child Gallery</a></li>
          <li class="nav-item"><a class="nav-link" href="program.php">Program</a></li>
          <li class="nav-item"><a class="nav-link" href="photo-gallery.php">Photo Gallery</a></li>
          <li class="nav-item"><a class="nav-link" href="feedback-form.php">Feedback</a></li>
          <li class="nav-item"><a class="nav-link" href="contact-us.php">Contact</a></li>
          <li class="nav-item">
            <a class="btn btn-warning btn-custom ms-lg-3 mt-2 mt-lg-0" href="donation.php">Donate</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <div class="hero-section">
    <div class="hero-overlay"></div>
    <div class="hero-content">
	
      <h1>Welcome to Hope Bridge</h1>
      <p>Your contribution can change lives</p>
      <a href="donation.php" class="btn btn-success btn-lg btn-custom mt-3">Make a Donation</a>
    </div>
  </div>

  <!-- Content Section -->
  <div class="container content-section">
    <h2>About Us</h2>
    <p>
      Hope Bridge is a non-profit organization dedicated to the care and development of underprivileged children.
      With your support, we can continue to provide shelter, education, and hope to children in need.
    </p>
  </div>

  <!-- Footer -->
  <footer>
    <p>&copy; 2025 Hope Bridge. All rights reserved.</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
