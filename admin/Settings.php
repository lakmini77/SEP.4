<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<!-- Sidebar -->
<?php include 'sidebar.php'; ?>

<!-- Content -->
<div class="content p-4">
    <h2 class="mb-4">Settings</h2>

    <div class="card p-3">
        <h5 class="card-title">Account Settings</h5>
        <form>
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control" value="John Doe">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" value="john@example.com">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Save Changes</button>
        </form>
    </div>

    <div class="card mt-4 p-3">
        <h5 class="card-title">Notification Preferences</h5>
        <form>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" checked>
                <label class="form-check-label">Email Notifications</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox">
                <label class="form-check-label">SMS Notifications</label>
            </div>
            <button type="submit" class="btn btn-success mt-3">Update Preferences</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
