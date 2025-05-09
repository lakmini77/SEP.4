<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Make a Donation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0">Make a Donation</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="donate.php">
                        <div class="mb-3">
                            <label for="child_id" class="form-label">Select Child</label>
                            <select class="form-select" id="child_id" name="child_id" required>
                                <option value="">-- Choose a Child --</option>
                                <?php while($c = $children->fetch_assoc()): ?>
                                    <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['name']) ?> (<?= $c['age'] ?> yrs)</option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Donation Amount (LKR)</label>
                            <input type="number" class="form-control" id="amount" name="amount" step="0.01" required>
                        </div>
                        <button type="submit" class="btn btn-info w-100"><i class="bi bi-cash-coin"></i> Donate Now</button>
                    </form>
                </div>
                <div class="card-footer text-end">
                    <a href="donor_dashboard.php" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i> Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
