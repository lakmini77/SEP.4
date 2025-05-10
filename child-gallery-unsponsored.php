<?php include './components/header.php'; ?>
<?php include './components/top-menu.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Not Sponsored Children</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

 <style>
  body {
    background-color: #ffffff; /* White background */
    font-family: 'Segoe UI', sans-serif;
  }

  .gallery-title {
    font-weight: 600;
    color: #1e3a5f;
  }

  .card-container {
    perspective: 1000px;
  }

  .card-flip {
    transition: transform 0.8s;
    transform-style: preserve-3d;
    position: relative;
    height: 320px;
  }

  .card-container:hover .card-flip {
    transform: rotateY(180deg);
  }

  .card-front, .card-back {
    position: absolute;
    width: 100%;
    height: 100%;
    border-radius: 16px;
    backface-visibility: hidden;
    overflow: hidden;
    box-shadow: 0 8px 24px rgba(0,0,0,0.08);
  }

  .card-front {
    background-color: #ffffff;
    padding: 20px;
    text-align: center;
  }

  .card-back {
    background: rgba(255,255,255,0.9);
    backdrop-filter: blur(8px);
    transform: rotateY(180deg);
    padding: 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  .child-img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid #d0e2ff;
    margin-top: 10px;
  }

  .child-name {
    font-size: 1.2rem;
    font-weight: 600;
    margin-top: 10px;
  }

  .info-line {
    font-size: 0.9rem;
    color: #444;
    margin: 5px 0;
  }

  .action-btn {
    margin: 5px;
    font-size: 0.85rem;
  }

  .tab-custom .nav-link.active {
    background-color: #0d6efd;
    color: #fff;
    font-weight: 500;
  }

  .tab-custom .nav-link {
    color: #0d6efd;
  }
</style>

</head>
<body>



<div class="container py-5">
  <h2 class="text-center gallery-title mb-4">Children Awaiting Sponsorship</h2>

  <ul class="nav nav-tabs justify-content-center mb-4 tab-custom">
    <li class="nav-item">
      <a class="nav-link active" href="child-gallery-sponsored.php">Sponsored</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="child-gallery-unsponsored.php">Not Sponsored</a>
    </li>
  </ul>

  <div class="row g-4">
    <?php
    $sql = "SELECT cid, cname, cdob, cyoe, cclass FROM children WHERE sponsored=0";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $dob = $row["cdob"];
            $age = (date('Y') - date('Y',strtotime($dob)));
    ?>
    <div class="col-md-6 col-lg-4">
      <div class="card-container">
        <div class="card-flip">
          <!-- Front Side -->
          <div class="card-front d-flex flex-column align-items-center justify-content-center">
            <img src="img/defaultimg.png" alt="Child" class="child-img">
            <div class="child-name"><?php echo $row['cname']; ?></div>
            <div class="info-line"><i class="bi bi-cake"></i> Age: <?php echo $age; ?></div>
            <div class="info-line"><i class="bi bi-book"></i> Class: <?php echo $row['cclass']; ?></div>
            <div class="info-line"><i class="bi bi-calendar-event"></i> Enrolled: <?php echo $row['cyoe']; ?></div>
            <p class="text-muted mt-2">Hover for actions</p>
          </div>

          <!-- Back Side -->
          <div class="card-back text-center">
            <h6 class="text-primary">Take Action</h6>
            <a href="donation.php" class="btn btn-outline-secondary action-btn"><i class="bi bi-coin"></i> Donate</a>
            <a href="sponsor-children.php?cid=<?php echo $row['cid']; ?>" class="btn btn-outline-success action-btn"><i class="bi bi-heart"></i> Sponsor</a>
            <a href="send-gift.php?cid=<?php echo $row['cid']; ?>" class="btn btn-outline-warning action-btn"><i class="bi bi-gift"></i> Send Gift</a>
          </div>
        </div>
      </div>
    </div>
    <?php
        }
    } else {
        echo "<div class='alert alert-info text-center'>No children currently available for sponsorship.</div>";
    }
    ?>
  </div>
</div>

<?php include './components/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
