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

	/*
	 * PRODUCT DETAILS PAGE ===========================
	 */

	// Removing flash sale discount form product details page
	remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);

	// Removing sidebar and upsell display from product details page
	remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
	remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);

	// 1. Remove the default WooCommerce product image gallery wrapper
	remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);

	// 2. Create your custom function to dynamically fetch and display the product image
	function fallfull_prod_detail_pg_custom_image()
	{
		global $product;

		// Check if we are safely inside a valid product context
		if (! is_a($product, 'WC_Product')) {
			return;
		}

		// Get the dynamic URL of the product's featured image
		$image_id  = $product->get_image_id();
		$image_url = $image_id ? wp_get_attachment_image_url($image_id, 'large') : wc_placeholder_img_src('large');
		$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);

		// Output your custom Bootstrap HTML structure
		echo '<div class="col-md-5">';
		echo '<div class="single-product-img">';
		echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($image_alt ? $image_alt : $product->get_name()) . '">';
		echo '</div>';
		echo '</div>';
	}

	// 3. Attach your custom layout function exactly where the old image was removed
	add_action('woocommerce_before_single_product_summary', 'fallfull_prod_detail_pg_custom_image', 20);

	// Custom title for product details page
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);

	function fallfull_prod_detail_title()
	{
		echo '<h3>' . get_the_title() . '</h3>';
	}
	add_action('woocommerce_single_product_summary', 'fallfull_prod_detail_title', 5);


	// Removing the rating from single detail page
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);

	// 1. Remove the default WooCommerce single product price template
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);

	function fallfull_prod_details_price()
	{
		global $product;

		if (! is_a($product, 'WC_Product')) {
			return;
		}

		$raw_price = $product->get_price();
		$formatted_price = (floatval($raw_price) == intval($raw_price)) ? intval($raw_price) : number_format($raw_price, 2);

		if ($formatted_price) {
			echo '<p class="single-product-pricing">';
			echo '<span>Per Kg</span>';
			echo 'Rs ' . esc_html($formatted_price);
			echo '</p>';
		}
	}
	add_action('woocommerce_single_product_summary', 'fallfull_prod_details_price', 10);

	// Displaying custom layout for excerpt
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);

	function fallfull_prod_details_excerpt()
	{
		echo '<p>' . wp_strip_all_tags(get_the_excerpt()) . '</p>';
	}
	add_action('woocommerce_single_product_summary', 'fallfull_prod_details_excerpt', 20);
}
