<?php
session_start();
require_once 'config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Get statistics
$total_houses = $conn->query("SELECT COUNT(*) as count FROM houses")->fetch_assoc()['count'];
$total_residents = $conn->query("SELECT COUNT(*) as count FROM residents")->fetch_assoc()['count'];
$occupied_houses = $conn->query("SELECT COUNT(*) as count FROM houses WHERE status = 'Occupied'")->fetch_assoc()['count'];
$pending_complaints = $conn->query("SELECT COUNT(*) as count FROM complaints WHERE status = 'Pending'")->fetch_assoc()['count'];

// Chart data
$blocks_query = $conn->query("
    SELECT h.block, COUNT(r.id) as resident_count 
    FROM houses h 
    LEFT JOIN residents r ON h.id = r.house_id 
    GROUP BY h.block 
    ORDER BY h.block
");
$blocks_data = [];
while ($row = $blocks_query->fetch_assoc()) {
    $blocks_data[] = $row;
}

$occupancy_query = $conn->query("SELECT status, COUNT(*) as count FROM houses GROUP BY status");
$occupancy_data = [];
while ($row = $occupancy_query->fetch_assoc()) {
    $occupancy_data[] = $row;
}

$complaint_status_query = $conn->query("SELECT status, COUNT(*) as count FROM complaints GROUP BY status");
$complaint_data = [];
while ($row = $complaint_status_query->fetch_assoc()) {
    $complaint_data[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Subdivision Homeowner Record System</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="[cdn.jsdelivr.net](https://cdn.jsdelivr.net/npm/chart.js)"></script>
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
                <a href="dashboard.php" class="nav-item active">
                    <span class="nav-icon">📊</span>
                    <span>Dashboard</span>
                </a>
                <a href="houses.php" class="nav-item">
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
            <!-- Header -->
            <header class="header">
                <div class="header-left">
                    <h1>Dashboard</h1>
                </div>
                <div class="header-right">
                    <span class="user-info">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                </div>
            </header>
            
            <!-- Content -->
            <div class="content">
                <!-- Stats Cards -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon blue">🏠</div>
                        <div class="stat-info">
                            <h3><?php echo $total_houses; ?></h3>
                            <p>Total Houses</p>
                        </div>
                        <a href="houses.php" class="stat-link">View Houses →</a>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon green">👥</div>
                        <div class="stat-info">
                            <h3><?php echo $total_residents; ?></h3>
                            <p>Total Residents</p>
                        </div>
                        <a href="residents.php" class="stat-link">View Residents →</a>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon purple">✓</div>
                        <div class="stat-info">
                            <h3><?php echo $occupied_houses; ?></h3>
                            <p>Occupied Houses</p>
                        </div>
                        <a href="houses.php" class="stat-link">View Houses →</a>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon orange">⏳</div>
                        <div class="stat-info">
                            <h3><?php echo $pending_complaints; ?></h3>
                            <p>Pending Complaints</p>
                        </div>
                        <a href="complaints.php" class="stat-link">View Complaints →</a>
                    </div>
                </div>
                
                <!-- Charts -->
                <div class="charts-grid">
                    <div class="chart-card">
                        <h3>Residents per Block</h3>
                        <canvas id="residentsChart"></canvas>
                    </div>
                    
                    <div class="chart-card">
                        <h3>House Occupancy</h3>
                        <canvas id="occupancyChart"></canvas>
                    </div>
                    
                    <div class="chart-card">
                        <h3>Complaint Status</h3>
                        <canvas id="complaintsChart"></canvas>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
    <script>
        // Residents per Block Chart
        const blocksData = <?php echo json_encode($blocks_data); ?>;
        new Chart(document.getElementById('residentsChart'), {
            type: 'bar',
            data: {
                labels: blocksData.map(item => 'Block ' + item.block),
                datasets: [{
                    label: 'Residents',
                    data: blocksData.map(item => item.resident_count),
                    backgroundColor: '#3b82f6',
                    borderRadius: 5
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } }
            }
        });
        
        // House Occupancy Chart
        const occupancyData = <?php echo json_encode($occupancy_data); ?>;
        new Chart(document.getElementById('occupancyChart'), {
            type: 'pie',
            data: {
                labels: occupancyData.map(item => item.status),
                datasets: [{
                    data: occupancyData.map(item => item.count),
                    backgroundColor: ['#22c55e', '#f59e0b', '#ef4444']
                }]
            },
            options: { responsive: true }
        });
        
        // Complaint Status Chart
        const complaintData = <?php echo json_encode($complaint_data); ?>;
        new Chart(document.getElementById('complaintsChart'), {
            type: 'doughnut',
            data: {
                labels: complaintData.map(item => item.status),
                datasets: [{
                    data: complaintData.map(item => item.count),
                    backgroundColor: ['#f59e0b', '#3b82f6', '#22c55e']
                }]
            },
            options: { responsive: true }
        });
    </script>
</body>
</html>
