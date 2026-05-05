<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    header("Location: ../complaints.php?error=Invalid complaint ID");
    exit();
}

$stmt = $conn->prepare("SELECT c.*, r.name as resident_name FROM complaints c LEFT JOIN residents r ON c.resident_id = r.id WHERE c.id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$complaint = $stmt->get_result()->fetch_assoc();

if (!$complaint) {
    header("Location: ../complaints.php?error=Complaint not found");
    exit();
}

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status = $_POST['status'] ?? '';
    
    if (!empty($status)) {
        $stmt = $conn->prepare("UPDATE complaints SET status = ? WHERE id = ?");
        $stmt->bind_param("si", $status, $id);
        
        if ($stmt->execute()) {
            header("Location: ../complaints.php?success=Complaint status updated successfully");
            exit();
        }
    }
    header("Location: ../complaints.php?error=Failed to update complaint");
    exit();
}

$error = isset($_GET['error']) ? $_GET['error'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Complaint - Subdivision Homeowner Record System</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="layout">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>🏘️ Subdivision</h2>
                <p>Record System</p>
            </div>
            
            <nav class="sidebar-nav">
                <a href="../dashboard.php" class="nav-item">
                    <span class="nav-icon">📊</span>
                    <span>Dashboard</span>
                </a>
                <a href="../houses.php" class="nav-item">
                    <span class="nav-icon">🏠</span>
                    <span>Houses</span>
                </a>
                <a href="../residents.php" class="nav-item">
                    <span class="nav-icon">👥</span>
                    <span>Residents</span>
                </a>
                <a href="../complaints.php" class="nav-item active">
                    <span class="nav-icon">⚠️</span>
                    <span>Complaints</span>
                </a>
            </nav>
            
            <div class="sidebar-footer">
                <a href="../auth/logout.php" class="nav-item logout">
                    <span class="nav-icon">🚪</span>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        
        <!-- Main Content -->
        <main class="main-content">
            <header class="header">
                <div class="header-left">
                    <h1>Update Complaint Status</h1>
                </div>
                <div class="header-right">
                    <a href="../complaints.php" class="btn btn-secondary">← Back to Complaints</a>
                </div>
            </header>
            
            <div class="content">
                <?php if ($error): ?>
                    <div class="alert alert-error"><?php echo htmlspecialchars($error); ?></div>
                <?php endif; ?>
                
                <div class="card form-card">
                    <div class="complaint-details">
                        <p><strong>Resident:</strong> <?php echo htmlspecialchars($complaint['resident_name'] ?? 'Unknown'); ?></p>
                        <p><strong>Description:</strong> <?php echo htmlspecialchars($complaint['description']); ?></p>
                        <p><strong>Date Filed:</strong> <?php echo date('M d, Y', strtotime($complaint['created_at'])); ?></p>
                        <p><strong>Current Status:</strong> 
                            <span class="badge badge-<?php 
                                echo $complaint['status'] === 'Resolved' ? 'success' : 
                                    ($complaint['status'] === 'Pending' ? 'warning' : 'info'); 
                            ?>">
                                <?php echo htmlspecialchars($complaint['status']); ?>
                            </span>
                        </p>
                    </div>
                    
                    <hr>
                    
                    <form action="update_complaint.php?id=<?php echo $id; ?>" method="POST">
                        <div class="form-group">
                            <label for="status">Update Status</label>
                            <select id="status" name="status" required>
                                <option value="Pending" <?php echo $complaint['status'] === 'Pending' ? 'selected' : ''; ?>>Pending</option>
                                <option value="In Progress" <?php echo $complaint['status'] === 'In Progress' ? 'selected' : ''; ?>>In Progress</option>
                                <option value="Resolved" <?php echo $complaint['status'] === 'Resolved' ? 'selected' : ''; ?>>Resolved</option>
                            </select>
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Update Status</button>
                            <a href="../complaints.php" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
