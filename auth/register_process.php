<?php
session_start();
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../register.php");
    exit();
}

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

if (empty($username) || empty($password) || empty($confirm_password)) {
    header("Location: ../register.php?error=Please fill in all fields");
    exit();
}

if (strlen($username) < 3) {
    header("Location: ../register.php?error=Username must be at least 3 characters");
    exit();
}

if (strlen($password) < 6) {
    header("Location: ../register.php?error=Password must be at least 6 characters");
    exit();
}

if ($password !== $confirm_password) {
    header("Location: ../register.php?error=Passwords do not match");
    exit();
}

// Check if username exists
$stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();

if ($stmt->get_result()->num_rows > 0) {
    header("Location: ../register.php?error=Username already exists");
    exit();
}

// Create new user
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $hashed_password);

if ($stmt->execute()) {
    header("Location: ../login.php?success=Registration successful! Please login.");
    exit();
} else {
    header("Location: ../register.php?error=Registration failed. Please try again.");
    exit();
}
?>
