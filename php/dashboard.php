<?php
require_once 'config/database.php';
requireLogin();

$pdo = getConnection();

// Get statistics
$totalHouses = $pdo->query("SELECT COUNT(*) FROM houses")->fetchColumn();
$totalResidents = $pdo->query("SELECT COUNT(*) FROM residents WHERE status = 'active'")->fetchColumn();
$openComplaints = $pdo->query("SELECT COUNT(*) FROM complaints WHERE status != 'resolved'")->fetchColumn();
$vacantHouses = $pdo->query("SELECT COUNT(*) FROM houses WHERE status = 'vacant'")->fetchColumn();

// Get residents per block for chart
$blockData = $pdo->query("
    SELECT h.block, COUNT(r.id) as count 
    FROM houses h 
    LEFT JOIN residents r ON h.id = r.house_id AND r.status = 'active'
    GROUP BY h.block 
    ORDER BY h.block
")->fetchAll();

// Get house occupancy for chart
$occupancyData = $pdo->query("
    SELECT status, COUNT(*) as count 
    FROM houses 
    GROUP BY status
")->fetchAll();

// Get complaint status for chart
$complaintData = $pdo->query("
    SELECT status, COUNT(*) as count 
    FROM complaints 
    GROUP BY status
")->fetchAll();

// Get recent complaints
$recentComplaints = $pdo->query("
    SELECT c.*, r.first_name, r.last_name, h.block
    FROM complaints c
    LEFT JOIN residents r ON c.resident_id = r.id
    LEFT JOIN houses h ON r.house_id = h.id
    ORDER BY c.date_filed DESC
    LIMIT 5
")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Subdivision Homeowner Record System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <!-- Replace this line: -->
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->

<!-- With these two lines: -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
</head>
<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <?php include 'includes/sidebar.php'; ?>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <header class="header">
                <div class="header-title">
                    <h1>Dashboard</h1>
                    <p>Welcome back, <?php echo htmlspecialchars($_SESSION['full_name']); ?></p>
                </div>
                <div class="header-actions">
                    <div class="user-menu">
                        <div class="user-avatar"><?php echo strtoupper(substr($_SESSION['full_name'], 0, 2)); ?></div>
                        <div class="user-info">
                            <div class="name"><?php echo htmlspecialchars($_SESSION['full_name']); ?></div>
                            <div class="role"><?php echo ucfirst($_SESSION['role']); ?></div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="page-content">
                <!-- Stats Cards -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon blue">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <div class="stat-info">
                            <h3>Total Houses</h3>
                            <div class="value"><?php echo $totalHouses; ?></div>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon green">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <div class="stat-info">
                            <h3>Total Residents</h3>
                            <div class="value"><?php echo $totalResidents; ?></div>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon yellow">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                        <div class="stat-info">
                            <h3>Open Complaints</h3>
                            <div class="value"><?php echo $openComplaints; ?></div>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon red">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="stat-info">
                            <h3>Vacant Houses</h3>
                            <div class="value"><?php echo $vacantHouses; ?></div>
                        </div>
                    </div>
                </div>

                <!-- Charts -->
                <div class="charts-grid">
                    <div class="card">
                        <div class="card-header">
                            <h2>Residents per Block</h2>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="residentsChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h2>House Occupancy</h2>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="occupancyChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="charts-grid">
                    <div class="card">
                        <div class="card-header">
                            <h2>Complaint Status</h2>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="complaintsChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h2>Recent Complaints</h2>
                            <a href="complaints.php" class="btn btn-sm btn-secondary">View All</a>
                        </div>
                        <div class="card-body" style="padding: 0;">
                            <div class="table-container">
                                <table class="data-table">
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Block</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($recentComplaints as $complaint): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($complaint['subject']); ?></td>
                                            <td>Block <?php echo htmlspecialchars($complaint['block'] ?? 'N/A'); ?></td>
                                            <td>
                                                <?php
                                                $statusClass = [
                                                    'pending' => 'warning',
                                                    'in_progress' => 'info',
                                                    'resolved' => 'success'
                                                ][$complaint['status']] ?? 'secondary';
                                                ?>
                                                <span class="badge badge-<?php echo $statusClass; ?>">
                                                    <?php echo ucfirst(str_replace('_', ' ', $complaint['status'])); ?>
                                                </span>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- FIXED: Load charts.js FIRST, then update with real data -->
    <script src="../js/charts.js"></script>
    <script>
        // Update charts with REAL database data
        document.addEventListener('DOMContentLoaded', function() {
            // Residents per Block BAR CHART ✅
            updateChartData('residentsChart', 
                <?php echo json_encode(array_column($blockData, 'block')); ?>,
                <?php echo json_encode(array_map('intval', array_column($blockData, 'count'))); ?>
            );
            
            // House Occupancy PIE CHART ✅
            updateChartData('occupancyChart',
                <?php echo json_encode(array_map(function($item) {
                    return ucfirst($item['status']);
                }, $occupancyData)); ?>,
                <?php echo json_encode(array_map('intval', array_column($occupancyData, 'count'))); ?>
            );
            
            // Complaint Status DOUGHNUT CHART ✅
            updateChartData('complaintsChart',
                <?php echo json_encode(array_map(function($item) {
                    return ucfirst(str_replace('_', ' ', $item['status']));
                }, $complaintData)); ?>,
                <?php echo json_encode(array_map('intval', array_column($complaintData, 'count'))); ?>
            );
        });
    </script>
    <script src="../js/main.js"></script>
</body>
</html>