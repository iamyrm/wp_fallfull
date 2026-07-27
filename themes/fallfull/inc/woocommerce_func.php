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

	// Wrap product image in a div
	function wrap_product_image_in_div()
	{
?>
		<div class="fallfull-product-image">
		<?php
	}
	add_action('woocommerce_before_shop_loop_item_title', 'wrap_product_image_in_div', 5);

	function close_product_image_div()
	{
		?>
		</div>
<?php
	}
	add_action('woocommerce_before_shop_loop_item_title', 'close_product_image_div', 15);


	// Adding custom title for products archive

	// 1. First removing the default product title
	remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
	// 2. Creating a custom function to display the tiele
	function my_custom_title()
	{
		echo '<h3><a class="fallfull-prod-title" href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>';
	}
	// 3. passing the custom function into the woocommerce
	add_action('woocommerce_shop_loop_item_title', 'my_custom_title', 15);



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

	// Removing the content product link
	remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
	remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

	// Adding custom link to the image
	add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 5);
	add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 15);

	// Removing reviews and rating
	remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 10);
}
