<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    header("Location: ../houses.php?error=Invalid house ID");
    exit();
}

$stmt = $conn->prepare("SELECT * FROM houses WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$house = $stmt->get_result()->fetch_assoc();

if (!$house) {
    header("Location: ../houses.php?error=House not found");
    exit();
}

$error = isset($_GET['error']) ? $_GET['error'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit House - Subdivision Homeowner Record System</title>
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
                <a href="../houses.php" class="nav-item active">
                    <span class="nav-icon">🏠</span>
                    <span>Houses</span>
                </a>
                <a href="../residents.php" class="nav-item">
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
                    <h1>Edit House</h1>
                </div>
                <div class="header-right">
                    <a href="../houses.php" class="btn btn-secondary">← Back to Houses</a>
                </div>
            </header>
            
            <div class="content">
                <?php if ($error): ?>
                    <div class="alert alert-error"><?php echo htmlspecialchars($error); ?></div>
                <?php endif; ?>
                
                <div class="card form-card">
                    <form action="update_house.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $house['id']; ?>">
                        
                        <div class="form-group">
                            <label for="block">Block</label>
                            <input type="text" id="block" name="block" required 
                                   value="<?php echo htmlspecialchars($house['block']); ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="lot">Lot</label>
                            <input type="text" id="lot" name="lot" required 
                                   value="<?php echo htmlspecialchars($house['lot']); ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" required>
                                <option value="Vacant" <?php echo $house['status'] === 'Vacant' ? 'selected' : ''; ?>>Vacant</option>
                                <option value="Occupied" <?php echo $house['status'] === 'Occupied' ? 'selected' : ''; ?>>Occupied</option>
                                <option value="Under Maintenance" <?php echo $house['status'] === 'Under Maintenance' ? 'selected' : ''; ?>>Under Maintenance</option>
                            </select>
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Update House</button>
                            <a href="../houses.php" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
