<?php
require_once 'config/database.php';
requireLogin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: complaints.php");
    exit;
}

$resident_id = intval($_POST['resident_id']);
$subject = sanitize($_POST['subject']);
$description = sanitize($_POST['description']);
$category = sanitize($_POST['category']);
$priority = sanitize($_POST['priority']);
$status = sanitize($_POST['status']);

try {
    $pdo = getConnection();
    $stmt = $pdo->prepare("
        INSERT INTO complaints (resident_id, subject, description, category, priority, status)
        VALUES (?, ?, ?, ?, ?, ?)
    ");
    $stmt->execute([$resident_id, $subject, $description, $category, $priority, $status]);
    
    setFlashMessage('success', 'Complaint filed successfully.');
} catch (PDOException $e) {
    setFlashMessage('danger', 'Failed to file complaint. Please try again.');
}

header("Location: complaints.php");
exit;
?>
