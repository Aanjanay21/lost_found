<?php
$servername = "localhost";
$username = "root";
$password = "admin123";
$database = "lost_found";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>