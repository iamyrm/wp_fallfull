<?php

/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     9.7.0
 */

use Automattic\WooCommerce\Enums\ProductType;

if (! defined('ABSPATH')) {
	exit;
}

global $product;
?>
<div class="product_meta">

	<?php do_action('woocommerce_product_meta_start'); ?>

	<?php if (wc_product_sku_enabled() && ($product->get_sku() || $product->is_type(ProductType::VARIABLE))) : ?>

		<span class="sku_wrapper"><?php esc_html_e('SKU:', 'woocommerce'); ?> <span class="sku"><?php echo ($sku = $product->get_sku()) ? $sku : esc_html__('N/A', 'woocommerce'); ?></span></span>

	<?php endif; ?>

	<?php echo wc_get_product_category_list($product->get_id(), ', ', '<span class="posted_in"><strong>' . _n('Category:', 'Categories:', count($product->get_category_ids()), 'woocommerce') . '<span class="fallfull_comma"> ', '</span></strong></span>'); ?>


	<h4>Share:</h4>
	<ul class="product-share">
		<?php
		global $product;
		$share_url   = urlencode(get_permalink());
		$share_title = urlencode(get_the_title());
		?>

		<li>
			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_url; ?>"
				target="_blank" rel="noopener noreferrer"
				aria-label="Share on Facebook">
				<i class="fab fa-facebook-f"></i>
			</a>
		</li>

		<li>
			<a href="https://twitter.com/intent/tweet?url=<?php echo $share_url; ?>&text=<?php echo $share_title; ?>"
				target="_blank" rel="noopener noreferrer"
				aria-label="Share on Twitter">
				<i class="fab fa-twitter"></i>
			</a>
		</li>

		<li>
			<a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $share_url; ?>"
				target="_blank" rel="noopener noreferrer"
				aria-label="Share on LinkedIn">
				<i class="fab fa-linkedin"></i>
			</a>
		</li>

		<li>
			<a href="https://api.whatsapp.com/send?text=<?php echo $share_title . '%20' . $share_url; ?>"
				target="_blank" rel="noopener noreferrer"
				aria-label="Share on WhatsApp">
				<i class="fab fa-whatsapp"></i>
			</a>
		</li>
	</ul>

	<?php do_action('woocommerce_product_meta_end'); ?>

</div>