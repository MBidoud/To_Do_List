<!-- Add Task Form -->
<?php
//   form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"] ?? "";
    $description = $_POST["description"] ?? "";
    $choice = $_POST["choice"] ?? "";
    $done = $choice;
// insert into database (example)
    $stmt = $conn->prepare("INSERT INTO tasks (title, description ,done ) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $title, $description, $done);
    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Task added successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
    }
            // Redirect back to the form page
            header("Location: index.php");  
            exit();
    $stmt->close();
}
?>