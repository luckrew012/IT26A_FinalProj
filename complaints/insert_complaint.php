<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../complaints.php");
    exit();
}

$resident_id = (int)($_POST['resident_id'] ?? 0);
$description = trim($_POST['description'] ?? '');
$status = $_POST['status'] ?? 'Pending';

if ($resident_id <= 0 || empty($description)) {
    header("Location: add_complaint.php?error=Please fill in all fields");
    exit();
}

$stmt = $conn->prepare("INSERT INTO complaints (resident_id, description, status) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $resident_id, $description, $status);

if ($stmt->execute()) {
    header("Location: ../complaints.php?success=Complaint added successfully");
} else {
    header("Location: add_complaint.php?error=Failed to add complaint");
}
exit();
?>
