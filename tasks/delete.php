<?php
session_start();
include '../config/db.php';

$id = $_GET['id'];

$sql = "DELETE FROM tasks WHERE id=$id";
$conn->query($sql);

$_SESSION['message'] = 'Task deleted successfully!';
$_SESSION['msg_type'] = 'error';

header('Location: ../index.php');
?>
