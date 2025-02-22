<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to post a lost item.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_name = $_POST["item_name"];
    $description = $_POST["description"];
    $location = $_POST["location"];
    $user_id = $_SESSION["user_id"];

    $sql = "INSERT INTO item_lost (user_id, item_name, description, location, status) 
            VALUES ('$user_id', '$item_name', '$description', '$location', 'lost')";

    if ($conn->query($sql) === TRUE) {
        echo "Item posted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
$conn->close();
?>