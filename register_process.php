<?php
require_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: register.php");
    exit;
}

$full_name = sanitize($_POST['full_name'] ?? '');
$username = sanitize($_POST['username'] ?? '');
$password = $_POST['password'] ?? ''; 
$confirm_password = $_POST['confirm_password'] ?? '';

if (empty($full_name) || empty($username) || empty($password)) {
    setFlashMessage('danger', 'All fields are required.');
    header("Location: register.php");
    exit;
}

if ($password !== $confirm_password) {
    setFlashMessage('danger', 'Passwords do not match.');
    header("Location: register.php");
    exit;
}

try {
    $pdo = getConnection();

    // Check if username already exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->fetch()) {
        setFlashMessage('danger', 'Username is already taken.');
        header("Location: register.php");
        exit;
    }

    // Save the plain text password directly
    $role = 'user'; 
    $stmt = $pdo->prepare("INSERT INTO users (full_name, username, password, role) VALUES (?, ?, ?, ?)");
    $stmt->execute([$full_name, $username, $password, $role]);

    setFlashMessage('success', 'Registration successful! You can now login.');
    header("Location: login.php");
    exit;

} catch (PDOException $e) {
    setFlashMessage('danger', 'Error: ' . $e->getMessage());
    header("Location: register.php");
    exit;
}