<?php
include 'config.php';
include 'includes/donor_auth.php';
$donor_id = $_SESSION['donor_id'];

$donor = $conn->query("SELECT * FROM donors WHERE id = $donor_id")->fetch_assoc();
$donations = $conn->query("SELECT d.*, c.name AS child_name FROM donations d JOIN children c ON d.child_id = c.id WHERE donor_id = $donor_id");
?>

<h2>Welcome, <?= $donor['name'] ?></h2>
<a href="donate.php">Donate to a Child</a> | <a href="logout.php">Logout</a>

<h3>Your Donations</h3>
<table>
    <tr><th>Child</th><th>Amount</th><th>Status</th><th>Action</th></tr>
    <?php while($row = $donations->fetch_assoc()): ?>
    <tr>
        <td><?= $row['child_name'] ?></td>
        <td><?= $row['amount'] ?></td>
        <td><?= $row['status'] ?></td>
        <td>
            <?php if ($row['status'] == 'Successful'): ?>
                <a href="request_refund.php?id=<?= $row['id'] ?>">Request Refund</a>
            <?php endif; ?>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
