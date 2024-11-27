<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>To-Do List Application</title>
</head>
<body>
    <h1>To-Do List</h1>

    <!-- Add Task Form -->
    <form action="add_task.php" method="POST">
        <input type="text" name="task_name" placeholder="Enter new task" required>
        <button type="submit">Add Task</button>
    </form>

    <h2>Your Tasks</h2>
    <table border="1">
        <tr>
            <th>Task</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        <?php
        $sql = "SELECT * FROM tasks";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['task_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                echo "<td>
                    <a href='update_task.php?id=" . $row['id'] . "&status=" . ($row['status'] === 'pending' ? 'completed' : 'pending') . "'>Toggle Status</a> |
                    <a href='delete_task.php?id=" . $row['id'] . "'>Delete</a>
                </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No tasks found</td></tr>";
        }
        ?>
    </table>
</body>
</html>
