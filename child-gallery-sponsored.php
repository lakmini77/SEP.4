<?php include './components/header.php'; ?>
<?php include './components/top-menu.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sponsored Children - Creative Gallery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style>
        body {
            background: linear-gradient(to right, #e0ecf8, #f9fcff);
            font-family: 'Segoe UI', sans-serif;
        }

        .gallery-title {
            font-weight: 600;
            color: #17375e;
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
            background-color: #fff;
            padding: 20px;
            text-align: center;
        }

        .card-back {
            background: rgba(255,255,255,0.85);
            backdrop-filter: blur(8px);
            transform: rotateY(180deg);
            padding: 20px;
        }

        .child-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #e2eafc;
            margin-top: 10px;
        }

        .child-name {
            font-size: 1.2rem;
            font-weight: 600;
            margin-top: 10px;
        }

        .info-line {
            font-size: 0.9rem;
            color: #333;
            margin: 5px 0;
        }

        .badge {
            font-size: 0.75rem;
        }

        .sponsor-title {
            font-weight: 600;
            color: #0d6efd;
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
    <h2 class="text-center gallery-title mb-4">🌟 Sponsored Children Gallery</h2>

    <ul class="nav nav-tabs justify-content-center mb-4 tab-custom">
        <li class="nav-item">
            <a class="nav-link active" href="child-gallery-sponsored.php">Sponsored</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="child-gallery-unsponsored.php">Not Sponsored</a>
        </li>
    </ul>

    <div class="row g-4">
        <?php
        $sql = "SELECT cid, cname, cdob, cyoe, cclass FROM children WHERE sponsored=1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $dob = $row["cdob"];
                $age = (date('Y') - date('Y', strtotime($dob)));
                $cid = $row['cid'];
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
                        <div class="info-line"><i class="bi bi-calendar"></i> Enrolled: <?php echo $row['cyoe']; ?></div>
                        <p class="text-muted mt-2">Hover to view sponsor info</p>
                    </div>

                    <!-- Back Side -->
                    <div class="card-back d-flex flex-column justify-content-center">
                        <?php
                        $sql1 = "SELECT spn_firstname, spn_lastname, spn_email FROM sponsorer WHERE cid='$cid'";
                        $result1 = $conn->query($sql1);

                        if ($result1->num_rows > 0) {
                            while($sponsor = $result1->fetch_assoc()) {
                        ?>
                        <h6 class="sponsor-title text-center">Sponsor Info</h6>
                        <div class="info-line text-center"><i class="bi bi-person-fill"></i> <?php echo $sponsor['spn_firstname'] . " " . $sponsor['spn_lastname']; ?></div>
                        <div class="info-line text-center"><i class="bi bi-envelope"></i> <?php echo $sponsor['spn_email']; ?></div>
                        <?php
                            }
                        } else {
                            echo '<p class="text-center text-muted">No sponsor info available.</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
            }
        } else {
            echo "<div class='alert alert-info text-center'>No sponsored children found.</div>";
        }
        ?>
    </div>
</div>

<?php include './components/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
