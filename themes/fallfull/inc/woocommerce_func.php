<?php

if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {

	//WooCommerce Support
	function modis_add_woocommerce_support()
	{
		add_theme_support('woocommerce');
	}
	add_action('after_setup_theme', 'modis_add_woocommerce_support');

	/*
	 * SHOP PAGE ===========================
	 */

	// Remove breadcrumbs
	remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

	// Removing the title
	remove_action('woocommerce_shop_loop_header', 'woocommerce_product_taxonomy_archive_header', 10);

	// Removing the default product counts
	remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);

	// Removing the default product order and sorting
	remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

	// Removing sidebars
	remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
}
