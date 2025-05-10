<?php include './components/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sponsored Children - Hope Bridge</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style>
        body {
            background: #f8fbff;
            font-family: 'Segoe UI', sans-serif;
        }

        .section-heading {
            font-size: 2rem;
            font-weight: 600;
            color: #0d6efd;
            margin-bottom: 1rem;
        }

        .org-section {
            background: linear-gradient(to right, #f2f8ff, #e9f2fb);
            padding: 60px 0;
        }

        .org-icon {
            font-size: 3rem;
            color: #dc3545;
        }

        .org-details p {
            font-size: 1rem;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .gallery-section {
            padding: 60px 0;
        }

        .child-card {
            transition: all 0.3s ease;
            border: none;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .child-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.12);
        }

        .child-img {
            height: 250px;
            object-fit: cover;
            width: 100%;
        }

        .child-name {
            font-weight: 600;
            font-size: 1.2rem;
            margin-top: 10px;
        }

        .footer-links a {
            text-decoration: none;
            color: #6c757d;
        }

        .footer-links a:hover {
            color: #0d6efd;
        }
    </style>
</head>
<body>
    <?php include './components/top-menu.php'; ?>

    <!-- Organization Introduction -->
    <section class="org-section text-dark">
        <div class="container">
            <div class="row align-items-center gy-4">
                <div class="col-lg-2 text-center">
                    <i class="bi bi-heart-fill org-icon"></i>
                </div>
                <div class="col-lg-10 org-details">
                    <h2 class="section-heading">Hope Bridge Organization</h2>
                    <p>Hope Bridge is a non-profit organization committed to transforming lives through compassion, education, and opportunity. Our mission is to connect kind-hearted sponsors with deserving children, empowering the next generation with hope and dignity.</p>
                    <p><i class="bi bi-geo-alt-fill text-primary"></i> <strong>Address:</strong> No. 45, Sunshine Road,Kurunegala , Sri Lanka</p>
                    <p><i class="bi bi-envelope-fill text-primary"></i> <strong>Email:</strong> <a href="mailto:contact@hopebridge.org">contact@hopebridge.org</a></p>
                    <p><i class="bi bi-telephone-fill text-primary"></i> <strong>Phone:</strong> +94 112 345 678</p>
                    <p><i class="bi bi-globe text-primary"></i> <strong>Website:</strong> <a href="#">www.hopebridgenwpedu.lk</a></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-heading">Meet Our Sponsored Children</h2>
                <p class="text-muted">Each child is a story of hope. Get to know them and join hands in their journey.</p>
            </div>

            <div class="row g-4 justify-content-center">
                <!-- Sample Child Card with Default Image -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card child-card">
                        <img src="img/defaultimg.png" alt="Ayesha" class="child-img">
                        <div class="card-body text-center">
                            <div class="child-name">Ayesha</div>
                            <p class="text-muted mb-1">Age: 9 | Kandy</p>
                            <span class="badge bg-success">Sponsored</span>
                        </div>
                    </div>
                </div>

                <!-- Add More Child Cards -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card child-card">
                        <img src="img/defaultimg.png" alt="Raj" class="child-img">
                        <div class="card-body text-center">
                            <div class="child-name">Raj</div>
                            <p class="text-muted mb-1">Age: 12 | Colombo</p>
                            <span class="badge bg-success">Sponsored</span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card child-card">
                        <img src="img/defaultimg.png" alt="Anjali" class="child-img">
                        <div class="card-body text-center">
                            <div class="child-name">Anjali</div>
                            <p class="text-muted mb-1">Age: 8 | Galle</p>
                            <span class="badge bg-success">Sponsored</span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card child-card">
                        <img src="img/defaultimg.png" alt="Nimal" class="child-img">
                        <div class="card-body text-center">
                            <div class="child-name">Nimal</div>
                            <p class="text-muted mb-1">Age: 10 | Kandy</p>
                            <span class="badge bg-success">Sponsored</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include './components/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
