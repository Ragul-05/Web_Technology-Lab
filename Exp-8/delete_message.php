<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM messages WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Message deleted successfully";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
    header("Location: index.php");
    exit();
}
?>