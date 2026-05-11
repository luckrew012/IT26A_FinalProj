<?php
require_once 'config/database.php';
requireLogin();

$pdo = getConnection();
$flash = getFlashMessage();

// Get all complaints with resident info
$complaints = $pdo->query("
    SELECT c.*, r.first_name, r.last_name, h.house_number, h.block
    FROM complaints c
    LEFT JOIN residents r ON c.resident_id = r.id
    LEFT JOIN houses h ON r.house_id = h.id
    ORDER BY c.date_filed DESC
")->fetchAll();

// Get residents for dropdown
$residents = $pdo->query("
    SELECT r.id, r.first_name, r.last_name, h.house_number 
    FROM residents r 
    LEFT JOIN houses h ON r.house_id = h.id 
    WHERE r.status = 'active'
    ORDER BY r.last_name
")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaints - Subdivision Homeowner Record System</title>
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
                    <h1>Complaints Management</h1>
                    <p>Track and manage resident complaints</p>
                </div>
                <div class="header-actions">
                    <button class="btn btn-primary" data-modal-open="addComplaintModal">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        New Complaint
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
                        <input type="text" placeholder="Search complaints...">
                    </div>
                    <select class="filter-select">
                        <option value="">All Status</option>
                        <option value="pending">Pending</option>
                        <option value="in_progress">In Progress</option>
                        <option value="resolved">Resolved</option>
                    </select>
                    <select class="filter-select">
                        <option value="">All Categories</option>
                        <option value="noise">Noise</option>
                        <option value="maintenance">Maintenance</option>
                        <option value="security">Security</option>
                        <option value="utilities">Utilities</option>
                    </select>
                </div>

                <div class="card">
                    <div class="card-body" style="padding: 0;">
                        <div class="table-container">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Subject</th>
                                        <th>Filed By</th>
                                        <th>Category</th>
                                        <th>Date Filed</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($complaints as $complaint): ?>
                                    <tr>
                                        <td><strong>#C-<?php echo str_pad($complaint['id'], 3, '0', STR_PAD_LEFT); ?></strong></td>
                                        <td><?php echo htmlspecialchars($complaint['subject']); ?></td>
                                        <td><?php echo htmlspecialchars($complaint['first_name'] . ' ' . $complaint['last_name']); ?></td>
                                        <td><?php echo ucfirst($complaint['category']); ?></td>
                                        <td><?php echo date('M d, Y', strtotime($complaint['date_filed'])); ?></td>
                                        <td>
                                            <?php
                                            $statusClass = [
                                                'pending' => 'warning',
                                                'in_progress' => 'info',
                                                'resolved' => 'success'
                                            ][$complaint['status']] ?? 'secondary';
                                            $priorityBadge = $complaint['priority'] === 'urgent' ? 'danger' : $statusClass;
                                            ?>
                                            <span class="badge badge-<?php echo $complaint['priority'] === 'urgent' ? 'danger' : $statusClass; ?>">
                                                <?php echo $complaint['priority'] === 'urgent' ? 'Urgent' : ucfirst(str_replace('_', ' ', $complaint['status'])); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="btn-icon edit" title="Edit"
                                                    onclick="openEditComplaintModal(<?php echo htmlspecialchars(json_encode($complaint)); ?>)">
                                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </button>
                                                <form action="delete_complaint.php" method="POST" style="display: inline;">
                                                    <input type="hidden" name="id" value="<?php echo $complaint['id']; ?>">
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

    <!-- Add Complaint Modal -->
    <div class="modal-overlay" id="addComplaintModal">
        <div class="modal">
            <div class="modal-header">
                <h3>File New Complaint</h3>
                <button class="modal-close" data-modal-close>
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form action="insert_complaint.php" method="POST">
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" class="form-control" placeholder="Brief description" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="resident_id">Filed By</label>
                            <select id="resident_id" name="resident_id" class="form-control" required>
                                <option value="">Select Resident</option>
                                <?php foreach ($residents as $resident): ?>
                                <option value="<?php echo $resident['id']; ?>">
                                    <?php echo htmlspecialchars($resident['first_name'] . ' ' . $resident['last_name'] . ' (' . $resident['house_number'] . ')'); ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select id="category" name="category" class="form-control" required>
                                <option value="">Select Category</option>
                                <option value="noise">Noise</option>
                                <option value="maintenance">Maintenance</option>
                                <option value="security">Security</option>
                                <option value="utilities">Utilities</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control" rows="4" placeholder="Detailed description..." required></textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="priority">Priority</label>
                            <select id="priority" name="priority" class="form-control" required>
                                <option value="low">Low</option>
                                <option value="medium" selected>Medium</option>
                                <option value="high">High</option>
                                <option value="urgent">Urgent</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="complaint_status">Status</label>
                            <select id="complaint_status" name="status" class="form-control" required>
                                <option value="pending" selected>Pending</option>
                                <option value="in_progress">In Progress</option>
                                <option value="resolved">Resolved</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" data-modal-close>Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit Complaint</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Complaint Modal -->
    <div class="modal-overlay" id="editComplaintModal">
        <div class="modal">
            <div class="modal-header">
                <h3>Edit Complaint</h3>
                <button class="modal-close" data-modal-close>
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form action="update_complaint.php" method="POST">
                    <input type="hidden" name="id" id="edit_complaint_id">
                    <div class="form-group">
                        <label for="edit_subject">Subject</label>
                        <input type="text" id="edit_subject" name="subject" class="form-control" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="edit_category">Category</label>
                            <select id="edit_category" name="category" class="form-control" required>
                                <option value="noise">Noise</option>
                                <option value="maintenance">Maintenance</option>
                                <option value="security">Security</option>
                                <option value="utilities">Utilities</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_priority">Priority</label>
                            <select id="edit_priority" name="priority" class="form-control" required>
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                                <option value="urgent">Urgent</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_description">Description</label>
                        <textarea id="edit_description" name="description" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="edit_complaint_status">Status</label>
                        <select id="edit_complaint_status" name="status" class="form-control" required>
                            <option value="pending">Pending</option>
                            <option value="in_progress">In Progress</option>
                            <option value="resolved">Resolved</option>
                        </select>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" data-modal-close>Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Complaint</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../js/main.js"></script>
    <script>
        function openEditComplaintModal(data) {
            document.getElementById('edit_complaint_id').value = data.id;
            document.getElementById('edit_subject').value = data.subject;
            document.getElementById('edit_category').value = data.category;
            document.getElementById('edit_priority').value = data.priority;
            document.getElementById('edit_description').value = data.description;
            document.getElementById('edit_complaint_status').value = data.status;

            document.getElementById('editComplaintModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    </script>
</body>
</html>
