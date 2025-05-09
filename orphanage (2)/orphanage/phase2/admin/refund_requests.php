<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Refund Requests - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-primary mb-4">Refund Requests</h2>

    <div class="card shadow">
        <div class="card-header bg-light">
            <h5 class="mb-0">Pending Requests</h5>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Donor</th>
                        <th>Child</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($r = $requests->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($r['donor']) ?></td>
                            <td><?= htmlspecialchars($r['child']) ?></td>
                            <td><?= number_format($r['amount'], 2) ?></td>
                            <td><?= date('Y-m-d', strtotime($r['date'])) ?></td>
                            <td><span class="badge bg-warning text-dark"><?= $r['status'] ?></span></td>
                            <td class="text-center">
                                <a href="approve_refund.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-success me-1"><i class="bi bi-check-circle"></i> Approve</a>
                                <a href="reject_refund.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-danger"><i class="bi bi-x-circle"></i> Reject</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
