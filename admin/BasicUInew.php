<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "orphan_care_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch donors
function fetchDonors($search = '') {
    global $conn;
    $sql = "SELECT * FROM donors";
    if ($search) {
        $sql .= " WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%' OR email LIKE '%$search%'";
    }
    $result = $conn->query($sql);
    $donors = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $donors[] = $row;
        }
    }
    return $donors;
}

// Save donor
function saveDonor($data) {
    global $conn;
    $id = $data['donor_id'];
    $first_name = $data['first_name'];
    $last_name = $data['last_name'];
    $email = $data['email'];
    $phone = $data['phone'];
    $donor_type = $data['donor_type'];
    $address = $data['address'];
    $city = $data['city'];
    $state = $data['state'];
    $zip = $data['zip'];
    $country = $data['country'];
    $notes = $data['notes'];

    if ($id) {
        $sql = "UPDATE donors SET first_name='$first_name', last_name='$last_name', email='$email', phone='$phone', donor_type='$donor_type', address='$address', city='$city', state='$state', zip='$zip', country='$country', notes='$notes' WHERE id=$id";
    } else {
        $sql = "INSERT INTO donors (first_name, last_name, email, phone, donor_type, address, city, state, zip, country, notes) VALUES ('$first_name', '$last_name', '$email', '$phone', '$donor_type', '$address', '$city', '$state', '$zip', '$country', '$notes')";
    }

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Delete donor
function deleteDonor($id) {
    global $conn;
    $sql = "DELETE FROM donors WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['save_donor'])) {
        $data = $_POST;
        if (saveDonor($data)) {
            echo "Donor saved successfully.";
        } else {
            echo "Error saving donor.";
        }
    } elseif (isset($_POST['delete_donor'])) {
        $id = $_POST['donor_id'];
        if (deleteDonor($id)) {
            echo "Donor deleted successfully.";
        } else {
            echo "Error deleting donor.";
        }
    }
}

// Fetch donors for display
$donors = fetchDonors(isset($_GET['search']) ? $_GET['search'] : '');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Management - Orphan Care System</title>
    <style>
        /* Your existing CSS styles */
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="logo">
                <i class="fas fa-hand-holding-heart"></i>
                <h1>Orphan Care System</h1>
            </div>
            <div class="user-nav">
                <div class="user-info">
                    <div class="user-avatar">A</div>
                    <span>Admin</span>
                </div>
                <button id="menu-toggle" class="btn-icon">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </header>

    <aside class="sidebar">
        <nav class="sidebar-menu">
            <?php
            $current_page = basename($_SERVER['PHP_SELF']);
            ?>
            <a href="dashboard.php" class="menu-item <?= $current_page == 'dashboard.php' ? 'active' : '' ?>">
                <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
            </a>
            <a href="donor-management.php" class="menu-item <?= $current_page == 'donor-management.php' ? 'active' : '' ?>">
                <i class="fas fa-hand-holding-usd"></i> <span>Donor Management</span>
            </a>
            <a href="ChildManagement.php" class="menu-item <?= $current_page == 'child-management.php' ? 'active' : '' ?>">
                <i class="fas fa-child"></i> <span>Child Management</span>
            </a>
            <a href="Donations.php" class="menu-item <?= $current_page == 'donations.php' ? 'active' : '' ?>">
                <i class="fas fa-gift"></i> <span>Donations</span>
            </a>
            <a href="Sponserships.php" class="menu-item <?= $current_page == 'sponsorships.php' ? 'active' : '' ?>">
                <i class="fas fa-users"></i> <span>Sponsorships</span>
            </a>
            <a href="Communications.php" class="menu-item <?= $current_page == 'communications.php' ? 'active' : '' ?>">
                <i class="fas fa-envelope"></i> <span>Communications</span>
            </a>
            <a href="Reports.php" class="menu-item <?= $current_page == 'reports.php' ? 'active' : '' ?>">
                <i class="fas fa-chart-bar"></i> <span>Reports</span>
            </a>
            <a href="Settings.php" class="menu-item <?= $current_page == 'settings.php' ? 'active' : '' ?>">
                <i class="fas fa-cog"></i> <span>Settings</span>
            </a>
        </nav>
    </aside>

    <main class="main-content">
        <h1 class="page-title">Donor Management</h1>

        <div class="dashboard-cards">
            <div class="card stats-card">
                <div class="icon"><i class="fas fa-users"></i></div>
                <div class="value" id="total-donors">124</div>
                <div class="label">Total Donors</div>
            </div>
            <div class="card stats-card">
                <div class="icon"><i class="fas fa-hand-holding-usd"></i></div>
                <div class="value" id="total-donations">$45,280</div>
                <div class="label">Total Donations</div>
            </div>
            <div class="card stats-card">
                <div class="icon"><i class="fas fa-user-plus"></i></div>
                <div class="value" id="new-donors">18</div>
                <div class="label">New Donors (This Month)</div>
            </div>
            <div class="card stats-card">
                <div class="icon"><i class="fas fa-chart-line"></i></div>
                <div class="value" id="average-donation">$365</div>
                <div class="label">Average Donation</div>
            </div>
        </div>

        <div class="donor-list">
            <div class="donor-list-header">
                <h2 class="donor-list-title">Donor Directory</h2>
                <div class="donor-list-actions">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" id="donor-search" placeholder="Search donors..." oninput="window.location.href='?search=' + this.value">
                    </div>
                    <button id="add-donor-btn" class="btn btn-primary" onclick="document.getElementById('donor-modal').style.display='flex'">
                        <i class="fas fa-plus"></i>
                        <span>Add Donor</span>
                    </button>
                </div>
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Donor Type</th>
                            <th>Total Donations</th>
                            <th>Last Donation</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="donor-table-body">
                        <?php foreach ($donors as $donor): ?>
                            <tr>
                                <td><?= $donor['id'] ?></td>
                                <td><?= $donor['first_name'] . ' ' . $donor['last_name'] ?></td>
                                <td><?= $donor['email'] ?></td>
                                <td><?= $donor['phone'] ?></td>
                                <td><?= ucfirst($donor['donor_type']) ?></td>
                                <td><?= $donor['total_donations'] ?></td>
                                <td><?= date('M d, Y', strtotime($donor['last_donation'])) ?></td>
                                <td class="donor-actions">
                                    <button class="btn-icon btn-view" onclick="viewDonor(<?= $donor['id'] ?>)">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn-icon btn-edit" onclick="editDonor(<?= $donor['id'] ?>)">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn-icon btn-delete" onclick="confirmDelete(<?= $donor['id'] ?>)">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="pagination" id="donor-pagination">
                <!-- Pagination will be populated by PHP -->
            </div>
        </div>
    </main>

    <!-- Add/Edit Donor Modal -->
    <div class="modal" id="donor-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title">Add New Donor</h3>
                <button class="modal-close" onclick="document.getElementById('donor-modal').style.display='none'">&times;</button>
            </div>
            <div class="modal-body">
                <form id="donor-form" method="POST">
                    <input type="hidden" id="donor-id" name="donor_id">
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="first-name">First Name*</label>
                            <input type="text" class="form-control" id="first-name" name="first_name" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="last-name">Last Name*</label>
                            <input type="text" class="form-control" id="last-name" name="last_name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Email Address*</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="phone">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="donor-type">Donor Type*</label>
                            <select class="form-control" id="donor-type" name="donor_type" required>
                                <option value="">Select Type</option>
                                <option value="individual">Individual</option>
                                <option value="organization">Organization</option>
                                <option value="corporate">Corporate</option>
                                <option value="foundation">Foundation</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="state">State/Province</label>
                            <input type="text" class="form-control" id="state" name="state">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="zip">Postal Code</label>
                            <input type="text" class="form-control" id="zip" name="zip">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="country">Country</label>
                        <input type="text" class="form-control" id="country" name="country" value="United States">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="notes">Notes</label>
                        <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" type="button" onclick="document.getElementById('donor-modal').style.display='none'">Cancel</button>
                        <button class="btn btn-primary" type="submit" name="save_donor">Save Donor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal" id="delete-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Confirm Delete</h3>
                <button class="modal-close" onclick="document.getElementById('delete-modal').style.display='none'">&times;</button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this donor? This action cannot be undone.</p>
                <form method="POST">
                    <input type="hidden" id="delete-donor-id" name="donor_id">
                    <div class="modal-footer">
                        <button class="btn" type="button" onclick="document.getElementById('delete-modal').style.display='none'">Cancel</button>
                        <button class="btn btn-danger" type="submit" name="delete_donor">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // JavaScript functions to handle modal display and form population
        function editDonor(id) {
            // Fetch donor data from the server (for demonstration, using sample data)
            const donors = [
                { id: 1, first_name: 'John', last_name: 'Doe', email: 'john.doe@example.com', phone: '(555) 123-4567', donor_type: 'individual', address: '123 Main St', city: 'Anytown', state: 'CA', zip: '12345', country: 'United States', notes: 'Regular monthly donor' }
            ];
            
            const donor = donors.find(d => d.id === id);
            if (!donor) return;
            document.getElementById('modal-title').textContent = 'Edit Donor';
            document.getElementById('donor-id').value = donor.id;
            document.getElementById('first-name').value = donor.first_name;
            document.getElementById('last-name').value = donor.last_name;
            document.getElementById('email').value = donor.email;
            document.getElementById('phone').value = donor.phone;
            document.getElementById('donor-type').value = donor.donor_type;
            document.getElementById('address').value = donor.address;
            document.getElementById('city').value = donor.city;
            document.getElementById('state').value = donor.state;
            document.getElementById('zip').value = donor.zip;
            document.getElementById('country').value = donor.country;
            document.getElementById('notes').value = donor.notes;
            
            document.getElementById('donor-modal').style.display = 'flex';
        }

        function viewDonor(id) {
            alert(`Viewing donor with ID: ${id}`);
        }

        function confirmDelete(id) {
            document.getElementById('delete-donor-id').value = id;
            document.getElementById('delete-modal').style.display = 'flex';
        }
    </script>
</body>
</html>