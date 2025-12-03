<?php
include 'db_connect.php';

// Debug: Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Debug: Check if POST data is received
    var_dump($_POST);

    // Retrieve the task ID from the POST request
    $id = $_POST["id"] ?? null;

    // Check if the ID is provided
    if ($id) {
        // Prepare the DELETE statement
        $stmt = $conn->prepare("DELETE FROM tasks WHERE id = ?");
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("i", $id);

        // Execute the statement and check for success
        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Task deleted successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "<div class='alert alert-danger'>Error: Task ID is missing.</div>";
    }

    // Redirect back to the main page
    header("Location: index.php");
    exit();
}
?>

<form action="delete_task.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?');">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
</form>