<?php
/**
 * Setup Script for НЕО-ФРУТ CMS
 * Run this once to verify installation
 * PHP 5.6+ Compatible
 */

echo "<!DOCTYPE html>
<html lang='ru'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>НЕО-ФРУТ CMS - Setup</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #06a68a 0%, #0a8c72 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .container {
            background: white;
            border-radius: 20px;
            padding: 40px;
            max-width: 700px;
            width: 100%;
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.3);
        }
        h1 {
            color: #06a68a;
            margin-bottom: 30px;
            font-size: 2rem;
        }
        .check-item {
            padding: 15px;
            margin: 10px 0;
            border-radius: 10px;
            border-left: 4px solid #ddd;
            background: #f9f9f9;
        }
        .check-item.success {
            border-left-color: #06a68a;
            background: #eaf9ef;
        }
        .check-item.error {
            border-left-color: #e74c3c;
            background: #fee;
        }
        .check-item.warning {
            border-left-color: #f48a3a;
            background: #fff8f0;
        }
        .status {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .success .status { color: #06a68a; }
        .error .status { color: #e74c3c; }
        .warning .status { color: #f48a3a; }
        .info {
            margin-top: 30px;
            padding: 20px;
            background: #fff8f0;
            border-radius: 10px;
            border: 2px solid #f48a3a;
        }
        .info h2 {
            color: #f48a3a;
            margin-bottom: 15px;
            font-size: 1.25rem;
        }
        .info ul {
            margin-left: 20px;
        }
        .info li {
            margin: 5px 0;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 30px;
            background: #06a68a;
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn:hover {
            background: #0a8c72;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(6, 166, 138, 0.3);
        }
    </style>
</head>
<body>
    <div class='container'>
        <h1>🛠️ НЕО-ФРУТ CMS - Проверка установки</h1>";

$checks = array();

// Check PHP version
$phpVersion = phpversion();
$checks[] = array(
    'name' => 'Версия PHP',
    'status' => version_compare($phpVersion, '5.6.0', '>=') ? 'success' : 'error',
    'message' => "PHP $phpVersion " . (version_compare($phpVersion, '5.6.0', '>=') ? '✓' : '✗ (требуется PHP 5.6+)')
);

// Check data directory
$dataDir = __DIR__ . '/data';
$dataDirExists = is_dir($dataDir);
$dataDirWritable = $dataDirExists && is_writable($dataDir);

$checks[] = array(
    'name' => 'Директория данных',
    'status' => $dataDirExists ? 'success' : 'error',
    'message' => $dataDirExists ? "Директория /data существует ✓" : "Директория /data не найдена ✗"
);

$checks[] = array(
    'name' => 'Права на запись',
    'status' => $dataDirWritable ? 'success' : 'error',
    'message' => $dataDirWritable ? "Директория /data доступна для записи ✓" : "Нет прав на запись в /data ✗"
);

// Check content.json
$contentFile = $dataDir . '/content.json';
$contentExists = file_exists($contentFile);
$contentWritable = $contentExists && is_writable($contentFile);

$checks[] = array(
    'name' => 'Файл базы данных',
    'status' => $contentExists ? 'success' : 'warning',
    'message' => $contentExists ? "Файл content.json существует ✓" : "Файл content.json будет создан автоматически"
);

if ($contentExists) {
    $checks[] = array(
        'name' => 'Права на content.json',
        'status' => $contentWritable ? 'success' : 'error',
        'message' => $contentWritable ? "Файл доступен для записи ✓" : "Нет прав на запись в content.json ✗"
    );
}

// Check required files
$requiredFiles = array('auth.php', 'api.php', 'cms-editor.js', 'cms-editor.css', 'index.html');
foreach ($requiredFiles as $file) {
    $exists = file_exists(__DIR__ . '/' . $file);
    $checks[] = array(
        'name' => "Файл $file",
        'status' => $exists ? 'success' : 'error',
        'message' => $exists ? "$file найден ✓" : "$file отсутствует ✗"
    );
}

// Check sessions
$sessionStatus = session_status();
$checks[] = array(
    'name' => 'Поддержка сессий',
    'status' => $sessionStatus !== PHP_SESSION_DISABLED ? 'success' : 'error',
    'message' => $sessionStatus !== PHP_SESSION_DISABLED ? "Сессии PHP включены ✓" : "Сессии PHP отключены ✗"
);

// Check password_hash availability (PHP 5.5+)
$passwordHashAvailable = function_exists('password_hash') && function_exists('password_verify');
$checks[] = array(
    'name' => 'Функции password_hash',
    'status' => $passwordHashAvailable ? 'success' : 'error',
    'message' => $passwordHashAvailable ? "Функции хеширования паролей доступны ✓" : "Требуется PHP 5.5+ для password_hash ✗"
);

// Display results
foreach ($checks as $check) {
    echo "<div class='check-item {$check['status']}'>
            <div class='status'>{$check['name']}</div>
            <div>{$check['message']}</div>
          </div>";
}

// Check if all passed
$allPassed = true;
foreach ($checks as $check) {
    if ($check['status'] === 'error') {
        $allPassed = false;
        break;
    }
}

if ($allPassed) {
    echo "<div class='info'>
            <h2>✅ Установка завершена успешно!</h2>
            <p><strong>Учетные данные по умолчанию:</strong></p>
            <ul>
                <li>Логин: <strong>admin</strong></li>
                <li>Пароль: <strong>neofruit2025</strong></li>
            </ul>
            <p style='margin-top: 15px;'><strong>⚠️ ВАЖНО:</strong> Обязательно измените пароль!</p>
            <p style='margin-top: 10px;'>Для смены пароля выполните в консоли:</p>
            <p style='background: #f0f0f0; padding: 10px; border-radius: 5px; margin-top: 5px; font-family: monospace;'>
                php -r \"echo password_hash('новый_пароль', PASSWORD_DEFAULT);\"
            </p>
            <p style='margin-top: 5px;'>И замените значение ADMIN_PASSWORD в auth.php</p>
            <a href='index.html' class='btn'>Перейти на сайт →</a>
          </div>";
} else {
    echo "<div class='info'>
            <h2>❌ Обнаружены проблемы</h2>
            <p>Исправьте ошибки выше и обновите эту страницу.</p>
            <p style='margin-top: 15px;'><strong>Частые решения:</strong></p>
            <ul>
                <li>Выполните: <code>chmod 755 data/</code></li>
                <li>Выполните: <code>chmod 644 data/content.json</code></li>
                <li>Убедитесь, что все файлы загружены</li>
                <li>Обновите PHP до версии 5.6 или выше</li>
            </ul>
          </div>";
}

echo "    </div>
</body>
</html>";
?>
