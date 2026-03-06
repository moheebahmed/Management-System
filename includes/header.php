<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Task Management System</title> -->
    <?php
    // Determine CSS path based on current directory
    $css_path = (basename(dirname($_SERVER['PHP_SELF'])) === 'tasks') ? '../style.css' : 'style.css';
    ?>
    <link rel="stylesheet" href="<?php echo $css_path; ?>">
</head>
<body>
    <header>
        <div class="container">
            <h1>Task Management System</h1>
            <nav>
                <?php
  
                $home_path = (basename(dirname($_SERVER['PHP_SELF'])) === 'tasks') ? '../index.php' : 'index.php';
                $add_path = (basename(dirname($_SERVER['PHP_SELF'])) === 'tasks') ? 'add.php' : 'tasks/add.php';
                ?>
                <a href="<?php echo $home_path; ?>">Home</a>
                <a href="<?php echo $add_path; ?>">Add Task</a>
            </nav>
        </div>
    </header>
    <main class="container">
