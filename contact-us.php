<?php include './components/header.php'; ?>




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
    <div class="ui container">

        <!-- Top Navigation Bar -->
        <?php include './components/top-menu.php'; ?>

        <!-- BODY Content -->
        <div class="ui grid">
            
            
          
            
        </div>

    </div>
    
<?php include './components/footer.php'; ?>