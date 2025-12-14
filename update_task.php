<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("UPDATE tasks SET title = ?, description = ? WHERE id = ?");
    $stmt->bind_param("ssi", $title, $description, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Task updated successfully!');</script>";
    } else {
        echo "<script>alert('Error updating task: " . $stmt->error . "');</script>";
    }

    $stmt->close();
    $conn->close();

    // Redirect back to the main page
    header("Location: index.php");
    exit();
}
?>