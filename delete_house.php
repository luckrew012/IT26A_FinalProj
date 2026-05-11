<?php
require_once 'database.php';
requireLogin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: houses.php");
    exit;
}

$id = intval($_POST['id']);

try {
    $pdo = getConnection();
    $stmt = $pdo->prepare("DELETE FROM houses WHERE id = ?");
    $stmt->execute([$id]);
    
    setFlashMessage('success', 'House deleted successfully.');
} catch (PDOException $e) {
    setFlashMessage('danger', 'Failed to delete house. It may have associated residents.');
}

header("Location: houses.php");
exit;
?>
