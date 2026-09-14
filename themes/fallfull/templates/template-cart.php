<?php
/*
Template Name: Cart Template
*/

get_header();

get_template_part('parts/global/breadcrumb');
?>

<div class="cart-section mt-150 mb-150">
	<div class="container">
		<div class="row">

			<?php if (WC()->cart->is_empty()) : ?>

				<?php wc_get_template('cart/cart-empty.php'); ?>

			<?php else : ?>

				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<?php wc_get_template('cart/cart.php'); ?>
					</div>
				</div>

				<div class="col-lg-4">
					<?php
					do_action('woocommerce_before_cart_collaterals');
					wc_get_template('cart/cart-totals.php');
					do_action('woocommerce_after_cart_collaterals');
					?>
				</div>

			<?php endif; ?>

		</div>
	</div>
</div>

<?php
get_template_part('parts/global/section', 'carousel');
get_footer();
