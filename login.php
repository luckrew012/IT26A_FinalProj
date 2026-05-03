<?php
session_start();
include 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$result = $conn->query("SELECT * FROM users WHERE username='$username'");

if ($row = $result->fetch_assoc()) {
    if (password_verify($password, $row['password'])) {
        $_SESSION['user'] = $row['username'];
        header("Location: dashboard.php");
    } else {
        echo "Wrong password";
    }
} else {
    echo "User not found";
}
?>