<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Management - Orphan Care System</title>
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2ecc71;
            --accent-color: #f39c12;
            --danger-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #34495e;
            --shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f7fa;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .header {
            background-color: var(--dark-color);
            color: white;
            padding: 15px 0;
            box-shadow: var(--shadow);
        }

        .header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo i {
            font-size: 24px;
        }

        .logo h1 {
            font-size: 20px;
        }

        .user-nav {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background-color: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

        .sidebar {
            width: 250px;
            background-color: white;
            height: calc(100vh - 70px);
            position: fixed;
            left: 0;
            top: 70px;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            z-index: 100;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .menu-item {
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--dark-color);
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .menu-item:hover, .menu-item.active {
            background-color: rgba(52, 152, 219, 0.1);
            color: var(--primary-color);
            border-left: 4px solid var(--primary-color);
        }

        .menu-item i {
            width: 20px;
            text-align: center;
        }

        .main-content {
            margin-left: 250px;
            padding: 30px;
            transition: all 0.3s ease;
        }

        .page-title {
            margin-bottom: 20px;
            color: var(--dark-color);
        }

        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: var(--shadow);
        }

        .stats-card {
            display: flex;
            flex-direction: column;
        }

        .stats-card .value {
            font-size: 28px;
            font-weight: bold;
            margin: 10px 0;
            color: var(--primary-color);
        }

        .stats-card .label {
            color: #7f8c8d;
            font-size: 14px;
        }

        .stats-card .icon {
            align-self: flex-end;
            font-size: 20px;
            background-color: rgba(52, 152, 219, 0.1);
            color: var(--primary-color);
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .donor-list {
            background-color: white;
            border-radius: 8px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .donor-list-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            border-bottom: 1px solid #ecf0f1;
        }

        .donor-list-title {
            font-size: 18px;
            color: var(--dark-color);
        }

        .donor-list-actions {
            display: flex;
            gap: 10px;
        }

        .search-box {
            display: flex;
            align-items: center;
            background-color: var(--light-color);
            border-radius: 4px;
            padding: 5px 10px;
        }

        .search-box input {
            border: none;
            background: transparent;
            outline: none;
            padding: 5px;
            width: 200px;
        }

        .btn {
            padding: 8px 15px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: #2980b9;
        }

        .btn-secondary {
            background-color: var(--secondary-color);
            color: white;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ecf0f1;
        }

        th {
            background-color: #f8f9fa;
            color: #7f8c8d;
            font-weight: 600;
        }

        tr:hover {
            background-color: rgba(52, 152, 219, 0.05);
        }

        .donor-actions {
            display: flex;
            gap: 10px;
        }

        .btn-icon {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            color: white;
        }

        .btn-view {
            background-color: var(--primary-color);
        }

        .btn-edit {
            background-color: var(--accent-color);
        }

        .btn-delete {
            background-color: var(--danger-color);
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            border-radius: 8px;
            width: 90%;
            max-width: 600px;
            box-shadow: var(--shadow);
            animation: modalFadeIn 0.3s;
        }

        @keyframes modalFadeIn {
            from { opacity: 0; transform: translateY(-50px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .modal-header {
            padding: 15px 20px;
            border-bottom: 1px solid #ecf0f1;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-title {
            font-size: 18px;
            color: var(--dark-color);
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: #7f8c8d;
        }

        .modal-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            display: block;
            margin-bottom: 5px;
            color: var(--dark-color);
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #dcdde1;
            outline: none;
            transition: border 0.2s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
        }

        .form-row {
            display: flex;
            gap: 15px;
        }

        .form-row .form-group {
            flex: 1;
        }

        .modal-footer {
            padding: 15px 20px;
            border-top: 1px solid #ecf0f1;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            gap: 5px;
        }

        .page-item {
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
            background-color: white;
            border: 1px solid #dcdde1;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .page-item:hover, .page-item.active {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-250px);
            }
            .main-content {
                margin-left: 0;
            }
            .sidebar.active {
                transform: translateX(0);
            }
            .main-content.active {
                margin-left: 250px;
            }
        }

        @media (max-width: 768px) {
            .dashboard-cards {
                grid-template-columns: 1fr;
            }
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            .donor-list-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            .donor-list-actions {
                width: 100%;
            }
            .search-box {
                flex: 1;
            }
        }
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
                        <input type="text" id="donor-search" placeholder="Search donors...">
                    </div>
                    <button id="add-donor-btn" class="btn btn-primary">
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
                        <!-- This will be populated by JavaScript/PHP -->
                    </tbody>
                </table>
            </div>
            <div class="pagination" id="donor-pagination">
                <!-- Pagination will be populated by JavaScript -->
            </div>
        </div>
    </main>

    <!-- Add/Edit Donor Modal -->
    <div class="modal" id="donor-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title">Add New Donor</h3>
                <button class="modal-close" id="close-modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="donor-form">
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
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn" id="cancel-btn">Cancel</button>
                <button class="btn btn-primary" id="save-donor-btn">Save Donor</button>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal" id="delete-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Confirm Delete</h3>
                <button class="modal-close" id="close-delete-modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this donor? This action cannot be undone.</p>
                <input type="hidden" id="delete-donor-id">
            </div>
            <div class="modal-footer">
                <button class="btn" id="cancel-delete-btn">Cancel</button>
                <button class="btn btn-danger" id="confirm-delete-btn">Delete</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle sidebar
            const menuToggle = document.getElementById('menu-toggle');
            const sidebar = document.querySelector('.sidebar');
            const mainContent = document.querySelector('.main-content');
            
            menuToggle.addEventListener('click', function() {
                sidebar.classList.toggle('active');
                mainContent.classList.toggle('active');
            });

            // Modal functionality
            const donorModal = document.getElementById('donor-modal');
            const deleteModal = document.getElementById('delete-modal');
            const addDonorBtn = document.getElementById('add-donor-btn');
            const closeModalBtn = document.getElementById('close-modal');
            const cancelBtn = document.getElementById('cancel-btn');
            const closeDeleteModalBtn = document.getElementById('close-delete-modal');
            const cancelDeleteBtn = document.getElementById('cancel-delete-btn');
            
            addDonorBtn.addEventListener('click', function() {
                document.getElementById('modal-title').textContent = 'Add New Donor';
                document.getElementById('donor-form').reset();
                document.getElementById('donor-id').value = '';
                donorModal.style.display = 'flex';
            });
            
            const closeDonorModal = function() {
                donorModal.style.display = 'none';
            };
            
            closeModalBtn.addEventListener('click', closeDonorModal);
            cancelBtn.addEventListener('click', closeDonorModal);
            
            const closeDeleteModal = function() {
                deleteModal.style.display = 'none';
            };
            
            closeDeleteModalBtn.addEventListener('click', closeDeleteModal);
            cancelDeleteBtn.addEventListener('click', closeDeleteModal);
            
            // Close modals when clicking outside
            window.addEventListener('click', function(event) {
                if (event.target === donorModal) {
                    closeDonorModal();
                }
                if (event.target === deleteModal) {
                    closeDeleteModal();
                }
            });

            // Fetch donors (this would actually call your PHP endpoint)
            fetchDonors();
            
            // Set up form submission
            const saveDonorBtn = document.getElementById('save-donor-btn');
            saveDonorBtn.addEventListener('click', function() {
                const form = document.getElementById('donor-form');
                if (form.checkValidity()) {
                    saveDonor();
                } else {
                    form.reportValidity();
                }
            });
            
            // Search functionality
            const donorSearch = document.getElementById('donor-search');
            donorSearch.addEventListener('input', function() {
                fetchDonors(1, this.value);
            });
            
            // Set up delete confirmation
            const confirmDeleteBtn = document.getElementById('confirm-delete-btn');
            confirmDeleteBtn.addEventListener('click', function() {
                const donorId = document.getElementById('delete-donor-id').value;
                deleteDonor(donorId);
            });
        });

        // Function to fetch donors from the server
        function fetchDonors(page = 1, search = '') {
            // In a real application, this would be an AJAX call to your PHP backend
            // For now, we'll simulate with sample data
            
            const sampleDonors = [
                { id: 1, first_name: 'John', last_name: 'Doe', email: 'john.doe@example.com', phone: '(555) 123-4567', donor_type: 'individual', total_donations: '$1,200', last_donation: '2025-03-01' },
                { id: 2, first_name: 'Jane', last_name: 'Smith', email: 'jane.smith@example.com', phone: '(555) 987-6543', donor_type: 'individual', total_donations: '$850', last_donation: '2025-02-15' },
                { id: 3, first_name: 'Acme', last_name: 'Corporation', email: 'donations@acme.com', phone: '(555) 555-5555', donor_type: 'corporate', total_donations: '$5,000', last_donation: '2025-03-10' },
                { id: 4, first_name: 'Hope', last_name: 'Foundation', email: 'contact@hopefoundation.org', phone: '(555) 444-3333', donor_type: 'foundation', total_donations: '$7,500', last_donation: '2025-01-20' },
                { id: 5, first_name: 'Robert', last_name: 'Johnson', email: 'robert.j@example.com', phone: '(555) 222-1111', donor_type: 'individual', total_donations: '$350', last_donation: '2025-03-05' }
            ];
            
            // Filter by search term if provided
            let filteredDonors = sampleDonors;
            if (search) {
                const searchLower = search.toLowerCase();
                filteredDonors = sampleDonors.filter(donor => 
                    donor.first_name.toLowerCase().includes(searchLower) || 
                    donor.last_name.toLowerCase().includes(searchLower) || 
                    donor.email.toLowerCase().includes(searchLower)
                );
            }
            
            // Render donors to table
            renderDonors(filteredDonors);
            
            // Render pagination
            renderPagination(page, Math.ceil(filteredDonors.length / 10));
        }

        // Function to render donors to the table
        function renderDonors(donors) {
            const tableBody = document.getElementById('donor-table-body');
            tableBody.innerHTML = '';
            
            if (donors.length === 0) {
                const row = document.createElement('tr');
                row.innerHTML = '<td colspan="8" class="text-center">No donors found</td>';
                tableBody.appendChild(row);
                return;
            }
            
            donors.forEach(donor => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${donor.id}</td>
                    <td>${donor.first_name} ${donor.last_name}</td>
                    <td>${donor.email}</td>
                    <td>${donor.phone}</td>
                    <td>${capitalize(donor.donor_type)}</td>
                    <td>${donor.total_donations}</td>
                    <td>${formatDate(donor.last_donation)}</td>
                    <td class="donor-actions">
                        <button class="btn-icon btn-view" onclick="viewDonor(${donor.id})">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn-icon btn-edit" onclick="editDonor(${donor.id})">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn-icon btn-delete" onclick="confirmDelete(${donor.id})">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                `;
                tableBody.appendChild(row);
            });
        }

        // Function to render pagination
        function renderPagination(currentPage, totalPages) {
            const pagination = document.getElementById('donor-pagination');
            pagination.innerHTML = '';
            
            if (totalPages <= 1) return;
            
            // Previous button
            const prevBtn = document.createElement('div');
            prevBtn.className = `page-item ${currentPage === 1 ? 'disabled' : ''}`;
            prevBtn.innerHTML = '<i class="fas fa-chevron-left"></i>';
            if (currentPage > 1) {
                prevBtn.addEventListener('click', () => fetchDonors(currentPage - 1, document.getElementById('donor-search').value));
            }
            pagination.appendChild(prevBtn);
            
            // Page numbers
            for (let i = 1; i <= totalPages; i++) {
                const pageBtn = document.createElement('div');
                pageBtn.className = `page-item ${i === currentPage ? 'active' : ''}`;
                pageBtn.textContent = i;
                pageBtn.addEventListener('click', () => fetchDonors(i, document.getElementById('donor-search').value));
                pagination.appendChild(pageBtn);
            }
            
            // Next button
            const nextBtn = document.createElement('div');
            nextBtn.className = `page-item ${currentPage === totalPages ? 'disabled' : ''}`;
            nextBtn.innerHTML = '<i class="fas fa-chevron-right"></i>';
            if (currentPage < totalPages) {
                nextBtn.addEventListener('click', () => fetchDonors(currentPage + 1, document.getElementById('donor-search').value));
            }
            pagination.appendChild(nextBtn);
        }

        // Function to edit a donor
        function editDonor(id) {
            // In a real application, this would fetch the donor data from the server
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

        // Function to view donor details
        function viewDonor(id) {
            // In a real application, this would redirect to a detailed view page
            alert(`Viewing donor with ID: ${id}`);
        }

        // Function to confirm deletion
        function confirmDelete(id) {
            document.getElementById('delete-donor-id').value = id;
            document.getElementById('delete-modal').style.display = 'flex';
        }

        // Function to delete a donor
        function deleteDonor(id) {
            // In a real application, this would send a request to the server
            alert(`Donor with ID ${id} deleted successfully`);
            document.getElementById('delete-modal').style.display = 'none';
            fetchDonors(); // Refresh the list
        }

        // Function to save a donor
        function saveDonor() {
            const donorId = document.getElementById('donor-id').value;
            const firstName = document.getElementById('first-name').value;
            const lastName = document.getElementById('last-name').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            const donorType = document.getElementById('donor-type').value;
            const address = document.getElementById('address').value;
            const city = document.getElementById('city').value;
            const state = document.getElementById('state').value;
            const zip = document.getElementById('zip').value;
            const country = document.getElementById('country').value;
            const notes = document.getElementById('notes').value;
            
            // In a real application, this would send a request to the server
            const formData = {
                donor_id: donorId,
                first_name: firstName,
                last_name: lastName,
                email: email,
                phone: phone,
                donor_type: donorType,
                address: address,
                city: city,
                state: state,
                zip: zip,
                country: country,
                notes: notes
            };
            
            console.log('Saving donor:', formData);
            
            // For demonstration, just show an alert
            alert(`Donor ${donorId ? 'updated' : 'added'} successfully`);
            document.getElementById('donor-modal').style.display = 'none';
            fetchDonors(); // Refresh the list
        }

        // Helper function to capitalize first letter
        function capitalize(str) {
            return str.charAt(0).toUpperCase() + str.slice(1);
        }

        // Helper function to format date
        function formatDate(dateStr) {
            const date = new Date(dateStr);
            return date.toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
        }
</script>
</body>
</html>
