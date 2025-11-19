<?php
require_once 'auth.php';

// Require authentication
requireAuth();

header('Content-Type: application/json');

// Configuration
$uploadDir = __DIR__ . '/images/uploads/';
$allowedTypes = array('image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp');
$maxFileSize = 5 * 1024 * 1024; // 5MB

// Create upload directory if it doesn't exist
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

// Handle image upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $file = $_FILES['image'];

    // Check for upload errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
        http_response_code(400);
        echo json_encode(array('error' => 'Upload failed'));
        exit;
    }

    // Validate file type
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);

    if (!in_array($mimeType, $allowedTypes)) {
        http_response_code(400);
        echo json_encode(array('error' => 'Invalid file type. Only JPG, PNG, GIF, WEBP allowed'));
        exit;
    }

    // Validate file size
    if ($file['size'] > $maxFileSize) {
        http_response_code(400);
        echo json_encode(array('error' => 'File too large. Max 5MB'));
        exit;
    }

    // Generate unique filename
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = 'img_' . time() . '_' . uniqid() . '.' . $extension;
    $filepath = $uploadDir . $filename;

    // Move uploaded file
    if (move_uploaded_file($file['tmp_name'], $filepath)) {
        // Save to database
        $imageData = loadImageData();
        $imageId = isset($_POST['image_id']) ? $_POST['image_id'] : '';

        if ($imageId) {
            // Update existing image reference
            $imageData['images'][$imageId] = 'images/uploads/' . $filename;
            saveImageData($imageData);
        }

        echo json_encode(array(
            'success' => true,
            'filename' => $filename,
            'url' => 'images/uploads/' . $filename,
            'path' => $filepath
        ));
    } else {
        http_response_code(500);
        echo json_encode(array('error' => 'Failed to save file'));
    }
    exit;
}

// Get list of uploaded images
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['list'])) {
    $images = array();

    if (is_dir($uploadDir)) {
        $files = scandir($uploadDir);
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..' && is_file($uploadDir . $file)) {
                $images[] = array(
                    'filename' => $file,
                    'url' => 'images/uploads/' . $file,
                    'size' => filesize($uploadDir . $file),
                    'modified' => filemtime($uploadDir . $file)
                );
            }
        }
    }

    // Sort by modified time, newest first
    usort($images, function($a, $b) {
        return $b['modified'] - $a['modified'];
    });

    echo json_encode(array('images' => $images));
    exit;
}

// Delete image
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete') {
    $filename = isset($_POST['filename']) ? $_POST['filename'] : '';

    if (!$filename) {
        http_response_code(400);
        echo json_encode(array('error' => 'Filename required'));
        exit;
    }

    $filepath = $uploadDir . basename($filename); // basename for security

    if (file_exists($filepath) && is_file($filepath)) {
        if (unlink($filepath)) {
            echo json_encode(array('success' => true));
        } else {
            http_response_code(500);
            echo json_encode(array('error' => 'Failed to delete file'));
        }
    } else {
        http_response_code(404);
        echo json_encode(array('error' => 'File not found'));
    }
    exit;
}

// Load image data from JSON
function loadImageData() {
    $dataFile = __DIR__ . '/data/images.json';
    if (file_exists($dataFile)) {
        $content = file_get_contents($dataFile);
        return json_decode($content, true);
    }
    return array('images' => array());
}

// Save image data to JSON
function saveImageData($data) {
    $dataFile = __DIR__ . '/data/images.json';
    if (defined('JSON_UNESCAPED_UNICODE')) {
        file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    } else {
        file_put_contents($dataFile, json_encode($data));
    }
}

http_response_code(400);
echo json_encode(array('error' => 'Invalid request'));
?>
