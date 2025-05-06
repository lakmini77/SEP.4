<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sponsorships Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<!-- Sidebar -->
<?php include 'sidebar.php'; ?>

<!-- Content -->
<div class="content p-4">
    <h2 class="mb-4">Sponsorships Management</h2>

    <!-- Sponsorship Stats -->
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary p-3">
                <div class="card-body">
                    <h5 class="card-title">Total Sponsorships</h5>
                    <p class="fs-4">250</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success p-3">
                <div class="card-body">
                    <h5 class="card-title">Active Sponsorships</h5>
                    <p class="fs-4">180</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning p-3">
                <div class="card-body">
                    <h5 class="card-title">Pending Approvals</h5>
                    <p class="fs-4">30</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Search & Filter -->
    <div class="row mt-4">
        <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Search sponsorships...">
        </div>
        <div class="col-md-6 text-end">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSponsorshipModal">
                <i class="fas fa-plus"></i> Add Sponsorship
            </button>
        </div>
    </div>

    <!-- Sponsorships Table -->
    <div class="card mt-4 p-3">
        <h5 class="card-title">Sponsorship Records</h5>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Donor Name</th>
                    <th>Child Sponsored</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>John Doe</td>
                    <td>Michael Smith</td>
                    <td>Jan 1, 2024</td>
                    <td>Dec 31, 2024</td>
                    <td>$100/month</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Add Sponsorship Modal -->
<div class="modal fade" id="addSponsorshipModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Sponsorship</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Donor Name</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Child Sponsored</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Amount</label>
                        <input type="number" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Save Sponsorship</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
