<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple PHP MySQL App</title>
</head>
<body>

    <h1>Simple Web App</h1>

    <h2>Add a New Message</h2>
    <form method="POST" action="add_message.php">
        <input type="text" name="message" placeholder="Enter your message" required>
        <input type="submit" value="Add Message">
    </form>

    <h2>Messages</h2>
    <ul>
    <?php
    $sql = "SELECT id, message FROM messages";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output each message
        while($row = $result->fetch_assoc()) {
            echo "<li>" . $row['message'] . 
                 " <a href='delete_message.php?id=" . $row['id'] . "'>Delete</a></li>";
        }
    } else {
        echo "No messages found.";
    }

    $conn->close();
    ?>
    </ul>

</body>
</html>
