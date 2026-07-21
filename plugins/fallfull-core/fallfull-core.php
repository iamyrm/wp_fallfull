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

/*
 * Enqueuing custom imports
 */
function fallfull_core_plugin_enqueue_styles()
{
	// Custom Styles
	wp_enqueue_style('fallfull-core-styles', FALLFULL_CORE_URI . '/assets/css/style.css', array(), FALLFULL_CORE_VERSION, 'all');
}

add_action('wp_enqueue_scripts', 'fallfull_core_plugin_enqueue_styles');

// CPT
require_once FALLFULL_CORE_DIR . '/inc/cpt/cpt-testimonial.php';
require_once FALLFULL_CORE_DIR . '/inc/cpt/cpt-carousel.php';

// ACF Fields
require_once FALLFULL_CORE_DIR . '/inc/func.php';
require_once FALLFULL_CORE_DIR . '/inc/acf/home/section-hero.php';
require_once FALLFULL_CORE_DIR . '/inc/acf/home/section-features.php';
require_once FALLFULL_CORE_DIR . '/inc/acf/home/section-product-desc.php';
require_once FALLFULL_CORE_DIR . '/inc/acf/global/section-testimonials.php';
require_once FALLFULL_CORE_DIR . '/inc/acf/home/section-ad.php';
require_once FALLFULL_CORE_DIR . '/inc/acf/home/section-shop-banner.php';
require_once FALLFULL_CORE_DIR . '/inc/acf/home/section-news.php';
