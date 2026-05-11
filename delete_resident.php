<?php
require_once 'database.php';
requireLogin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: residents.php");
    exit;
}

$id = intval($_POST['id']);

try {
    $pdo = getConnection();
    $stmt = $pdo->prepare("DELETE FROM residents WHERE id = ?");
    $stmt->execute([$id]);
    
    setFlashMessage('success', 'Resident deleted successfully.');
} catch (PDOException $e) {
    setFlashMessage('danger', 'Failed to delete resident. They may have associated complaints.');
}

header("Location: residents.php");
exit;
?>
