<?php
require_once 'config/database.php';
requireLogin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: complaints.php");
    exit;
}

$id = intval($_POST['id']);
$subject = sanitize($_POST['subject']);
$description = sanitize($_POST['description']);
$category = sanitize($_POST['category']);
$priority = sanitize($_POST['priority']);
$status = sanitize($_POST['status']);

// Set resolved date if status changed to resolved
$date_resolved = ($status === 'resolved') ? date('Y-m-d H:i:s') : null;

try {
    $pdo = getConnection();
    $stmt = $pdo->prepare("
        UPDATE complaints 
        SET subject = ?, description = ?, category = ?, priority = ?, status = ?, date_resolved = ?
        WHERE id = ?
    ");
    $stmt->execute([$subject, $description, $category, $priority, $status, $date_resolved, $id]);
    
    setFlashMessage('success', 'Complaint updated successfully.');
} catch (PDOException $e) {
    setFlashMessage('danger', 'Failed to update complaint. Please try again.');
}

header("Location: complaints.php");
exit;
?>
