<?php
include '../config.php';
include 'includes/admin_header.php';

$donations = $conn->query("SELECT d.*, donors.name AS donor, children.name AS child 
                           FROM donations d 
                           JOIN donors ON d.donor_id = donors.id 
                           JOIN children ON d.child_id = children.id");
?>

<h2 class="mb-4">All Donations</h2>
<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Donor</th><th>Child</th><th>Amount</th><th>Status</th><th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php while($r = $donations->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($r['donor']) ?></td>
            <td><?= htmlspecialchars($r['child']) ?></td>
            <td><?= number_format($r['amount'], 2) ?></td>
            <td><span class="badge <?= $r['status'] == 'Refunded' ? 'bg-danger' : ($r['status'] == 'Refund Requested' ? 'bg-warning text-dark' : 'bg-success') ?>">
                <?= $r['status'] ?></span></td>
            <td><?= date('Y-m-d', strtotime($r['date'])) ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php include 'includes/admin_footer.php'; ?>
