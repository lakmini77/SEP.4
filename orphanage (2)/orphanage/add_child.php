<?php
include 'config.php';

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
        $sql = "INSERT INTO children (name, age, gender, health_status, admission_date, guardian_name, guardian_contact, adoption_status) 
                VALUES ('$name', '$age', '$gender', '$health_status', '$admission_date', '$guardian_name', '$guardian_contact', '$adoption_status')";
        $conn->query($sql);
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Child</title>
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
    <h2 class="mb-4 text-primary text-center">Add Child Profile</h2>
    <div class="card shadow p-4">
        <form method="post" onsubmit="return validateForm()">
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Child Name</label>
                    <input type="text" class="form-control" name="name" value="<?= $_POST['name'] ?? '' ?>">
                    <div class="invalid-feedback">Child Name is required.</div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Age</label>
                    <input type="number" class="form-control" name="age" value="<?= $_POST['age'] ?? '' ?>">
                    <div class="invalid-feedback">Age must be greater than 0.</div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Gender</label>
                    <select class="form-control" name="gender">
                        <option value="">Select Gender</option>
                        <option value="Male" <?= ($_POST['gender'] ?? '') == 'Male' ? 'selected' : '' ?>>Male</option>
                        <option value="Female" <?= ($_POST['gender'] ?? '') == 'Female' ? 'selected' : '' ?>>Female</option>
                        <option value="Other" <?= ($_POST['gender'] ?? '') == 'Other' ? 'selected' : '' ?>>Other</option>
                    </select>
                    <div class="invalid-feedback">Gender is required.</div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Admission Date</label>
                    <input type="date" class="form-control" name="admission_date" value="<?= $_POST['admission_date'] ?? '' ?>">
                    <div class="invalid-feedback">Admission Date is required and cannot be in the future.</div>
                </div>
            </div>

            <div class="mt-3">
                <label class="form-label fw-bold">Health Status</label>
                <textarea class="form-control" name="health_status"><?= $_POST['health_status'] ?? '' ?></textarea>
                <div class="invalid-feedback">Health Status is required.</div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Guardian Name</label>
                    <input type="text" class="form-control" name="guardian_name" value="<?= $_POST['guardian_name'] ?? '' ?>">
                    <div class="invalid-feedback">Guardian Name is required.</div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Guardian Contact</label>
                    <input type="text" class="form-control" name="guardian_contact" value="<?= $_POST['guardian_contact'] ?? '' ?>">
                    <div class="invalid-feedback">Guardian Contact is required.</div>
                </div>
            </div>

            <div class="mt-3">
                <label class="form-label fw-bold">Adoption Status</label>
                <select class="form-control" name="adoption_status">
                    <option value="">Select Adoption Status</option>
                    <option value="Not Adopted" <?= ($_POST['adoption_status'] ?? '') == 'Not Adopted' ? 'selected' : '' ?>>Not Adopted</option>
                    <option value="Adopted" <?= ($_POST['adoption_status'] ?? '') == 'Adopted' ? 'selected' : '' ?>>Adopted</option>
                </select>
                <div class="invalid-feedback">Adoption Status is required.</div>
            </div>

            <div class="mt-4 text-center">
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                <a href="index.php" class="btn btn-secondary btn-lg">Cancel</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
