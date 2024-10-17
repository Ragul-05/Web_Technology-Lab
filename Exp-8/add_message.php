<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = $_POST['message'];

    if (!empty($message)) {
        $sql = "INSERT INTO messages (message) VALUES ('$message')";
        if ($conn->query($sql) === TRUE) {
            echo "New message added successfully";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Message cannot be empty";
    }

    $conn->close();
    header("Location: index.php");
    exit();
}
?>
