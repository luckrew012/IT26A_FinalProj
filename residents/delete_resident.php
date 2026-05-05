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

$stmt = $conn->prepare("DELETE FROM residents WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: ../residents.php?success=Resident deleted successfully");
} else {
    header("Location: ../residents.php?error=Failed to delete resident");
}
exit();
?>
