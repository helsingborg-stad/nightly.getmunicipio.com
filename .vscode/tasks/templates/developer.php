<?php

/**
 * Domain
 */
$domain = $_SERVER['HTTP_HOST'];
define('WP_SITEURL', 'http://' . $domain . '/wp');
define('WP_HOME', 'http://' . $domain);

/**
 * Debug
 */
define('WP_DEBUG', (isset($_GET['debug']) ? true : false));
define('WP_DEBUG_LOG', true);
define('SUNRISE', true);

/**
 * Multisite
 */
define('WP_ALLOW_MULTISITE', true);

if (defined('WP_ALLOW_MULTISITE') && WP_ALLOW_MULTISITE) {
    define('MULTISITE', true);
    define('SUBDOMAIN_INSTALL', false);
    define('DOMAIN_CURRENT_SITE', $domain);
    define('PATH_CURRENT_SITE', '/');
    define('SITE_ID_CURRENT_SITE', 1);
    define('BLOG_ID_CURRENT_SITE', 1);
}

/**
 * Database
 */
define('DB_NAME', 'modul-test');
define('DB_USER', 'modul-test');
define('DB_PASSWORD', 'modul-test');
define('DB_HOST', '127.0.0.1');
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', '');
$table_prefix  = 'modul_test_';
