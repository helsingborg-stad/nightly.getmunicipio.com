<?php
/**
 * Replace blog domains to match local development domain.
 */

if ( !defined( 'SUNRISE_LOADED' ) ) {
	define( 'SUNRISE_LOADED', 1 );
}

$domain = $_SERVER[ 'HTTP_HOST' ];
$prefix = $wpdb->base_prefix;
$optionsTable = "${prefix}options";

$wpdb->query( $wpdb->prepare("UPDATE $wpdb->blogs SET domain = %s WHERE domain != %s", $domain, $domain) );
$wpdb->query( $wpdb->prepare("UPDATE $wpdb->site SET domain = %s WHERE domain != %s", $domain, $domain) );
$wpdb->query( $wpdb->prepare("UPDATE $wpdb->sitemeta SET meta_value = %s WHERE meta_key = 'siteurl' AND meta_value != %s", WP_SITEURL, WP_SITEURL) );
$wpdb->query( $wpdb->prepare("UPDATE $optionsTable SET option_value = %s WHERE option_name = 'siteurl' AND option_value != %s", WP_SITEURL, WP_SITEURL) );
$wpdb->query( $wpdb->prepare("UPDATE $optionsTable SET option_value = %s WHERE option_name = 'home' AND option_value != %s", WP_HOME, WP_HOME) );
