<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to report a lost item.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_name = $_POST["item-name"];
    $category = $_POST["category"];
    $location = $_POST["location"];
    $contact = $_POST["contact"];
    $user_id = $_SESSION["user_id"];

    $sql = "INSERT INTO item_lost (user_id, item_name, category, location, contact, status) 
            VALUES ('$user_id', '$item_name', '$category', '$location', '$contact', 'lost')";

    if ($conn->query($sql) === TRUE) {
        echo "Item successfully reported!";
    } else {
        echo "Error: " . $conn->error;
    }
}
$conn->close();
?>