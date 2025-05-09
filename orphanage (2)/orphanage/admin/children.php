<?php
include 'config.php';
$result = $conn->query("SELECT * FROM children");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Child Profile Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script>
        function showDeleteModal(id, name) {
            document.getElementById("deleteChildName").innerText = name;
            document.getElementById("deleteConfirmBtn").href = "delete_child.php?id=" + id;
            var deleteModal = new bootstrap.Modal(document.getElementById("deleteModal"));
            deleteModal.show();
        }

        function searchTable() {
            let input = document.getElementById("searchInput").value.toLowerCase();
            let rows = document.querySelectorAll("tbody tr");

            rows.forEach(row => {
                let text = row.innerText.toLowerCase();
                row.style.display = text.includes(input) ? "" : "none";
            });
        }
    </script>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center text-primary mb-4">Child Profile Management</h2>

    <?php if (isset($_GET['delete_success'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Child profile deleted successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if (isset($_GET['update_success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Child profile updated successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="d-flex justify-content-between mb-3">
        <a href="add_child.php" class="btn btn-success btn-lg"><i class="bi bi-plus-circle"></i> Add New Child</a>
        <input type="text" id="searchInput" class="form-control w-25" placeholder="Search..." onkeyup="searchTable()">
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover border shadow">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Guardian</th>
                    <th>Adoption Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody id="childTable">
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= $row['age'] ?></td>
                    <td><?= $row['gender'] ?></td>
                    <td><?= htmlspecialchars($row['guardian_name']) ?></td>
                    <td>
                        <span class="badge <?= $row['adoption_status'] == 'Adopted' ? 'bg-success' : 'bg-warning' ?>">
                            <?= $row['adoption_status'] ?>
                        </span>
                    </td>
                    <td class="text-center">
                        <a href="edit_child.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-square"></i> 
                        </a>
                        <button class="btn btn-danger btn-sm" onclick="showDeleteModal(<?= $row['id'] ?>, '<?= htmlspecialchars($row['name']) ?>')">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete <strong id="deleteChildName"></strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="#" id="deleteConfirmBtn" class="btn btn-danger">Yes, Delete</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap & JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
