<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"]; // User input password

    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $stored_hash = $user['password'];

        // Call Python script to verify password
        $command = escapeshellcmd("python3 verify_password.py $stored_hash $password");
        $output = shell_exec($command);

        if (trim($output) === "Password Matched!") {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            header("Location: home.html");
        } else {
            echo "Invalid email or password.";
        }
    } else {
        echo "User not found.";
    }
}
$conn->close();
?>