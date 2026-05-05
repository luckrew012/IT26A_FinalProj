<?php
session_start();
require_once 'config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$success = isset($_GET['success']) ? $_GET['success'] : '';
$error = isset($_GET['error']) ? $_GET['error'] : '';

$residents = $conn->query("
    SELECT r.*, CONCAT('Block ', h.block, ', Lot ', h.lot) as house_location 
    FROM residents r 
    LEFT JOIN houses h ON r.house_id = h.id 
    ORDER BY r.name
");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Residents - Subdivision Homeowner Record System</title>
    <link rel="stylesheet" href="assets/style.css">
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
                <a href="dashboard.php" class="nav-item">
                    <span class="nav-icon">📊</span>
                    <span>Dashboard</span>
                </a>
                <a href="houses.php" class="nav-item">
                    <span class="nav-icon">🏠</span>
                    <span>Houses</span>
                </a>
                <a href="residents.php" class="nav-item active">
                    <span class="nav-icon">👥</span>
                    <span>Residents</span>
                </a>
                <a href="complaints.php" class="nav-item">
                    <span class="nav-icon">⚠️</span>
                    <span>Complaints</span>
                </a>
            </nav>
            
            <div class="sidebar-footer">
                <a href="auth/logout.php" class="nav-item logout">
                    <span class="nav-icon">🚪</span>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        
        <!-- Main Content -->
        <main class="main-content">
            <header class="header">
                <div class="header-left">
                    <h1>Residents Management</h1>
                </div>
                <div class="header-right">
                    <a href="residents/add_resident.php" class="btn btn-primary">+ Add Resident</a>
                </div>
            </header>
            
            <div class="content">
                <?php if ($success): ?>
                    <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
                <?php endif; ?>
                
                <?php if ($error): ?>
                    <div class="alert alert-error"><?php echo htmlspecialchars($error); ?></div>
                <?php endif; ?>
                
                <div class="card">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>House</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($resident = $residents->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $resident['id']; ?></td>
                                <td><?php echo htmlspecialchars($resident['name']); ?></td>
                                <td><?php echo $resident['age']; ?></td>
                                <td><?php echo htmlspecialchars($resident['gender']); ?></td>
                                <td><?php echo $resident['house_location'] ?? 'Unassigned'; ?></td>
                                <td>
                                    <span class="badge badge-info">
                                        <?php echo htmlspecialchars($resident['role']); ?>
                                    </span>
                                </td>
                                <td class="actions">
                                    <a href="residents/edit_resident.php?id=<?php echo $resident['id']; ?>" class="btn btn-sm btn-secondary">Edit</a>
                                    <a href="residents/delete_resident.php?id=<?php echo $resident['id']; ?>" 
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Are you sure you want to delete this resident?')">Delete</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
