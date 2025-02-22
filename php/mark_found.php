<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    die("You must be logged in.");
}

if (isset($_GET['id'])) {
    $item_id = $_GET['id'];

    $sql = "UPDATE item_lost SET status='found' WHERE id='$item_id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Item marked as found!";
    } else {
        echo "Error: " . $conn->error;
    }
}
$conn->close();
?>