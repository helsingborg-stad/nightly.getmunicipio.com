<?php

/**
 * Replace blog domains to match local development domain.
 */

namespace Sunrise;

function wpCliInstalled(): bool
{
	return !empty(shell_exec('wp --info'));
}

function getCurrentDomainFromDatabase(\wpdb $wpdb): string
{
	$domain = "";
	$prefix = $wpdb->base_prefix;
	$optionsTable = "${prefix}options";
	$home = $wpdb->get_var($wpdb->prepare("SELECT option_value FROM $optionsTable WHERE option_name = 'home'"));
	$wpdb->show_errors(true);

	if (empty($home)) {
		return $domain;
	}

	if (empty($parsedUrl = parse_url($home))) {
		return $domain;
	}

	$domain = $parsedUrl['host'];
	$domain .= !empty($parsedUrl['port']) ? ':' . $parsedUrl['port'] : '';

	return $domain;
}

function replaceDomain(\wpdb $wpdb, string $currentDomain, string $newDomain)
{
	shell_exec($wpdb->prepare("wp search-replace --url=%s %s %s --network --all-tables", $currentDomain, $currentDomain, $newDomain));
	shell_exec($wpdb->prepare("wp search-replace --url=%s %s %s --network --all-tables", $newDomain, "https://{$newDomain}", "http://$newDomain"));
}

function deactivatePlugins(\wpdb $wpdb)
{
	shell_exec($wpdb->prepare("wp plugin deactivate force-ssl redis-cache --network"));
	shell_exec($wpdb->prepare("wp plugin deactivate force-ssl redis-cache"));
	shell_exec($wpdb->prepare("wp cache flush"));
}

function flushKirkiFontCache(\wpdb $wpdb)
{
	$optionTablesString = shell_exec($wpdb->prepare("wp db tables %s --network", '*_options'));
	$optionTables = preg_split('/\s+/', $optionTablesString);

	foreach ($optionTables as $optionTable) {
		// Flush kirki font cache.
		$wpdb->query($wpdb->prepare("DELETE FROM $optionTable WHERE option_name = %s", 'kirki_downloaded_font_files'));
	}
}

function prepareDevelopmentEnvironment(\wpdb $wpdb)
{
	$currentDomain = getCurrentDomainFromDatabase($wpdb);
	$newDomain = $_SERVER['HTTP_HOST'];

	if ($currentDomain !== $newDomain) {
		replaceDomain($wpdb, $currentDomain, $newDomain);
		deactivatePlugins($wpdb);
		flushKirkiFontCache($wpdb);
	}
}

if (!defined('WP_CLI') && !defined('SUNRISE_LOADED')) {
	define('SUNRISE_LOADED', 1);

	if (!isset($wpdb)) {
		throw new \Error('$wpdb is not defined.');
	}

	if (!wpCliInstalled()) {
		throw new \Error('WP CLI was not found.');
	}

	prepareDevelopmentEnvironment($wpdb, $_SERVER['HTTP_HOST']);
}
