    update_task.php
<!-- Update Task Form -->
<?php
//   form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"] ?? "";
    $title = $_POST["title"] ?? "";
    $description = $_POST["description"] ?? "";
    $choice = $_POST["choice"] ?? "";
    $done = $choice;
// update database (example)
    $stmt = $conn->prepare("UPDATE tasks SET title = ?, description = ?, done = ? WHERE id = ?");
    $stmt->bind_param("ssii", $title, $description, $done, $id);
    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Task updated successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
    }
            // Redirect back to the form page
            header("Location: index.php");  
            exit();
    $stmt->close();
}
?>
<!-- Update Task Form HTML -->
<form action="" method="POST" class="mb-5">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id'] ?? ''); ?>">
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
    <button type="submit" class="btn btn-primary">Update Task</button>
</form>
    <?php 
    // Close the database connection
    $conn->close();
    ?>
<?php
$updated = false;
if(isset($_POST['update'])){
    // process update...
    $updated = true;
}
?>
<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php if($updated): ?>
<script>
Swal.fire("Updated!", "Your data has been updated.", "success");
</script>
<?php endif; ?>
<!-- Your HTML form -->
</body>
</html>
<?php
//   form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"] ?? "";
    $title = $_POST["title"] ?? "";
    $description = $_POST["description"] ?? "";
    $choice = $_POST["choice"] ?? "";
    $done = $choice;
// update database (example)

    $stmt = $conn->prepare("UPDATE tasks SET title = ?, description = ?, done = ? WHERE id = ?");
    $stmt->bind_param("ssii", $title, $description, $done, $id);
    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Task updated successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
    }
            // Redirect back to the form page
            header("Location: index.php");  
            exit();
    $stmt->close();
}
?>
<!-- Update Task Form HTML -->
<form action="" method="POST" class="mb-5">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id'] ?? ''); ?>">
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
    <button type="submit" class="btn btn-primary">Update Task</button>
</form>
    <?php 
    // Close the database connection
    $conn->close();
    ?>
<?php
$updated = false;   
if(isset($_POST['update'])){
    // process update...
    $updated = true;
}
?>
<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
