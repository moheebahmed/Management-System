<?php
session_start();
include '../config/db.php';

$id = $_GET['id'];

if(isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    
    $sql = "UPDATE tasks SET title='$title', description='$description', status='$status' WHERE id=$id";
    $conn->query($sql);
    
    $_SESSION['message'] = 'Task updated successfully!';
    $_SESSION['msg_type'] = 'success';
    header('Location: ../index.php');
}

$sql = "SELECT * FROM tasks WHERE id=$id";
$result = $conn->query($sql);
$task = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <!-- <title>Edit Task</title> -->
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Task</h1>
        <div class="form-container">
            <form method="POST">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" value="<?php echo $task['title']; ?>" required>
                </div>
                
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description"><?php echo $task['description']; ?></textarea>
                </div>
                
                <div class="form-group">
                    <label>Status</label>
                    <select name="status">
                        <option value="pending" <?php if($task['status'] == 'pending') echo 'selected'; ?>>Pending</option>
                        <option value="in progress" <?php if($task['status'] == 'in progress') echo 'selected'; ?>>In Progress</option>
                        <option value="completed" <?php if($task['status'] == 'completed') echo 'selected'; ?>>Completed</option>
                    </select>
                </div>
                
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
                <a href="../index.php" class="back-link">Back</a>
            </form>
        </div>
    </div>
</body>
</html>
