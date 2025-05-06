<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Communications</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<!-- Sidebar -->
<?php include 'sidebar.php'; ?>

<!-- Content -->
<div class="content p-4">
    <h2 class="mb-4">Communications</h2>

    <!-- Communication Stats -->
    <div class="row">
        <div class="col-md-6">
            <div class="card text-white bg-primary p-3">
                <div class="card-body">
                    <h5 class="card-title">Total Messages</h5>
                    <p class="fs-4">520</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-success p-3">
                <div class="card-body">
                    <h5 class="card-title">Unread Messages</h5>
                    <p class="fs-4">10</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Search & Filter -->
    <div class="row mt-4">
        <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Search messages...">
        </div>
        <div class="col-md-6 text-end">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sendMessageModal">
                <i class="fas fa-envelope"></i> Send Message
            </button>
        </div>
    </div>

    <!-- Communications Table -->
    <div class="card mt-4 p-3">
        <h5 class="card-title">Recent Messages</h5>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Sender</th>
                    <th>Receiver</th>
                    <th>Message</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Admin</td>
                    <td>John Doe</td>
                    <td>Your sponsorship is confirmed.</td>
                    <td>March 18, 2025</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Send Message Modal -->
<div class="modal fade" id="sendMessageModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Send Message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Receiver</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
