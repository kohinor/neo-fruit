<?php
require_once 'auth.php';

header('Content-Type: application/json');

$dataFile = __DIR__ . '/data/content.json';

// Initialize data file if it doesn't exist
if (!file_exists($dataFile)) {
    file_put_contents($dataFile, json_encode(array('sections' => array(), 'duplicated_sections' => array())));
}

// Load content
function loadContent() {
    global $dataFile;
    $content = file_get_contents($dataFile);
    return json_decode($content, true);
}

// Save content - PHP 5.6 compatible
function saveContent($data) {
    global $dataFile;
    // JSON_UNESCAPED_UNICODE not available in PHP 5.3, available in 5.4+
    if (defined('JSON_UNESCAPED_UNICODE')) {
        file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    } else {
        file_put_contents($dataFile, json_encode($data));
    }
}

// GET - Retrieve content
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $data = loadContent();
    echo json_encode($data);
    exit;
}

// Require authentication for POST, PUT, DELETE
requireAuth();

// POST - Save text content
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_content') {
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

http_response_code(400);
echo json_encode(array('error' => 'Invalid request'));
?>
