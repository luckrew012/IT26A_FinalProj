<?php
require_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.php");
    exit;
}

$username = sanitize($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

if (empty($username) || empty($password)) {
    setFlashMessage('danger', 'Please enter both username and password.');
    header("Location: login.php");
    exit;
}

try {
    $pdo = getConnection();
    // We select the password to compare it manually
    $stmt = $pdo->prepare("SELECT id, username, password, full_name, role FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // Plain text comparison: $password == $user['password']
    if ($user && $password === $user['password']) {
        // Login successful
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['full_name'] = $user['full_name'];
        $_SESSION['role'] = $user['role'];

        header("Location: dashboard.php");
        exit;
    } else {
        setFlashMessage('danger', 'Invalid username or password.');
        header("Location: login.php");
        exit;
    }
} catch (PDOException $e) {
    setFlashMessage('danger', 'An error occurred. Please try again.');
    header("Location: login.php");
    exit;
}