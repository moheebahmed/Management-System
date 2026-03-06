<?php
function render_header($title = 'Task Management System') {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($title); ?></title>
    <link rel="stylesheet" href="<?php echo strpos($_SERVER['PHP_SELF'], '/tasks/') !== false ? '../' : ''; ?>style.css">
</head>
<body>
    <div class="container">
        <h1><?php echo e($title); ?></h1>
<?php
}

function render_footer() {
?>
    </div>
</body>
</html>
<?php
}

function render_error($message) {
    if ($message) {
        echo "<div class='error'>" . e($message) . "</div>";
    }
}

function render_back_link($url, $text = 'Back to List') {
    echo "<a href='" . e($url) . "' class='back-link'>" . e($text) . "</a>";
}
?>
