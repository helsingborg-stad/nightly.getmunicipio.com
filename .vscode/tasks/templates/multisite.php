<?php

/**
 * Domain
 */
$domain = $_SERVER['HTTP_HOST'];
define('WP_SITEURL', 'http://' . $domain . '/wp');
define('WP_HOME', 'http://' . $domain);

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
