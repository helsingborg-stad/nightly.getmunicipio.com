<?php
/**
 * Replace blog domains to match local development domain.
 */

if ( !defined( 'SUNRISE_LOADED' ) ) {
	define( 'SUNRISE_LOADED', 1 );
}

$domain = $_SERVER[ 'HTTP_HOST' ];
$wpdb->query( $wpdb->prepare("UPDATE $wpdb->blogs SET domain = %s WHERE domain != %s", $domain, $domain) );