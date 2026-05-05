<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$residents = $conn->query("SELECT id, name FROM residents ORDER BY name");
$error = isset($_GET['error']) ? $_GET['error'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Complaint - Subdivision Homeowner Record System</title>
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
                    <h1>Add New Complaint</h1>
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
                    <form action="insert_complaint.php" method="POST">
                        <div class="form-group">
                            <label for="resident_id">Resident</label>
                            <select id="resident_id" name="resident_id" required>
                                <option value="">Select Resident</option>
                                <?php while ($resident = $residents->fetch_assoc()): ?>
                                    <option value="<?php echo $resident['id']; ?>">
                                        <?php echo htmlspecialchars($resident['name']); ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" required rows="5" 
                                      placeholder="Describe the complaint in detail..."></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" required>
                                <option value="Pending" selected>Pending</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Resolved">Resolved</option>
                            </select>
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Submit Complaint</button>
                            <a href="../complaints.php" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
