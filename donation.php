<?php include './components/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Donations</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(to right, #eef2f7, #fdfdfd);
      font-family: 'Segoe UI', sans-serif;
    }

    .donation-title {
      font-weight: 700;
      color: #1d3557;
    }

    .donation-subtext {
      color: #6c757d;
    }

    .donation-card {
      border: none;
      border-radius: 16px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
      transition: transform 0.3s ease;
    }

    .donation-card:hover {
      transform: translateY(-5px);
    }

    .donation-icon {
      font-size: 2.5rem;
      color: #0d6efd;
    }

    .donate-btn {
      border-radius: 30px;
      padding: 8px 24px;
    }
  </style>
</head>
<body>

<?php include './components/top-menu.php'; ?>

<div class="container py-5">
  <div class="text-center mb-5">
    <h1 class="donation-title">Donations</h1>
    <p class="donation-subtext fs-5">Your support can change lives! Join us in making a difference.</p>
  </div>

  <div class="row g-4 justify-content-center">
    <!-- General Donation -->
    <div class="col-md-6 col-lg-4">
      <div class="card donation-card text-center p-4">
        <div class="donation-icon mb-3">
          <i class="bi bi-coin"></i>
        </div>
        <h5 class="fw-bold">Make a General Donation</h5>
        <p class="text-muted">Contribute to where it's needed most. Every rupee helps build a brighter future.</p>
        <a href="donation-form.php" class="btn btn-primary donate-btn">Donate Now</a>
      </div>
    </div>

    <!-- Sponsor a Child -->
    <div class="col-md-6 col-lg-4">
      <div class="card donation-card text-center p-4">
        <div class="donation-icon mb-3 text-success">
          <i class="bi bi-heart-fill"></i>
        </div>
        <h5 class="fw-bold">Sponsor a Child</h5>
        <p class="text-muted">Provide education, healthcare & support by sponsoring a child directly.</p>
        <a href="child-gallery-unsponsored.php" class="btn btn-success donate-btn">Sponsor Now</a>
      </div>
    </div>

    <!-- Send a Gift -->
    <div class="col-md-6 col-lg-4">
      <div class="card donation-card text-center p-4">
        <div class="donation-icon mb-3 text-warning">
          <i class="bi bi-gift"></i>
        </div>
        <h5 class="fw-bold">Send a Gift</h5>
        <p class="text-muted">Bring joy to a child’s life with a birthday or festive gift.</p>
        <a href="send-gift.php" class="btn btn-warning text-white donate-btn">Send Gift</a>
      </div>
    </div>
  </div>
</div>

<?php include './components/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
