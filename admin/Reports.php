<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<!-- Sidebar -->
<?php include 'sidebar.php'; ?>

<!-- Content -->
<div class="content p-4">
    <h2 class="mb-4">Reports</h2>

    <!-- Report Summary Cards -->
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary p-3">
                <div class="card-body">
                    <h5 class="card-title">Total Donations</h5>
                    <p class="fs-4">$50,000</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success p-3">
                <div class="card-body">
                    <h5 class="card-title">Active Sponsorships</h5>
                    <p class="fs-4">250</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning p-3">
                <div class="card-body">
                    <h5 class="card-title">New Donors (This Month)</h5>
                    <p class="fs-4">35</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Reports Chart -->
    <div class="card mt-4 p-3">
        <h5 class="card-title">Donation Trends</h5>
        <canvas id="donationChart"></canvas>
    </div>
</div>

<script>
    var ctx = document.getElementById('donationChart').getContext('2d');
    var donationChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Donations ($)',
                data: [5000, 7000, 8000, 6500, 9000, 11000],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2
            }]
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
