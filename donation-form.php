<?php include './components/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Donation Application</title>

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(to right, #f8f9fa, #f1f3f5);
      font-family: 'Segoe UI', sans-serif;
    }

    .donation-container {
      padding: 50px 0;
    }

    .donation-card {
      border-radius: 12px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }

    .donation-form-header {
      font-size: 2rem;
      font-weight: 600;
      color: #1d3557;
    }

    .form-label {
      font-weight: 600;
      color: #333;
    }

    .form-control {
      border-radius: 8px;
      box-shadow: none;
      border: 1px solid #ddd;
    }

    .form-control:focus {
      border-color: #1d3557;
    }

    .submit-btn {
      background-color: #1d3557;
      color: white;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }

    .submit-btn:hover {
      background-color: #1a2a3a;
    }

    .reset-btn {
      background-color: #e0e0e0;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }

    .reset-btn:hover {
      background-color: #c1c1c1;
    }

    .form-section {
      margin-bottom: 30px;
    }

    .form-section h5 {
      color: #1d3557;
      font-size: 1.2rem;
    }

    .form-section .form-control {
      background-color: #fafafa;
    }

    .form-check-label {
      font-weight: 500;
    }

    .card-body {
      padding: 3rem;
    }

    .donation-header {
      margin-bottom: 30px;
    }

    .card-body .btn {
      width: 48%;
    }

    @media (max-width: 768px) {
      .donation-card {
        margin-top: 30px;
      }

      .donation-header h1 {
        font-size: 1.5rem;
      }

      .donation-header p {
        font-size: 0.9rem;
      }

      .card-body {
        padding: 1.5rem;
      }
    }
  </style>
</head>

<body>

<?php include './components/top-menu.php'; ?>

<div class="container donation-container">

  <div class="donation-header text-center mb-5">
    <h1 class="donation-form-header">Donation Application</h1>
    <p class="text-muted">Support a cause and make a difference today! Fill out the form below to contribute.</p>
  </div>

  <!-- Donation Form -->
  <div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">
      <div class="card donation-card">
        <div class="card-body">
          <?php
          if(isset($_POST['submit_donation'])) {
            $program = $_POST['program'];
            $amount = $_POST['amount'];
            $checkno = $_POST['check'];
            $bank_name = $_POST['bank_name'];
            $place = $_POST['place'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];

            $sql = "INSERT INTO donation (program, amount, checkno, bank_name, place, d_name, email, phone, d_address) 
                    VALUES ('$program', '$amount', '$checkno', '$bank_name', '$place', '$name', '$email', '$phone', '$address')";

            if ($conn->query($sql) === TRUE) {
                echo "<script> alert('Donation form submitted successfully!'); </script>";
            } else {
                echo "<script> alert('Error submitting the form. Please try again.'); </script>";
            }

            $conn->close();
          }
          ?>

          <form action="<?php $_PHP_SELF ?>" method="post">

            <!-- Program Selection -->
            <div class="form-section">
              <h5>Select the Program to Sponsor</h5>
              <div class="form-check">
                <input type="radio" class="form-check-input" id="aakar" name="program" value="Aakar" required>
                <label class="form-check-label" for="aakar">Program 1</label>
              </div>
              <div class="form-check">
                <input type="radio" class="form-check-input" id="ahar" name="program" value="Ahar" required>
                <label class="form-check-label" for="ahar">Program 2</label>
              </div>
            </div>

            <!-- Donation Amount -->
            <div class="form-section">
              <label for="amount" class="form-label">Amount</label>
              <input type="number" class="form-control" name="amount" placeholder="Amount" min="1" required>
            </div>

            <!-- Check and DD Details -->
            <div class="form-section">
              <h5>Check and Demand Draft</h5>
              <label for="check" class="form-label">Check/DD No.</label>
              <input type="text" class="form-control" name="check" placeholder="Check / DD No." required>

              <label for="bank_name" class="form-label mt-3">Bank Name</label>
              <input type="text" class="form-control" name="bank_name" placeholder="Bank Name" required>

              <label for="place" class="form-label mt-3">Place</label>
              <input type="text" class="form-control" name="place" placeholder="Place" required>
            </div>

            <!-- Personal Information -->
            <div class="form-section">
              <h5>Your Personal Information</h5>
              <label for="name" class="form-label">Full Name</label>
              <input type="text" class="form-control" name="name" placeholder="Full Name" required>

              <label for="email" class="form-label mt-3">Email Address</label>
              <input type="email" class="form-control" name="email" placeholder="Email Address" required>

              <label for="phone" class="form-label mt-3">Phone Number</label>
              <input type="tel" class="form-control" name="phone" placeholder="Phone Number" required>

              <label for="address" class="form-label mt-3">Address</label>
              <input type="text" class="form-control" name="address" placeholder="Address" required>
            </div>

            <!-- Form Buttons -->
            <div class="d-flex justify-content-between mt-4">
              <button type="submit" name="submit_donation" class="btn submit-btn">Submit Donation</button>
              <button type="reset" class="btn reset-btn">Reset</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

</div>

<?php include './components/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
