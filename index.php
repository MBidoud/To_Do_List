<?php
include 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4 ">

<!-- Add Task Form -->
<?php
//   form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"] ?? "";
    $description = $_POST["description"] ?? "";
    $choice = $_POST["choice"] ?? "";
    $done = $choice;
// insert into database (example)
    $stmt = $conn->prepare("INSERT INTO tasks (title, description , done) VALUES (?, ?, ?)");
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
        <!---------------------------------------------------------------------------------------------------------------------------------------------->
<h1 class="text-center  mb-4">To Do List Form</h1>

<!-- Add Task Form -->
<form action="" method="POST" class="mb-5">
    <div class="mb-3">
        <label class="form-label">Title:</label>
        <input type="text" name="title" id="tasktitle" placeholder="Enter Task Title"class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Description:</label>
        <textarea name="description" id="taskdescription" placeholder="Enter Task Description" class="form-control" rows="3" required></textarea>
    </div>

    <label class="form-label">Status:</label><br>
    <div class="btn-group mb-3" role="group">
        <input type="radio" class="btn-check" name="choice" id="create" value="0" autocomplete="off" required>
        <label class="btn btn-outline-primary" for="create">Create</label>

        <input type="radio" class="btn-check" name="choice" id="update" value="2" autocomplete="off">
        <label class="btn btn-outline-secondary" for="update">Update</label>

        <input type="radio" class="btn-check" name="choice" id="done" value="1" autocomplete="off">
        <label class="btn btn-outline-success" for="done">Done</label>
    </div><br>

    <button type="submit" class="btn btn-primary">Submit</button>

</form>

<!-- Display Tasks Table -->
<h2>All Tasks</h2>
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>--</th>
        </tr>
    </thead>
    <tbody>
<?php
$status_text = [
    0 => 'Not Done',
    1 => 'Done',
    2 => 'Updated',
];
$sql = "SELECT * FROM tasks ";
$result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['title']) . "</td>";
        echo "<td>" . nl2br(htmlspecialchars($row['description'])) . "</td>";
        echo "<td>" . ($row['done'] ? $status_text[$row['done']] : 'Not Done') . "</td>";
        echo "<td>  
            <form action=\"delete_task.php\" method=\"POST\" onsubmit=\"return confirm('Are you sure you want to delete this task?');\">
                <input type=\"hidden\" name=\"id\" value=\"" . htmlspecialchars($row['id']) . "\">
                <button type=\"submit\" class=\"btn btn-danger btn-sm\">Delete</button>
            </form>
        </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No tasks found.</td></tr>";
}

$sql = "DELETE FROM tasks WHERE done = 3";
$conn->query($sql);
?>

<!-- Bootstrap JS (optional for button styles) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>