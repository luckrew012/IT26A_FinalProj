<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    header("Location: ../residents.php?error=Invalid resident ID");
    exit();
}

$stmt = $conn->prepare("SELECT * FROM residents WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resident = $stmt->get_result()->fetch_assoc();

if (!$resident) {
    header("Location: ../residents.php?error=Resident not found");
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
    <title>Edit Resident - Subdivision Homeowner Record System</title>
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
                    <h1>Edit Resident</h1>
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
                    <form action="update_resident.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $resident['id']; ?>">
                        
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name" required 
                                   value="<?php echo htmlspecialchars($resident['name']); ?>">
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="age">Age</label>
                                <input type="number" id="age" name="age" required min="1" max="150" 
                                       value="<?php echo $resident['age']; ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select id="gender" name="gender" required>
                                    <option value="Male" <?php echo $resident['gender'] === 'Male' ? 'selected' : ''; ?>>Male</option>
                                    <option value="Female" <?php echo $resident['gender'] === 'Female' ? 'selected' : ''; ?>>Female</option>
                                    <option value="Other" <?php echo $resident['gender'] === 'Other' ? 'selected' : ''; ?>>Other</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="house_id">House (Block/Lot)</label>
                            <select id="house_id" name="house_id" required>
                                <?php while ($house = $houses->fetch_assoc()): ?>
                                    <option value="<?php echo $house['id']; ?>" 
                                            <?php echo $house['id'] == $resident['house_id'] ? 'selected' : ''; ?>>
                                        Block <?php echo htmlspecialchars($house['block']); ?>, 
                                        Lot <?php echo htmlspecialchars($house['lot']); ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select id="role" name="role" required>
                                <option value="Owner" <?php echo $resident['role'] === 'Owner' ? 'selected' : ''; ?>>Owner</option>
                                <option value="Tenant" <?php echo $resident['role'] === 'Tenant' ? 'selected' : ''; ?>>Tenant</option>
                                <option value="Family Member" <?php echo $resident['role'] === 'Family Member' ? 'selected' : ''; ?>>Family Member</option>
                            </select>
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Update Resident</button>
                            <a href="../residents.php" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    header("Location: ../residents.php?error=Invalid resident ID");
    exit();
}

$stmt = $conn->prepare("SELECT * FROM residents WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resident = $stmt->get_result()->fetch_assoc();

if (!$resident) {
    header("Location: ../residents.php?error=Resident not found");
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
    <title>Edit Resident - Subdivision Homeowner Record System</title>
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
                    <h1>Edit Resident</h1>
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
                    <form action="update_resident.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $resident['id']; ?>">
                        
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name" required 
                                   value="<?php echo htmlspecialchars($resident['name']); ?>">
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="age">Age</label>
                                <input type="number" id="age" name="age" required min="1" max="150" 
                                       value="<?php echo $resident['age']; ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select id="gender" name="gender" required>
                                    <option value="Male" <?php echo $resident['gender'] === 'Male' ? 'selected' : ''; ?>>Male</option>
                                    <option value="Female" <?php echo $resident['gender'] === 'Female' ? 'selected' : ''; ?>>Female</option>
                                    <option value="Other" <?php echo $resident['gender'] === 'Other' ? 'selected' : ''; ?>>Other</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="house_id">House (Block/Lot)</label>
                            <select id="house_id" name="house_id" required>
                                <?php while ($house = $houses->fetch_assoc()): ?>
                                    <option value="<?php echo $house['id']; ?>" 
                                            <?php echo $house['id'] == $resident['house_id'] ? 'selected' : ''; ?>>
                                        Block <?php echo htmlspecialchars($house['block']); ?>, 
                                        Lot <?php echo htmlspecialchars($house['lot']); ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select id="role" name="role" required>
                                <option value="Owner" <?php echo $resident['role'] === 'Owner' ? 'selected' : ''; ?>>Owner</option>
                                <option value="Tenant" <?php echo $resident['role'] === 'Tenant' ? 'selected' : ''; ?>>Tenant</option>
                                <option value="Family Member" <?php echo $resident['role'] === 'Family Member' ? 'selected' : ''; ?>>Family Member</option>
                            </select>
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Update Resident</button>
                            <a href="../residents.php" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
