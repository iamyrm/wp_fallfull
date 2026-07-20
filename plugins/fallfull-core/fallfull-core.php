<?php
/*
Plugin Name: FallFull Core Plugin
Plugin URI: https://github.com/iamyrm/wp_fallfull
Description: Plugin for FallFull Theme
Version: 1.0.0
Author: Yagyaraj Majhi
Author URI: https://github.com/iamyrm
License: GPLv2 or later
Text Domain: fallfull-core
Domain Path: /languages
*/

// Prevent direct access
if (!defined('ABSPATH')) {
	exit;
}

// Plugin Constants
define('FALLFULL_CORE_VERSION', '1.0.0');
define('FALLFULL_CORE_DIR', plugin_dir_path(__FILE__));
define('FALLFULL_CORE_URI', plugin_dir_url(__FILE__));
define('FALLFULL_CORE_BASENAME', plugin_basename(__FILE__));
define('FALLFULL_CORE_TEXTDOMAIN', 'fallfull-core');

/**
 * Load Plugin Text Domain
 */
function fallfull_core_load_textdomain()
{
	load_plugin_textdomain(FALLFULL_CORE_TEXTDOMAIN, false, dirname(plugin_basename(__FILE__)) . '/languages');
}
add_action('plugins_loaded', 'fallfull_core_load_textdomain');

/**
 * Plugin Activation Hook
 */
function fallfull_core_activation()
{
	flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'fallfull_core_activation');

/**
 * Plugin Deactivation Hook
 */
function fallfull_core_deactivation()
{
	flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'fallfull_core_deactivation');

// Load required files
require_once FALLFULL_CORE_DIR . '/inc/acf/home/section-hero.php';
