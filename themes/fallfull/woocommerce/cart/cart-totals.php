<?php

/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.3.6
 */

defined('ABSPATH') || exit;


do_action('woocommerce_before_cart_totals'); ?>

<div class="total-section">
	<table class="total-table shop_table shop_table_responsive">
		<thead class="total-table-head">
			<tr class="table-total-row">
				<th><?php esc_html_e('Total', 'woocommerce'); ?></th>
				<th><?php esc_html_e('Price', 'woocommerce'); ?></th>
			</tr>
		</thead>
		<tbody>

			<!-- Subtotal -->
			<tr class="total-data cart-subtotal">
				<td><strong><?php esc_html_e('Subtotal:', 'woocommerce'); ?></strong></td>
				<td data-title="<?php esc_attr_e('Subtotal', 'woocommerce'); ?>"><?php wc_cart_totals_subtotal_html(); ?></td>
			</tr>

			<!-- Coupons -->
			<?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>
				<tr class="total-data cart-discount coupon-<?php echo esc_attr(sanitize_title($code)); ?>">
					<td><strong><?php wc_cart_totals_coupon_label($coupon); ?></strong></td>
					<td data-title="<?php echo esc_attr(wc_cart_totals_coupon_label($coupon, false)); ?>"><?php wc_cart_totals_coupon_html($coupon); ?></td>
				</tr>
			<?php endforeach; ?>

			<!-- Shipping -->
			<?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>
				<?php do_action('woocommerce_cart_totals_before_shipping'); ?>
				<?php wc_cart_totals_shipping_html(); ?>
				<?php do_action('woocommerce_cart_totals_after_shipping'); ?>
			<?php endif; ?>

			<!-- Fees -->
			<?php foreach (WC()->cart->get_fees() as $fee) : ?>
				<tr class="total-data fee">
					<td><strong><?php echo esc_html($fee->name); ?>:</strong></td>
					<td data-title="<?php echo esc_attr($fee->name); ?>"><?php wc_cart_totals_fee_html($fee); ?></td>
				</tr>
			<?php endforeach; ?>

			<!-- Taxes -->
			<?php if (wc_tax_enabled() && ! WC()->cart->display_prices_including_tax()) : ?>
				<?php if ('itemized' === get_option('woocommerce_tax_total_display')) : ?>
					<?php foreach (WC()->cart->get_tax_totals() as $code => $tax) : ?>
						<tr class="total-data tax-rate tax-rate-<?php echo esc_attr(sanitize_title($code)); ?>">
							<td><strong><?php echo esc_html($tax->label); ?>:</strong></td>
							<td data-title="<?php echo esc_attr($tax->label); ?>"><?php echo wp_kses_post($tax->formatted_amount); ?></td>
						</tr>
					<?php endforeach; ?>
				<?php else : ?>
					<tr class="total-data tax-total">
						<td><strong><?php echo esc_html(WC()->countries->tax_or_vat()); ?>:</strong></td>
						<td data-title="<?php echo esc_attr(WC()->countries->tax_or_vat()); ?>"><?php wc_cart_totals_taxes_total_html(); ?></td>
					</tr>
				<?php endif; ?>
			<?php endif; ?>

			<?php do_action('woocommerce_cart_totals_before_order_total'); ?>

			<!-- Order Total -->
			<tr class="total-data order-total">
				<td><strong><?php esc_html_e('Total:', 'woocommerce'); ?></strong></td>
				<td data-title="<?php esc_attr_e('Total', 'woocommerce'); ?>"><?php wc_cart_totals_order_total_html(); ?></td>
			</tr>

			<?php do_action('woocommerce_cart_totals_after_order_total'); ?>
		</tbody>
	</table>

	<!-- Update Cart + Check Out buttons (identical styling) -->
	<div class="cart-buttons">
		<button type="submit" form="woocommerce-cart-form" class="fallfull-update-cart-btn" name="update_cart" value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>">
			<?php esc_html_e('Update Cart', 'woocommerce'); ?>
		</button>
		<a href="<?php echo esc_url(wc_get_checkout_url()); ?>" class="boxed-btn black checkout-button button alt wc-forward">
			<?php esc_html_e('Check Out', 'woocommerce'); ?>
		</a>
	</div>

	<?php // "Proceed to checkout" link removed on purpose — Check Out button already covers it. 
	?>
</div>

<!-- Coupon section -->
<?php if (wc_coupons_enabled()) : ?>
	<div class="coupon-section">
		<h3><?php esc_html_e('Apply Coupon', 'woocommerce'); ?></h3>
		<div class="coupon-form-wrap">
			<form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
				<p>
					<input type="text" name="coupon_code" class="input-text" id="coupon_code" placeholder="<?php esc_attr_e('Coupon', 'woocommerce'); ?>" value="" />
				</p>
				<p>
					<input type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e('Apply', 'woocommerce'); ?>" />
				</p>
				<?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
			</form>
		</div>
	</div>
<?php endif; ?>

<?php do_action('woocommerce_after_cart_totals'); ?>