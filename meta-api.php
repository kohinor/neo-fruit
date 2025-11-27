<?php
// Disable error display to prevent HTML output before JSON
ini_set('display_errors', '0');
error_reporting(E_ALL);

require_once 'auth.php';

header('Content-Type: application/json');

$metaFile = __DIR__ . '/data/metatags.json';

// Initialize metatags file if it doesn't exist
if (!file_exists($metaFile)) {
    $defaultData = array(
        'pages' => array(
            'index' => array(
                'title' => '',
                'meta_title' => '',
                'description' => '',
                'keywords' => '',
                'author' => 'НПК НЕОФРУТ',
                'robots' => 'index, follow',
                'canonical' => '',
                'og_type' => 'website',
                'og_url' => '',
                'og_title' => '',
                'og_description' => '',
                'og_image' => '',
                'og_locale' => 'ru_RU',
                'og_site_name' => 'НПК НЕОФРУТ',
                'twitter_card' => 'summary_large_image',
                'twitter_url' => '',
                'twitter_title' => '',
                'twitter_description' => '',
                'twitter_image' => ''
            )
        )
    );
    $result = @file_put_contents($metaFile, json_encode($defaultData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    if ($result === false) {
        error_log('Failed to create metatags.json - check data directory permissions');
    }
}

// Load metatags
function loadMetatags() {
    global $metaFile;
    $content = @file_get_contents($metaFile);
    if ($content === false) {
        error_log('Failed to read metatags.json');
        return array('pages' => array());
    }
    return json_decode($content, true);
}

// Save metatags
function saveMetatags($data) {
    global $metaFile;

    // Ensure proper structure
    if (!isset($data['pages'])) {
        $data = array('pages' => $data);
    }

    $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    $result = @file_put_contents($metaFile, $json);

    if ($result === false) {
        error_log('Failed to save metatags.json');
        return false;
    }

    return true;
}

// Handle requests
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // GET request - return all metatags or specific page
    $page = isset($_GET['page']) ? $_GET['page'] : null;
    $data = loadMetatags();

    if ($page && isset($data['pages'][$page])) {
        echo json_encode(array(
            'success' => true,
            'page' => $page,
            'metatags' => $data['pages'][$page]
        ));
    } else {
        echo json_encode(array(
            'success' => true,
            'data' => $data
        ));
    }

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // POST request - requires authentication
    if (!isLoggedIn()) {
        http_response_code(401);
        echo json_encode(array('success' => false, 'error' => 'Требуется авторизация'));
        exit;
    }

    $input = file_get_contents('php://input');
    $requestData = json_decode($input, true);

    if (!$requestData) {
        echo json_encode(array('success' => false, 'error' => 'Неверный формат данных'));
        exit;
    }

    $action = isset($requestData['action']) ? $requestData['action'] : '';

    switch ($action) {
        case 'save':
            // Save metatags for a specific page
            $page = isset($requestData['page']) ? $requestData['page'] : '';
            $metatags = isset($requestData['metatags']) ? $requestData['metatags'] : array();

            if (empty($page)) {
                echo json_encode(array('success' => false, 'error' => 'Не указана страница'));
                exit;
            }

            $data = loadMetatags();
            $data['pages'][$page] = $metatags;

            if (saveMetatags($data)) {
                echo json_encode(array(
                    'success' => true,
                    'message' => 'Метатеги успешно сохранены',
                    'page' => $page
                ));
            } else {
                echo json_encode(array('success' => false, 'error' => 'Ошибка сохранения'));
            }
            break;

        case 'delete':
            // Delete metatags for a specific page
            $page = isset($requestData['page']) ? $requestData['page'] : '';

            if (empty($page)) {
                echo json_encode(array('success' => false, 'error' => 'Не указана страница'));
                exit;
            }

            $data = loadMetatags();

            if (isset($data['pages'][$page])) {
                unset($data['pages'][$page]);

                if (saveMetatags($data)) {
                    echo json_encode(array(
                        'success' => true,
                        'message' => 'Метатеги удалены',
                        'page' => $page
                    ));
                } else {
                    echo json_encode(array('success' => false, 'error' => 'Ошибка удаления'));
                }
            } else {
                echo json_encode(array('success' => false, 'error' => 'Страница не найдена'));
            }
            break;

        case 'list':
            // List all pages with metatags
            $data = loadMetatags();
            echo json_encode(array(
                'success' => true,
                'pages' => array_keys($data['pages'])
            ));
            break;

        default:
            echo json_encode(array('success' => false, 'error' => 'Неизвестное действие'));
            break;
    }

} else {
    http_response_code(405);
    echo json_encode(array('success' => false, 'error' => 'Метод не поддерживается'));
}
