<?php
require_once 'database.php';
requireLogin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: houses.php");
    exit;
}

$house_number = sanitize($_POST['house_number']);
$block = sanitize($_POST['block']);
$street = sanitize($_POST['street']);
$house_type = sanitize($_POST['house_type']);
$area_sqm = floatval($_POST['area_sqm']);
$status = sanitize($_POST['status']);

try {
    $pdo = getConnection();
    $stmt = $pdo->prepare("
        INSERT INTO houses (house_number, block, street, house_type, area_sqm, status)
        VALUES (?, ?, ?, ?, ?, ?)
    ");
    $stmt->execute([$house_number, $block, $street, $house_type, $area_sqm, $status]);
    
    setFlashMessage('success', 'House added successfully.');
} catch (PDOException $e) {
    if ($e->getCode() == 23000) {
        setFlashMessage('danger', 'House number already exists.');
    } else {
        setFlashMessage('danger', 'Failed to add house. Please try again.');
    }
}

header("Location: houses.php");
exit;
?>
