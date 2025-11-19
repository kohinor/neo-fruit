<?php
// Disable error display to prevent HTML output before JSON
ini_set('display_errors', '0');
error_reporting(E_ALL);

require_once 'auth.php';

header('Content-Type: application/json');

$dataFile = __DIR__ . '/data/content.json';
$historyFile = __DIR__ . '/data/history.json';

// Initialize data file if it doesn't exist
if (!file_exists($dataFile)) {
    $result = @file_put_contents($dataFile, json_encode(array('sections' => array(), 'duplicated_sections' => array())));
    if ($result === false) {
        error_log('Failed to create content.json - check data directory permissions');
    }
}

// Load content
function loadContent() {
    global $dataFile;
    $content = file_get_contents($dataFile);
    return json_decode($content, true);
}

// Save content - PHP 5.6 compatible
function saveContent($data, $saveToHistory = true) {
    global $dataFile, $historyFile;

    // Save to history before updating current content
    if ($saveToHistory) {
        try {
            // Check if history file exists, if not create it
            if (!file_exists($historyFile)) {
                $result = @file_put_contents($historyFile, json_encode(array('versions' => array())));
                if ($result === false) {
                    error_log('Warning: Failed to create history.json - continuing without history');
                    // Continue without saving to history
                    $saveToHistory = false;
                }
            }

            if ($saveToHistory) {
                $historyContent = @file_get_contents($historyFile);
                if ($historyContent === false) {
                    error_log('Warning: Failed to read history.json - continuing without history');
                } else {
                    $history = json_decode($historyContent, true);

                    // Ensure proper structure
                    if (!is_array($history) || !isset($history['versions'])) {
                        $history = array('versions' => array());
                    }

                    // Add current state to history
                    $history['versions'][] = array(
                        'timestamp' => time(),
                        'date' => date('Y-m-d H:i:s'),
                        'data' => $data
                    );

                    // Keep only last 20 versions to avoid file bloat
                    if (count($history['versions']) > 20) {
                        $history['versions'] = array_slice($history['versions'], -20);
                    }

                    // Save history
                    if (defined('JSON_UNESCAPED_UNICODE')) {
                        @file_put_contents($historyFile, json_encode($history, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                    } else {
                        @file_put_contents($historyFile, json_encode($history));
                    }
                }
            }
        } catch (Exception $e) {
            error_log('Error saving to history: ' . $e->getMessage());
            // Continue even if history save fails
        }
    }

    // Save current content (this is critical, so we don't suppress errors)
    if (defined('JSON_UNESCAPED_UNICODE')) {
        $result = file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    } else {
        $result = file_put_contents($dataFile, json_encode($data));
    }

    if ($result === false) {
        throw new Exception('Failed to save content to file');
    }
}

// GET - Retrieve content or history
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Get version history
    if (isset($_GET['action']) && $_GET['action'] === 'get_history') {
        requireAuth();

        // Check if history file exists
        if (!file_exists($historyFile)) {
            echo json_encode(array('versions' => array()));
            exit;
        }

        $historyContent = file_get_contents($historyFile);
        $history = json_decode($historyContent, true);

        // Ensure proper structure
        if (!is_array($history) || !isset($history['versions'])) {
            $history = array('versions' => array());
        }

        echo json_encode($history);
        exit;
    }

    // Get current content
    $data = loadContent();
    echo json_encode($data);
    exit;
}

// Require authentication for POST, PUT, DELETE
requireAuth();

// POST - Save text content
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_content') {
    try {
        // PHP 5.6 compatible - no null coalescing operator
        $sectionId = isset($_POST['section_id']) ? $_POST['section_id'] : '';
        $content = isset($_POST['content']) ? $_POST['content'] : '';

        if (!$sectionId) {
            http_response_code(400);
            echo json_encode(array('error' => 'Section ID required'));
            exit;
        }

        $data = loadContent();
        $data['sections'][$sectionId] = $content;
        saveContent($data);

        echo json_encode(array('success' => true, 'section_id' => $sectionId));
        exit;
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(array('error' => 'Failed to save content: ' . $e->getMessage()));
        exit;
    }
}

// POST - Duplicate section
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'duplicate_section') {
    // PHP 5.6 compatible - no null coalescing operator
    $html = isset($_POST['html']) ? $_POST['html'] : '';
    $sectionId = isset($_POST['section_id']) ? $_POST['section_id'] : '';
    $afterSectionId = isset($_POST['after_section_id']) ? $_POST['after_section_id'] : '';

    if (!$html || !$sectionId) {
        http_response_code(400);
        echo json_encode(array('error' => 'HTML and section ID required'));
        exit;
    }

    // Generate new unique ID for duplicated section
    $newSectionId = $sectionId . '_copy_' . time();

    // Replace old section ID with new one in HTML
    $newHtml = str_replace('data-section-id="' . $sectionId . '"', 'data-section-id="' . $newSectionId . '"', $html);

    // Save to data
    $data = loadContent();

    // Ensure duplicated_sections array exists
    if (!isset($data['duplicated_sections'])) {
        $data['duplicated_sections'] = array();
    }

    // Save duplicated section HTML and position
    $data['duplicated_sections'][] = array(
        'section_id' => $newSectionId,
        'original_section_id' => $sectionId,
        'after_section_id' => $afterSectionId,
        'html' => $newHtml
    );

    // Copy all editable content from original section
    foreach ($data['sections'] as $key => $value) {
        if (strpos($key, $sectionId) === 0) {
            $newKey = str_replace($sectionId, $newSectionId, $key);
            $data['sections'][$newKey] = $value;
        }
    }

    saveContent($data);

    echo json_encode(array('success' => true, 'new_section_id' => $newSectionId, 'html' => $newHtml));
    exit;
}

// DELETE - Remove section
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete_section') {
    // PHP 5.6 compatible - no null coalescing operator
    $sectionId = isset($_POST['section_id']) ? $_POST['section_id'] : '';

    if (!$sectionId) {
        http_response_code(400);
        echo json_encode(array('error' => 'Section ID required'));
        exit;
    }

    $data = loadContent();

    // Remove all content related to this section
    foreach (array_keys($data['sections']) as $key) {
        if (strpos($key, $sectionId) === 0) {
            unset($data['sections'][$key]);
        }
    }

    // Remove from duplicated_sections if exists
    if (isset($data['duplicated_sections'])) {
        $data['duplicated_sections'] = array_values(array_filter($data['duplicated_sections'], function($section) use ($sectionId) {
            return $section['section_id'] !== $sectionId;
        }));
    }

    saveContent($data);

    echo json_encode(array('success' => true));
    exit;
}

// POST - Revert to previous version
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'revert_version') {
    $timestamp = isset($_POST['timestamp']) ? intval($_POST['timestamp']) : 0;

    if (!$timestamp) {
        http_response_code(400);
        echo json_encode(array('error' => 'Timestamp required'));
        exit;
    }

    // Check if history file exists
    if (!file_exists($historyFile)) {
        http_response_code(404);
        echo json_encode(array('error' => 'No version history available'));
        exit;
    }

    // Load history
    $historyContent = file_get_contents($historyFile);
    $history = json_decode($historyContent, true);

    if (!is_array($history) || !isset($history['versions'])) {
        http_response_code(404);
        echo json_encode(array('error' => 'No version history available'));
        exit;
    }

    // Find version by timestamp
    $versionData = null;
    foreach ($history['versions'] as $version) {
        if ($version['timestamp'] === $timestamp) {
            $versionData = $version['data'];
            break;
        }
    }

    if (!$versionData) {
        http_response_code(404);
        echo json_encode(array('error' => 'Version not found'));
        exit;
    }

    // Restore the version (save without adding to history to avoid duplication)
    saveContent($versionData, false);

    echo json_encode(array('success' => true, 'message' => 'Content reverted successfully'));
    exit;
}

http_response_code(400);
echo json_encode(array('error' => 'Invalid request'));
?>
