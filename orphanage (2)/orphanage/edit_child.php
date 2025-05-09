<?php
include 'config.php';

$id = $_GET['id'];
$child = $conn->query("SELECT * FROM children WHERE id=$id")->fetch_assoc();
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $health_status = trim($_POST['health_status']);
    $admission_date = $_POST['admission_date'];
    $guardian_name = trim($_POST['guardian_name']);
    $guardian_contact = trim($_POST['guardian_contact']);
    $adoption_status = $_POST['adoption_status'];

    $current_date = date("Y-m-d");

    // Validation Rules
    if (empty($name)) $errors['name'] = "Child Name is required.";
    if (empty($age) || $age <= 0) $errors['age'] = "Age must be greater than 0.";
    if (empty($gender)) $errors['gender'] = "Gender is required.";
    if (empty($health_status)) $errors['health_status'] = "Health Status is required.";
    if (empty($admission_date)) $errors['admission_date'] = "Admission Date is required.";
    if ($admission_date > $current_date) $errors['admission_date'] = "Admission Date cannot be in the future.";
    if (empty($guardian_name)) $errors['guardian_name'] = "Guardian Name is required.";
    if (empty($guardian_contact)) $errors['guardian_contact'] = "Guardian Contact is required.";
    if (empty($adoption_status)) $errors['adoption_status'] = "Adoption Status is required.";

    if (empty($errors)) {
        $sql = "UPDATE children SET name='$name', age='$age', gender='$gender', 
                health_status='$health_status', admission_date='$admission_date', 
                guardian_name='$guardian_name', guardian_contact='$guardian_contact', 
                adoption_status='$adoption_status' WHERE id=$id";
        $conn->query($sql);
        header("Location: index.php?update_success=1");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Child</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function validateForm() {
            let isValid = true;
            let inputs = document.querySelectorAll("input, select, textarea");
            inputs.forEach(input => {
                if (input.value.trim() === "") {
                    input.classList.add("is-invalid");
                    isValid = false;
                } else {
                    input.classList.remove("is-invalid");
                }
            });
            return isValid;
        }
    </script>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center text-primary mb-4">Edit Child Profile</h2>

    <div class="card shadow p-4">
        <form method="post" onsubmit="return validateForm()">
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Child Name</label>
                    <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($child['name']) ?>">
                    <div class="invalid-feedback">Child Name is required.</div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Age</label>
                    <input type="number" class="form-control" name="age" value="<?= $child['age'] ?>">
                    <div class="invalid-feedback">Age must be greater than 0.</div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Gender</label>
                    <select class="form-control" name="gender">
                        <option value="Male" <?= $child['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
                        <option value="Female" <?= $child['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
                        <option value="Other" <?= $child['gender'] == 'Other' ? 'selected' : '' ?>>Other</option>
                    </select>
                    <div class="invalid-feedback">Gender is required.</div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Admission Date</label>
                    <input type="date" class="form-control" name="admission_date" value="<?= $child['admission_date'] ?>">
                    <div class="invalid-feedback">Admission Date is required and cannot be in the future.</div>
                </div>
            </div>

            <div class="mt-3">
                <label class="form-label fw-bold">Health Status</label>
                <textarea class="form-control" name="health_status"><?= htmlspecialchars($child['health_status']) ?></textarea>
                <div class="invalid-feedback">Health Status is required.</div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Guardian Name</label>
                    <input type="text" class="form-control" name="guardian_name" value="<?= htmlspecialchars($child['guardian_name']) ?>">
                    <div class="invalid-feedback">Guardian Name is required.</div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Guardian Contact</label>
                    <input type="text" class="form-control" name="guardian_contact" value="<?= htmlspecialchars($child['guardian_contact']) ?>">
                    <div class="invalid-feedback">Guardian Contact is required.</div>
                </div>
            </div>

            <div class="mt-3">
                <label class="form-label fw-bold">Adoption Status</label>
                <select class="form-control" name="adoption_status">
                    <option value="Not Adopted" <?= $child['adoption_status'] == 'Not Adopted' ? 'selected' : '' ?>>Not Adopted</option>
                    <option value="Adopted" <?= $child['adoption_status'] == 'Adopted' ? 'selected' : '' ?>>Adopted</option>
                </select>
                <div class="invalid-feedback">Adoption Status is required.</div>
            </div>

            <div class="mt-4 text-center">
                <button type="submit" class="btn btn-primary btn-lg">Save Changes</button>
                <a href="index.php" class="btn btn-secondary btn-lg">Cancel</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
