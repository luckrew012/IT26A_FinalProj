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

$stmt = $conn->prepare("DELETE FROM complaints WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: ../complaints.php?success=Complaint deleted successfully");
} else {
    header("Location: ../complaints.php?error=Failed to delete complaint");
}
exit();
?>
