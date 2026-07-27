<?php

/**
 * Loop Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

global $product;


if ($product->is_type('simple')) {
	$price = $product->get_price();
	$currency = get_woocommerce_currency_symbol();
	$formatted_price = $currency . ' ' . number_format($price, 2);
} elseif ($product->is_type('variable')) {
	$min_price = $product->get_variation_price('min');
	$max_price = $product->get_variation_price('max');
	if ($min_price == $max_price) {
		$price = $min_price;
		$currency = get_woocommerce_currency_symbol();
		$formatted_price = $currency . ' ' . number_format($price, 2);
	} else {
		$currency = get_woocommerce_currency_symbol();
		$formatted_price = $currency . ' ' . number_format($min_price, 2) . ' - ' . $currency . ' ' . number_format($max_price, 2);
	}
} else {
	$price = $product->get_price();
	$currency = get_woocommerce_currency_symbol();
	$formatted_price = $currency . ' ' . number_format($price, 2);
}
?>

<p class="fallfull-product-price"><span>Per Kg</span> <?php echo $formatted_price; ?></p>