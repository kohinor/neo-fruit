<?php
session_start();

// Simple authentication configuration
// In production, use proper password hashing and store in a secure location
define('ADMIN_USERNAME', 'admin');
// PHP 5.6 compatible - pre-hashed password for 'neofruit2025'
// To change password, use: php -r "echo password_hash('yourpassword', PASSWORD_DEFAULT);"
define('ADMIN_PASSWORD', '$2y$10$uo7gAPhx/KGE.jiAL8xZZenKQ.1x.bSDRrF8oIelGi10MfbKKAEtS');

function isLoggedIn() {
    return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

function requireAuth() {
    if (!isLoggedIn()) {
        http_response_code(401);
        echo json_encode(array('error' => 'Unauthorized'));
        exit;
    }
}

// Handle login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'login') {
    // PHP 5.6 compatible - no null coalescing operator
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if ($username === ADMIN_USERNAME && password_verify($password, ADMIN_PASSWORD)) {
        $_SESSION['admin_logged_in'] = true;
        echo json_encode(array('success' => true));
    } else {
        http_response_code(401);
        echo json_encode(array('error' => 'Invalid credentials'));
    }
    exit;
}

// Handle logout
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'logout') {
    session_destroy();
    echo json_encode(array('success' => true));
    exit;
}

// Check auth status
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['check'])) {
    echo json_encode(array('logged_in' => isLoggedIn()));
    exit;
}
?>
