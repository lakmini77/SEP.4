<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="dashboard.php">Save Kids</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="children.php">Children</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="donations.php">Donations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="refund_requests.php">Refund Requests</a>
                </li>
            </ul>
            <div class="d-flex">
                <a href="../logout.php" class="btn btn-outline-light btn-sm">Logout</a>
            </div>
        </div>
    </div>
</nav>
<div class="container mt-4">
