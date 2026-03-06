<?php
session_start();
include 'config/db.php';

$sql = "SELECT * FROM tasks ORDER BY created_at DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <!-- <title>Task Manager</title> -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Task Management System</h1>
        
        <?php if(isset($_SESSION['message'])): ?>
            <div class="<?php echo $_SESSION['msg_type']; ?>">
                <?php echo $_SESSION['message']; ?>
            </div>
            <?php unset($_SESSION['message']); unset($_SESSION['msg_type']); ?>
        <?php endif; ?>
        
        <div class="top-bar">
            <a href="tasks/add.php" class="btn btn-primary">Add New Task</a>
        </div>

        <table>
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
            <?php 
            $no = 1;
            while($task = $result->fetch_assoc()): 
            ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $task['title']; ?></td>
                    <td><?php echo substr($task['description'], 0, 50); ?></td>
                    <td>
                        <span class="status-badge status-<?php echo str_replace(' ', '-', $task['status']); ?>">
                            <?php echo $task['status']; ?>
                        </span>
                    </td>
                    <td><?php echo date('Y-m-d', strtotime($task['created_at'])); ?></td>
                    <td>
                        <a href="tasks/edit.php?id=<?php echo $task['id']; ?>" class="btn btn-edit">Edit</a>
                        <a href="tasks/delete.php?id=<?php echo $task['id']; ?>" class="btn btn-delete" onclick="return confirm('Delete?');">Delete</a>
                    </td>
                </tr>
            <?php $no++; endwhile; ?>
        </table>
    </div>
</body>
</html>
