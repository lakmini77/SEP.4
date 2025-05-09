<?php
include '../config.php';
include 'includes/admin_header.php';

$totalChildren = $conn->query("SELECT COUNT(*) as total FROM children")->fetch_assoc()['total'];
$totalDonations = $conn->query("SELECT IFNULL(SUM(amount), 0) as total FROM donations")->fetch_assoc()['total'];
$pendingRefunds = $conn->query("SELECT COUNT(*) as total FROM donations WHERE status='Refund Requested'")->fetch_assoc()['total'];
$adoptedChildren = $conn->query("SELECT COUNT(*) as total FROM children WHERE adoption_status='Adopted'")->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Admin Panel</a>
        <div>
            <a href="../logout.php" class="btn btn-outline-light btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <h2 class="text-primary mb-4">Admin Ddddashboard</h2>

    <div class="row g-4">
        <div class="col-md-3">
            <div class="card border-primary shadow-sm">
                <div class="card-body">
                    <h6 class="card-title text-muted">Total Children</h6>
                    <h3 class="text-primary fw-bold"><?= $totalChildren ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-success shadow-sm">
                <div class="card-body">
                    <h6 class="card-title text-muted">Total Donations</h6>
                    <h3 class="text-success fw-bold">LKR <?= number_format($totalDonations, 2) ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-warning shadow-sm">
                <div class="card-body">
                    <h6 class="card-title text-muted">Pending Refunds</h6>
                    <h3 class="text-warning fw-bold"><?= $pendingRefunds ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-info shadow-sm">
                <div class="card-body">
                    <h6 class="card-title text-muted">Adopted Children</h6>
                    <h3 class="text-info fw-bold"><?= $adoptedChildren ?></h3>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-5">

    <h5 class="mb-3">Quick Navigation</h5>
    <div class="row g-3">
        <div class="col-md-4">
            <a href="children.php" class="btn btn-outline-primary w-100"><i class="bi bi-people"></i> Manage Children</a>
        </div>
        <div class="col-md-4">
            <a href="donations.php" class="btn btn-outline-success w-100"><i class="bi bi-cash-coin"></i> View Donations</a>
        </div>
        <div class="col-md-4">
            <a href="refund_requests.php" class="btn btn-outline-warning w-100"><i class="bi bi-arrow-repeat"></i> Refund Requests</a>
        </div>
    </div>
</div>

<?php include 'includes/admin_footer.php'; ?>
</body>
</html>
