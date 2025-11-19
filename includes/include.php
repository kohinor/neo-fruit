<?php
/**
 * Simple include helper for loading HTML partials
 * Usage: <?php include 'includes/include.php'; includePartial('navigation'); ?>
 */

function includePartial($name) {
    $file = __DIR__ . '/' . $name . '.html';
    if (file_exists($file)) {
        include $file;
    } else {
        echo "<!-- Include file not found: $file -->";
    }
}
?>
