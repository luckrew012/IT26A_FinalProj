<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../houses.php");
    exit();
}

$block = trim($_POST['block'] ?? '');
$lot = trim($_POST['lot'] ?? '');
$status = $_POST['status'] ?? 'Vacant';

if (empty($block) || empty($lot)) {
    header("Location: add_house.php?error=Please fill in all fields");
    exit();
}

// Check for duplicate
$stmt = $conn->prepare("SELECT id FROM houses WHERE block = ? AND lot = ?");
$stmt->bind_param("ss", $block, $lot);
$stmt->execute();

if ($stmt->get_result()->num_rows > 0) {
    header("Location: add_house.php?error=House at this Block and Lot already exists");
    exit();
}

$stmt = $conn->prepare("INSERT INTO houses (block, lot, status) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $block, $lot, $status);

if ($stmt->execute()) {
    header("Location: ../houses.php?success=House added successfully");
} else {
    header("Location: add_house.php?error=Failed to add house");
}
exit();
?>
