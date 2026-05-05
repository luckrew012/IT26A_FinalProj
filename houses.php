<?php
session_start();
require_once 'config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$success = isset($_GET['success']) ? $_GET['success'] : '';
$error = isset($_GET['error']) ? $_GET['error'] : '';

$houses = $conn->query("SELECT * FROM houses ORDER BY block, lot");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Houses - Subdivision Homeowner Record System</title>
    <link rel="stylesheet" href="assets/css/style.css">
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
                <a href="houses.php" class="nav-item active">
                    <span class="nav-icon">🏠</span>
                    <span>Houses</span>
                </a>
                <a href="residents.php" class="nav-item">
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
                    <h1>Houses Management</h1>
                </div>
                <div class="header-right">
                    <a href="houses/add_house.php" class="btn btn-primary">+ Add House</a>
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
                                <th>Block</th>
                                <th>Lot</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($house = $houses->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $house['id']; ?></td>
                                <td><?php echo htmlspecialchars($house['block']); ?></td>
                                <td><?php echo htmlspecialchars($house['lot']); ?></td>
                                <td>
                                    <span class="badge badge-<?php 
                                        echo $house['status'] === 'Occupied' ? 'success' : 
                                            ($house['status'] === 'Vacant' ? 'warning' : 'danger'); 
                                    ?>">
                                        <?php echo htmlspecialchars($house['status']); ?>
                                    </span>
                                </td>
                                <td class="actions">
                                    <a href="houses/edit_house.php?id=<?php echo $house['id']; ?>" class="btn btn-sm btn-secondary">Edit</a>
                                    <a href="houses/delete_house.php?id=<?php echo $house['id']; ?>" 
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Are you sure you want to delete this house?')">Delete</a>
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
