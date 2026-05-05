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

$id = (int)($_POST['id'] ?? 0);
$block = trim($_POST['block'] ?? '');
$lot = trim($_POST['lot'] ?? '');
$status = $_POST['status'] ?? 'Vacant';

if ($id <= 0 || empty($block) || empty($lot)) {
    header("Location: edit_house.php?id=$id&error=Please fill in all fields");
    exit();
}

// Check for duplicate (excluding current house)
$stmt = $conn->prepare("SELECT id FROM houses WHERE block = ? AND lot = ? AND id != ?");
$stmt->bind_param("ssi", $block, $lot, $id);
$stmt->execute();

if ($stmt->get_result()->num_rows > 0) {
    header("Location: edit_house.php?id=$id&error=House at this Block and Lot already exists");
    exit();
}

$stmt = $conn->prepare("UPDATE houses SET block = ?, lot = ?, status = ? WHERE id = ?");
$stmt->bind_param("sssi", $block, $lot, $status, $id);

if ($stmt->execute()) {
    header("Location: ../houses.php?success=House updated successfully");
} else {
    header("Location: edit_house.php?id=$id&error=Failed to update house");
}
exit();
?>
