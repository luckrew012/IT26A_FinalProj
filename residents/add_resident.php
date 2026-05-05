<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$houses = $conn->query("SELECT id, block, lot FROM houses ORDER BY block, lot");
$error = isset($_GET['error']) ? $_GET['error'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Resident - Subdivision Homeowner Record System</title>
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
                <a href="../residents.php" class="nav-item active">
                    <span class="nav-icon">👥</span>
                    <span>Residents</span>
                </a>
                <a href="../complaints.php" class="nav-item">
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
                    <h1>Add New Resident</h1>
                </div>
                <div class="header-right">
                    <a href="../residents.php" class="btn btn-secondary">← Back to Residents</a>
                </div>
            </header>
            
            <div class="content">
                <?php if ($error): ?>
                    <div class="alert alert-error"><?php echo htmlspecialchars($error); ?></div>
                <?php endif; ?>
                
                <div class="card form-card">
                    <form action="insert_resident.php" method="POST">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name" required placeholder="Enter full name">
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="age">Age</label>
                                <input type="number" id="age" name="age" required min="1" max="150" placeholder="Age">
                            </div>
                            
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select id="gender" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="house_id">House (Block/Lot)</label>
                            <select id="house_id" name="house_id" required>
                                <option value="">Select House</option>
                                <?php while ($house = $houses->fetch_assoc()): ?>
                                    <option value="<?php echo $house['id']; ?>">
                                        Block <?php echo htmlspecialchars($house['block']); ?>, 
                                        Lot <?php echo htmlspecialchars($house['lot']); ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select id="role" name="role" required>
                                <option value="">Select Role</option>
                                <option value="Owner">Owner</option>
                                <option value="Tenant">Tenant</option>
                                <option value="Family Member">Family Member</option>
                            </select>
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Add Resident</button>
                            <a href="../residents.php" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
