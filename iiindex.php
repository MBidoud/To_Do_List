<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
</head>
<body>

    <h1 class="mt-5">To Do Liiist Form</h1>


<form action="add_task.php" method="POST">
    <label>Title:</label><br>
    <input type="text" name="title" required><br><br>

    <label>Description:</label><br>
    <textarea name="description" required></textarea><br><br>

    <label>Status:</label><br>
    <input type="radio" name="choice" value="0" required> Create <br>
    <input type="radio" name="choice" value="0" required> Update <br>
    <input type="radio" name="choice" value="0" required> In Progress <br>
    <input type="radio" name="choice" value="1"> Done<br><br>

    <button type="submit">submit</button>
</form>

<!--
git remote add origin https://github.com/MBidoud/To_Do_List.git
git branch -M main
git push -u origin main
--> 
</body>
</html>