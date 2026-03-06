<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Helper functions for common tasks

/**
 * Sanitize and escape output
 */
function e($string) {
    return htmlspecialchars($string ?? '', ENT_QUOTES, 'UTF-8');
}

/**
 * Set flash message
 */
function set_flash($type, $message) {
    $_SESSION['flash_type'] = $type;
    $_SESSION['flash_message'] = $message;
}

/**
 * Get and clear flash message
 */
function get_flash() {
    if (isset($_SESSION['flash_message'])) {
        $type = $_SESSION['flash_type'] ?? 'success';
        $message = $_SESSION['flash_message'];
        unset($_SESSION['flash_type'], $_SESSION['flash_message']);
        return ['type' => $type, 'message' => $message];
    }
    return null;
}

/**
 * Display flash message
 */
function show_flash() {
    $flash = get_flash();
    if ($flash) {
        $class = $flash['type'];
        if ($class === 'deleted') {
            $class = 'error'; // Use red background for delete
        } elseif ($class !== 'error') {
            $class = 'success'; // Green for success
        }
        echo "<div class='$class'>" . e($flash['message']) . "</div>";
    }
}

/**
 * Redirect to a page
 */
function redirect($url) {
    header("Location: $url");
    exit;
}

/**
 * Get POST data safely
 */
function post($key, $default = '') {
    return trim($_POST[$key] ?? $default);
}

/**
 * Get GET data safely
 */
function get($key, $default = '') {
    return trim($_GET[$key] ?? $default);
}

/**
 * Validate required fields
 */
function validate_required($fields) {
    $errors = [];
    foreach ($fields as $field => $label) {
        if (empty(post($field))) {
            $errors[] = "$label is required.";
        }
    }
    return $errors;
}

/**
 * Execute prepared statement
 */
function db_execute($conn, $sql, $types, $params) {
    $stmt = $conn->prepare($sql);
    if ($types && $params) {
        $stmt->bind_param($types, ...$params);
    }
    $stmt->execute();
    return $stmt;
}

/**
 * Fetch single row
 */
function db_fetch_one($conn, $sql, $types = null, $params = null) {
    $stmt = db_execute($conn, $sql, $types, $params);
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
    return $row;
}

/**
 * Fetch all rows
 */
function db_fetch_all($conn, $sql, $types = null, $params = null) {
    $stmt = db_execute($conn, $sql, $types, $params);
    $result = $stmt->get_result();
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $rows;
}

/**
 * Format date nicely
 */
function format_date($date, $format = 'Y-m-d H:i') {
    return date($format, strtotime($date));
}

/**
 * Get status badge HTML
 */
function status_badge($status) {
    $class = 'status-' . str_replace(' ', '-', strtolower($status));
    return "<span class='status-badge $class'>" . e($status) . "</span>";
}

/**
 * Truncate text
 */
function truncate($text, $length = 50) {
    return strlen($text) > $length ? substr($text, 0, $length) . '...' : $text;
}
?>
