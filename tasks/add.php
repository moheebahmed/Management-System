<?php
session_start();
include '../config/db.php';

if(isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    
    $sql = "INSERT INTO tasks (title, description, status) VALUES ('$title', '$description', '$status')";
    $conn->query($sql);
    
    $_SESSION['message'] = 'Task added successfully!';
    $_SESSION['msg_type'] = 'success';
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <!-- <title>Add Task</title> -->
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h1>Add New Task</h1>
        <div class="form-container">
            <form method="POST">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" required>
                </div>
                
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description"></textarea>
                </div>
                
                <div class="form-group">
                    <label>Status</label>
                    <select name="status">
                        <option value="pending">Pending</option>
                        <option value="in progress">In Progress</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>
                
                <button type="submit" name="submit" class="btn btn-primary">Add Task</button>
                <a href="../index.php" class="back-link">Back</a>
            </form>
        </div>
    </div>
</body>
</html>
