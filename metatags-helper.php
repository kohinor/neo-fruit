<?php
/**
 * Metatags Helper - PHP 5.6 compatible
 *
 * Helper functions for loading and displaying metatags from JSON file
 *
 * Usage in PHP pages:
 * <?php
 * require_once 'metatags-helper.php';
 * loadMetatagsForPage('page-name'); // e.g., 'index', 'company', 'products'
 * ?>
 * Then use renderMetatags() in the <head> section
 */

// Global variable to store current page metatags
$GLOBALS['current_metatags'] = array();
$GLOBALS['current_page_name'] = '';

/**
 * Load metatags for a specific page
 *
 * @param string $pageName The page identifier (e.g., 'index', 'company')
 * @return bool Success status
 */
function loadMetatagsForPage($pageName = 'index') {
    $metaFile = __DIR__ . '/data/metatags.json';

    $GLOBALS['current_page_name'] = $pageName;

    if (!file_exists($metaFile)) {
        error_log('Metatags file not found: ' . $metaFile);
        return false;
    }

    $metaContent = @file_get_contents($metaFile);
    if ($metaContent === false) {
        error_log('Failed to read metatags file');
        return false;
    }

    $metaData = json_decode($metaContent, true);
    if (!$metaData || !isset($metaData['pages'][$pageName])) {
        error_log('Page metatags not found: ' . $pageName);
        return false;
    }

    $GLOBALS['current_metatags'] = $metaData['pages'][$pageName];
    return true;
}

/**
 * Get a metatag value with fallback
 *
 * @param string $key The metatag key
 * @param string $default The default value if key not found
 * @return string The metatag value (HTML escaped)
 */
function getMetatagValue($key, $default = '') {
    $metatags = $GLOBALS['current_metatags'];
    $value = isset($metatags[$key]) && !empty($metatags[$key]) ? $metatags[$key] : $default;
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

/**
 * Render all metatags for the current page
 * Call this function in your <head> section
 *
 * @param array $defaults Optional array of default values
 */
function renderMetatags($defaults = array()) {
    // Merge defaults
    $defaultMetatags = array_merge(array(
        'title' => 'НПК НЕОФРУТ',
        'meta_title' => 'НПК НЕОФРУТ',
        'description' => 'Производство натуральных фруктовых батончиков',
        'keywords' => 'фруктовые батончики, натуральные продукты',
        'author' => 'НПК НЕОФРУТ',
        'robots' => 'index, follow',
        'canonical' => 'https://neo-fruit.ru/',
        'og_type' => 'website',
        'og_url' => 'https://neo-fruit.ru/',
        'og_title' => 'НПК НЕОФРУТ',
        'og_description' => 'Производство натуральных фруктовых батончиков',
        'og_image' => 'https://neo-fruit.ru/images/hero.jpg',
        'og_locale' => 'ru_RU',
        'og_site_name' => 'НПК НЕОФРУТ',
        'twitter_card' => 'summary_large_image',
        'twitter_url' => 'https://neo-fruit.ru/',
        'twitter_title' => 'НПК НЕОФРУТ',
        'twitter_description' => 'Производство натуральных фруктовых батончиков',
        'twitter_image' => ''
    ), $defaults);

    // Output metatags
    ?>
        <!-- Primary Meta Tags -->
        <title><?php echo getMetatagValue('title', $defaultMetatags['title']); ?></title>
        <meta name="title" content="<?php echo getMetatagValue('meta_title', $defaultMetatags['meta_title']); ?>" />
        <meta name="description" content="<?php echo getMetatagValue('description', $defaultMetatags['description']); ?>" />
        <meta name="keywords" content="<?php echo getMetatagValue('keywords', $defaultMetatags['keywords']); ?>" />
        <meta name="author" content="<?php echo getMetatagValue('author', $defaultMetatags['author']); ?>" />
        <meta name="robots" content="<?php echo getMetatagValue('robots', $defaultMetatags['robots']); ?>" />
        <link rel="canonical" href="<?php echo getMetatagValue('canonical', $defaultMetatags['canonical']); ?>" />

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="<?php echo getMetatagValue('og_type', $defaultMetatags['og_type']); ?>" />
        <meta property="og:url" content="<?php echo getMetatagValue('og_url', $defaultMetatags['og_url']); ?>" />
        <meta property="og:title" content="<?php echo getMetatagValue('og_title', $defaultMetatags['og_title']); ?>" />
        <meta property="og:description" content="<?php echo getMetatagValue('og_description', $defaultMetatags['og_description']); ?>" />
        <meta property="og:image" content="<?php echo getMetatagValue('og_image', $defaultMetatags['og_image']); ?>" />
        <meta property="og:locale" content="<?php echo getMetatagValue('og_locale', $defaultMetatags['og_locale']); ?>" />
        <meta property="og:site_name" content="<?php echo getMetatagValue('og_site_name', $defaultMetatags['og_site_name']); ?>" />

        <!-- Twitter -->
        <meta property="twitter:card" content="<?php echo getMetatagValue('twitter_card', $defaultMetatags['twitter_card']); ?>" />
        <meta property="twitter:url" content="<?php echo getMetatagValue('twitter_url', $defaultMetatags['twitter_url']); ?>" />
        <meta property="twitter:title" content="<?php echo getMetatagValue('twitter_title', $defaultMetatags['twitter_title']); ?>" />
        <meta property="twitter:description" content="<?php echo getMetatagValue('twitter_description', $defaultMetatags['twitter_description']); ?>" />
        <?php
        $twitterImage = getMetatagValue('twitter_image', $defaultMetatags['twitter_image']);
        if (!empty($twitterImage)):
        ?>
        <meta property="twitter:image" content="<?php echo $twitterImage; ?>" />
        <?php endif; ?>
    <?php
}

/**
 * Include metatag editor scripts
 * Call this at the end of your page, before </body>
 */
function includeMetaEditorScripts() {
    ?>
        <link rel="stylesheet" href="meta-editor.css" />
        <script src="meta-editor.js"></script>
    <?php
}
