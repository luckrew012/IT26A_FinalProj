<?php
require_once 'config/database.php';
requireLogin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: complaints.php");
    exit;
}

$id = intval($_POST['id']);

try {
    $pdo = getConnection();
    $stmt = $pdo->prepare("DELETE FROM complaints WHERE id = ?");
    $stmt->execute([$id]);
    
    setFlashMessage('success', 'Complaint deleted successfully.');
} catch (PDOException $e) {
    setFlashMessage('danger', 'Failed to delete complaint.');
}

header("Location: complaints.php");
exit;
?>
