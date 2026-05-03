<?php
$conn = new mysqli("localhost", "root", "", "subdivision_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>