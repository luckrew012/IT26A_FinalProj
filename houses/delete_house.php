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

// Check if house has residents
$stmt = $conn->prepare("SELECT COUNT(*) as count FROM residents WHERE house_id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();

if ($result['count'] > 0) {
    header("Location: ../houses.php?error=Cannot delete house with assigned residents");
    exit();
}

$stmt = $conn->prepare("DELETE FROM houses WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: ../houses.php?success=House deleted successfully");
} else {
    header("Location: ../houses.php?error=Failed to delete house");
}
exit();
?>
