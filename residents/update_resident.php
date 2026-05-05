<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../residents.php");
    exit();
}

$id = (int)($_POST['id'] ?? 0);
$name = trim($_POST['name'] ?? '');
$age = (int)($_POST['age'] ?? 0);
$gender = $_POST['gender'] ?? '';
$house_id = (int)($_POST['house_id'] ?? 0);
$role = $_POST['role'] ?? '';

if ($id <= 0 || empty($name) || $age <= 0 || empty($gender) || $house_id <= 0 || empty($role)) {
    header("Location: edit_resident.php?id=$id&error=Please fill in all fields");
    exit();
}

$stmt = $conn->prepare("UPDATE residents SET name = ?, age = ?, gender = ?, house_id = ?, role = ? WHERE id = ?");
$stmt->bind_param("sisssi", $name, $age, $gender, $house_id, $role, $id);

if ($stmt->execute()) {
    header("Location: ../residents.php?success=Resident updated successfully");
} else {
    header("Location: edit_resident.php?id=$id&error=Failed to update resident");
}
exit();
?>
