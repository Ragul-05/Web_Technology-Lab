<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task_name = $_POST['task_name'];

    $stmt = $conn->prepare("INSERT INTO tasks (task_name) VALUES (?)");
    $stmt->bind_param("s", $task_name);
    $stmt->execute();
    $stmt->close();
}

header("Location: index.php");
exit();
?>
