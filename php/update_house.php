<?php
require_once 'config/database.php';
requireLogin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: houses.php");
    exit;
}

$id = intval($_POST['id']);
$house_number = sanitize($_POST['house_number']);
$block = sanitize($_POST['block']);
$street = sanitize($_POST['street']);
$house_type = sanitize($_POST['house_type']);
$area_sqm = floatval($_POST['area_sqm']);
$status = sanitize($_POST['status']);

try {
    $pdo = getConnection();
    $stmt = $pdo->prepare("
        UPDATE houses 
        SET house_number = ?, block = ?, street = ?, house_type = ?, area_sqm = ?, status = ?
        WHERE id = ?
    ");
    $stmt->execute([$house_number, $block, $street, $house_type, $area_sqm, $status, $id]);
    
    setFlashMessage('success', 'House updated successfully.');
} catch (PDOException $e) {
    setFlashMessage('danger', 'Failed to update house. Please try again.');
}

header("Location: houses.php");
exit;
?>
