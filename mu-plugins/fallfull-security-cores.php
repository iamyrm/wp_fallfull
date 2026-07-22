<?php

if (! defined('ABSPATH')) {
	exit;
}

/**
 * Disable Theme & Plugin Editor
 */

if (! defined('DISALLOW_FILE_EDIT')) {
	define('DISALLOW_FILE_EDIT', false);
}

if (! defined('DISALLOW_FILE_MODS')) {
	define('DISALLOW_FILE_MODS', false);
}

/**
 * Remove WordPress Version
 */

remove_action('wp_head', 'wp_generator');

/**
 * Remove Dashboard Widgets
 */

add_action('wp_dashboard_setup', function () {

	// remove_meta_box('dashboard_site_health', 'dashboard', 'normal');
	remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
	remove_meta_box('dashboard_primary', 'dashboard', 'side');
	remove_meta_box('dashboard_activity', 'dashboard', 'normal');
	remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
}, 999);

/**
 * Remove Admin Menu Items
 */

add_action('admin_menu', function () {

	// Dashboard > Updates
	// remove_submenu_page('index.php', 'update-core.php');

	// Comments
	// remove_menu_page('edit-comments.php');

	// Appearance
	// remove_menu_page('themes.php');

	// Plugins
	// remove_menu_page('plugins.php');

	// Tools
	remove_menu_page('tools.php');

	// Settings
	// remove_menu_page('options-general.php');

}, 999);
