<?php
require_once 'config/database.php';
requireLogin();

$pdo = getConnection();
$flash = getFlashMessage();

// Get all houses
$houses = $pdo->query("SELECT * FROM houses ORDER BY house_number")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Houses - Subdivision Homeowner Record System</title>
    <link rel="preconnect" href="[fonts.googleapis.com](https://fonts.googleapis.com)">
    <link rel="preconnect" href="[fonts.gstatic.com](https://fonts.gstatic.com)" crossorigin>
    <link href="[fonts.googleapis.com](https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap)" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="dashboard">
        <?php include 'includes/sidebar.php'; ?>

        <main class="main-content">
            <header class="header">
                <div class="header-title">
                    <h1>Houses Management</h1>
                    <p>Manage all house records in the subdivision</p>
                </div>
                <div class="header-actions">
                    <button class="btn btn-primary" data-modal-open="addHouseModal">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Add House
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
                        <input type="text" placeholder="Search houses...">
                    </div>
                    <select class="filter-select">
                        <option value="">All Blocks</option>
                        <option value="A">Block A</option>
                        <option value="B">Block B</option>
                        <option value="C">Block C</option>
                        <option value="D">Block D</option>
                        <option value="E">Block E</option>
                        <option value="F">Block F</option>
                    </select>
                    <select class="filter-select">
                        <option value="">All Status</option>
                        <option value="occupied">Occupied</option>
                        <option value="vacant">Vacant</option>
                        <option value="maintenance">Under Maintenance</option>
                    </select>
                </div>

                <div class="card">
                    <div class="card-body" style="padding: 0;">
                        <div class="table-container">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th>House No.</th>
                                        <th>Block</th>
                                        <th>Street</th>
                                        <th>Type</th>
                                        <th>Area (sqm)</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($houses as $house): ?>
                                    <tr>
                                        <td><strong><?php echo htmlspecialchars($house['house_number']); ?></strong></td>
                                        <td>Block <?php echo htmlspecialchars($house['block']); ?></td>
                                        <td><?php echo htmlspecialchars($house['street']); ?></td>
                                        <td><?php echo ucfirst($house['house_type']); ?></td>
                                        <td><?php echo number_format($house['area_sqm'], 0); ?></td>
                                        <td>
                                            <?php
                                            $statusClass = [
                                                'occupied' => 'success',
                                                'vacant' => 'danger',
                                                'maintenance' => 'warning'
                                            ][$house['status']] ?? 'secondary';
                                            ?>
                                            <span class="badge badge-<?php echo $statusClass; ?>">
                                                <?php echo ucfirst($house['status']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="btn-icon edit" title="Edit" 
                                                    onclick="openEditModal('editHouseModal', <?php echo htmlspecialchars(json_encode($house)); ?>)">
                                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </button>
                                                <form action="delete_house.php" method="POST" style="display: inline;">
                                                    <input type="hidden" name="id" value="<?php echo $house['id']; ?>">
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

    <!-- Add House Modal -->
    <div class="modal-overlay" id="addHouseModal">
        <div class="modal">
            <div class="modal-header">
                <h3>Add New House</h3>
                <button class="modal-close" data-modal-close>
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form action="insert_house.php" method="POST">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="house_number">House Number</label>
                            <input type="text" id="house_number" name="house_number" class="form-control" placeholder="e.g., H-006" required>
                        </div>
                        <div class="form-group">
                            <label for="block">Block</label>
                            <select id="block" name="block" class="form-control" required>
                                <option value="">Select Block</option>
                                <option value="A">Block A</option>
                                <option value="B">Block B</option>
                                <option value="C">Block C</option>
                                <option value="D">Block D</option>
                                <option value="E">Block E</option>
                                <option value="F">Block F</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="street">Street</label>
                            <input type="text" id="street" name="street" class="form-control" placeholder="e.g., Mango Street" required>
                        </div>
                        <div class="form-group">
                            <label for="house_type">House Type</label>
                            <select id="house_type" name="house_type" class="form-control" required>
                                <option value="">Select Type</option>
                                <option value="single">Single Family</option>
                                <option value="duplex">Duplex</option>
                                <option value="townhouse">Townhouse</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="area_sqm">Area (sqm)</label>
                            <input type="number" id="area_sqm" name="area_sqm" class="form-control" placeholder="e.g., 150" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control" required>
                                <option value="occupied">Occupied</option>
                                <option value="vacant">Vacant</option>
                                <option value="maintenance">Under Maintenance</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" data-modal-close>Cancel</button>
                        <button type="submit" class="btn btn-primary">Save House</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit House Modal -->
    <div class="modal-overlay" id="editHouseModal">
        <div class="modal">
            <div class="modal-header">
                <h3>Edit House</h3>
                <button class="modal-close" data-modal-close>
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form action="update_house.php" method="POST">
                    <input type="hidden" name="id" id="edit_id">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="edit_house_number">House Number</label>
                            <input type="text" id="edit_house_number" name="house_number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_block">Block</label>
                            <select id="edit_block" name="block" class="form-control" required>
                                <option value="A">Block A</option>
                                <option value="B">Block B</option>
                                <option value="C">Block C</option>
                                <option value="D">Block D</option>
                                <option value="E">Block E</option>
                                <option value="F">Block F</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="edit_street">Street</label>
                            <input type="text" id="edit_street" name="street" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_house_type">House Type</label>
                            <select id="edit_house_type" name="house_type" class="form-control" required>
                                <option value="single">Single Family</option>
                                <option value="duplex">Duplex</option>
                                <option value="townhouse">Townhouse</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="edit_area_sqm">Area (sqm)</label>
                            <input type="number" id="edit_area_sqm" name="area_sqm" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_status">Status</label>
                            <select id="edit_status" name="status" class="form-control" required>
                                <option value="occupied">Occupied</option>
                                <option value="vacant">Vacant</option>
                                <option value="maintenance">Under Maintenance</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" data-modal-close>Cancel</button>
                        <button type="submit" class="btn btn-primary">Update House</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../js/main.js"></script>
    <script>
        // Override openEditModal for house-specific field mapping
        function openEditModal(modalId, data) {
            const modal = document.getElementById(modalId);
            if (!modal) return;
            
            document.getElementById('edit_id').value = data.id;
            document.getElementById('edit_house_number').value = data.house_number;
            document.getElementById('edit_block').value = data.block;
            document.getElementById('edit_street').value = data.street;
            document.getElementById('edit_house_type').value = data.house_type;
            document.getElementById('edit_area_sqm').value = data.area_sqm;
            document.getElementById('edit_status').value = data.status;

            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    </script>
</body>
</html>
