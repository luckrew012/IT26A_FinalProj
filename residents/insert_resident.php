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

$name = trim($_POST['name'] ?? '');
$age = (int)($_POST['age'] ?? 0);
$gender = $_POST['gender'] ?? '';
$house_id = (int)($_POST['house_id'] ?? 0);
$role = $_POST['role'] ?? '';

if (empty($name) || $age <= 0 || empty($gender) || $house_id <= 0 || empty($role)) {
    header("Location: add_resident.php?error=Please fill in all fields");
    exit();
}

$stmt = $conn->prepare("INSERT INTO residents (name, age, gender, house_id, role) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sisss", $name, $age, $gender, $house_id, $role);

if ($stmt->execute()) {
    // Update house status to Occupied
    $conn->query("UPDATE houses SET status = 'Occupied' WHERE id = $house_id");
    header("Location: ../residents.php?success=Resident added successfully");
} else {
    header("Location: add_resident.php?error=Failed to add resident");
}
exit();
?>
