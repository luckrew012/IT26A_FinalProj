<?php
require_once 'database.php';
requireLogin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: residents.php");
    exit;
}

$house_id = intval($_POST['house_id']);
$first_name = sanitize($_POST['first_name']);
$last_name = sanitize($_POST['last_name']);
$contact_number = sanitize($_POST['contact_number']);
$email = sanitize($_POST['email']);
$move_in_date = sanitize($_POST['move_in_date']);
$status = sanitize($_POST['status']);

try {
    $pdo = getConnection();
    $stmt = $pdo->prepare("
        INSERT INTO residents (house_id, first_name, last_name, contact_number, email, move_in_date, status)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt->execute([$house_id, $first_name, $last_name, $contact_number, $email, $move_in_date, $status]);
    
    setFlashMessage('success', 'Resident added successfully.');
} catch (PDOException $e) {
    setFlashMessage('danger', 'Failed to add resident. Please try again.');
}

header("Location: residents.php");
exit;
?>
