<?php
// Start session if needed
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Child Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background: #343a40;
            color: white;
            height: 100vh;
            position: fixed;
            padding-top: 20px;
        }
        .sidebar .menu-item {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
        }
        .sidebar .menu-item:hover, .menu-item.active {
            background: #495057;
        }
        .sidebar .menu-item i {
            margin-right: 10px;
        }
        .content {
            margin-left: 250px;
            flex: 1;
            padding: 20px;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<aside class="sidebar">
    <nav class="sidebar-menu">
        <a href="dashboard.php" class="menu-item">
            <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
        </a>
        <a href="donor-management.php" class="menu-item">
            <i class="fas fa-hand-holding-usd"></i> <span>Donor Management</span>
        </a>
        <a href="child-management.php" class="menu-item active">
            <i class="fas fa-child"></i> <span>Child Management</span>
        </a>
        <a href="donations.php" class="menu-item">
            <i class="fas fa-gift"></i> <span>Donations</span>
        </a>
        <a href="sponsorships.php" class="menu-item">
            <i class="fas fa-users"></i> <span>Sponsorships</span>
        </a>
        <a href="communications.php" class="menu-item">
            <i class="fas fa-envelope"></i> <span>Communications</span>
        </a>
        <a href="reports.php" class="menu-item">
            <i class="fas fa-chart-bar"></i> <span>Reports</span>
        </a>
        <a href="settings.php" class="menu-item">
            <i class="fas fa-cog"></i> <span>Settings</span>
        </a>
    </nav>
</aside>

<!-- Main Content -->
<div class="content">
    <h2 class="mb-4">Child Management</h2>

    <!-- Child Stats -->
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary p-3">
                <div class="card-body">
                    <h5 class="card-title">Total Children</h5>
                    <p class="card-text fs-4">1,200</p>
                    <i class="fas fa-users fa-2x"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success p-3">
                <div class="card-body">
                    <h5 class="card-title">Sponsored Children</h5>
                    <p class="card-text fs-4">850</p>
                    <i class="fas fa-hand-holding-heart fa-2x"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning p-3">
                <div class="card-body">
                    <h5 class="card-title">Unsponsored Children</h5>
                    <p class="card-text fs-4">350</p>
                    <i class="fas fa-exclamation-triangle fa-2x"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Search & Filter -->
    <div class="row mt-4">
        <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Search child...">
        </div>
        <div class="col-md-6 text-end">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addChildModal">
                <i class="fas fa-plus"></i> Add Child
            </button>
        </div>
    </div>

    <!-- Child Table -->
    <div class="card mt-4 p-3">
        <h5 class="card-title">Children List</h5>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Status</th>
                    <th>Sponsor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Michael Johnson</td>
                    <td>10</td>
                    <td>Male</td>
                    <td><span class="badge bg-success">Sponsored</span></td>
                    <td>John Doe</td>
                </tr>
                <tr>
                    <td>Emily Parker</td>
                    <td>8</td>
                    <td>Female</td>
                    <td><span class="badge bg-warning">Unsponsored</span></td>
                    <td>—</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Add Child Modal -->
<div class="modal fade" id="addChildModal" tabindex="-1" aria-labelledby="addChildModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addChildModalLabel">Add New Child</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="childName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="childName">
                    </div>
                    <div class="mb-3">
                        <label for="childAge" class="form-label">Age</label>
                        <input type="number" class="form-control" id="childAge">
                    </div>
                    <div class="mb-3">
                        <label for="childGender" class="form-label">Gender</label>
                        <select class="form-control" id="childGender">
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Save Child</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
