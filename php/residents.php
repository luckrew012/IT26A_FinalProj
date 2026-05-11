<?php
require_once 'config/database.php';
requireLogin();

$pdo = getConnection();
$flash = getFlashMessage();

// Get all residents with house info
$residents = $pdo->query("
    SELECT r.*, h.house_number, h.block 
    FROM residents r 
    LEFT JOIN houses h ON r.house_id = h.id 
    ORDER BY r.last_name, r.first_name
")->fetchAll();

// Get houses for dropdown
$houses = $pdo->query("
    SELECT id, house_number, block 
    FROM houses 
    WHERE status = 'Vacant' 
    ORDER BY house_number
")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Residents - Subdivision Homeowner Record System</title>
    <link rel="preconnect" href="[fonts.googleapis.com](https://fonts.googleapis.com)">
    <link rel="preconnect" href="[fonts.gstatic.com](https://fonts.gstatic.com)" crossorigin>
    <link href="[fonts.googleapis.com](https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap)" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dashboard">
        <?php include 'includes/sidebar.php'; ?>

        <main class="main-content">
            <header class="header">
                <div class="header-title">
                    <h1>Residents Management</h1>
                    <p>Manage all resident records in the subdivision</p>
                </div>
                <div class="header-actions">
                    <button class="btn btn-primary" data-modal-open="addResidentModal">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Add Resident
                    </button>
                </div>
            </header>

            <div class="page-content">
                <?php if ($flash): ?>
                    <div class="alert alert-<?php echo $flash['type']; ?>">
                        <?php echo $flash['message']; ?>
                    </div>
                <?php endif; ?>

                <div class="toolbar">
                    <div class="search-box">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <input type="text" placeholder="Search residents...">
                    </div>
                    <select class="filter-select">
                        <option value="">All Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <div class="card">
                    <div class="card-body" style="padding: 0;">
                        <div class="table-container">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>House No.</th>
                                        <th>Contact</th>
                                        <th>Email</th>
                                        <th>Move-in Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($residents as $resident): ?>
                                    <tr>
                                        <td><strong><?php echo htmlspecialchars($resident['first_name'] . ' ' . $resident['last_name']); ?></strong></td>
                                        <td><?php echo htmlspecialchars($resident['house_number'] ?? 'N/A'); ?></td>
                                        <td><?php echo htmlspecialchars($resident['contact_number']); ?></td>
                                        <td><?php echo htmlspecialchars($resident['email']); ?></td>
                                        <td><?php echo $resident['move_in_date'] ? date('M d, Y', strtotime($resident['move_in_date'])) : 'N/A'; ?></td>
                                        <td>
                                            <span class="badge badge-<?php echo $resident['status'] == 'active' ? 'success' : 'warning'; ?>">
                                                <?php echo ucfirst($resident['status']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="btn-icon edit" title="Edit"
                                                    onclick="openEditResidentModal(<?php echo htmlspecialchars(json_encode($resident)); ?>)">
                                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </button>
                                                <form action="delete_resident.php" method="POST" style="display: inline;">
                                                    <input type="hidden" name="id" value="<?php echo $resident['id']; ?>">
                                                    <button type="submit" class="btn-icon delete delete-btn" title="Delete">
                                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Add Resident Modal -->
    <div class="modal-overlay" id="addResidentModal">
        <div class="modal">
            <div class="modal-header">
                <h3>Add New Resident</h3>
                <button class="modal-close" data-modal-close>
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form action="insert_resident.php" method="POST">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" id="first_name" name="first_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" id="last_name" name="last_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="house_id">House</label>
                            <select id="house_id" name="house_id" class="form-control" required>
                                <option value="">Select House</option>
                                <?php foreach ($houses as $house): ?>
                                <option value="<?php echo $house['id']; ?>">
                                    <?php echo htmlspecialchars($house['house_number'] . ' - Block ' . $house['block']); ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="contact_number">Contact Number</label>
                            <input type="tel" id="contact_number" name="contact_number" class="form-control" placeholder="+63 9XX XXX XXXX" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="move_in_date">Move-in Date</label>
                            <input type="date" id="move_in_date" name="move_in_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" data-modal-close>Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Resident</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Resident Modal -->
    <div class="modal-overlay" id="editResidentModal">
        <div class="modal">
            <div class="modal-header">
                <h3>Edit Resident</h3>
                <button class="modal-close" data-modal-close>
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form action="update_resident.php" method="POST">
                    <input type="hidden" name="id" id="edit_resident_id">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="edit_first_name">First Name</label>
                            <input type="text" id="edit_first_name" name="first_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_last_name">Last Name</label>
                            <input type="text" id="edit_last_name" name="last_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="edit_house_id">House</label>
                            <select id="edit_house_id" name="house_id" class="form-control" required>
                                <?php foreach ($houses as $house): ?>
                                <option value="<?php echo $house['id']; ?>">
                                    <?php echo htmlspecialchars($house['house_number'] . ' - Block ' . $house['block']); ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_contact_number">Contact Number</label>
                            <input type="tel" id="edit_contact_number" name="contact_number" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_email">Email Address</label>
                        <input type="email" id="edit_email" name="email" class="form-control" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="edit_move_in_date">Move-in Date</label>
                            <input type="date" id="edit_move_in_date" name="move_in_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_resident_status">Status</label>
                            <select id="edit_resident_status" name="status" class="form-control" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" data-modal-close>Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Resident</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <script src="../js/main.js"></script>
    <script>
        function openEditResidentModal(data) {
            document.getElementById('edit_resident_id').value = data.id;
            document.getElementById('edit_first_name').value = data.first_name;
            document.getElementById('edit_last_name').value = data.last_name;
            document.getElementById('edit_house_id').value = data.house_id;
            document.getElementById('edit_contact_number').value = data.contact_number;
            document.getElementById('edit_email').value = data.email;
            document.getElementById('edit_move_in_date').value = data.move_in_date;
            document.getElementById('edit_resident_status').value = data.status;

            document.getElementById('editResidentModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    </script>
</body>
</html>
