<?php

/**
 * Pagination - Show numbered pagination for catalog pages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/pagination.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.3.0
 */

if (! defined('ABSPATH')) {
	exit;
}

$total   = isset($total) ? $total : wc_get_loop_prop('total_pages');
$current = isset($current) ? $current : wc_get_loop_prop('current_page');
$base    = isset($base) ? $base : esc_url_raw(str_replace(999999999, '%#%', remove_query_arg('add-to-cart', get_pagenum_link(999999999, false))));
$format  = isset($format) ? $format : '';

if ($total <= 1) {
	return;
}
?>
<div class="row">
	<div class="col-lg-12 text-center">
		<div class="pagination-wrap">
			<ul>
				<?php
				$pagination_args = apply_filters(
					'woocommerce_pagination_args',
					array(
						'base'      => $base,
						'format'    => $format,
						'add_args'  => false,
						'current'   => max(1, $current),
						'total'     => $total,
						'prev_text' => 'Prev',
						'next_text' => 'Next',
						'type'      => 'array',
						'end_size'  => 3,
						'mid_size'  => 3,
					)
				);

				$paginate_links = paginate_links($pagination_args);

				if (is_array($paginate_links)) {
					foreach ($paginate_links as $link) {
						// Preserve the link functionality while changing classes
						if (strpos($link, 'current') !== false) {
							// Replace span with a tag and add active class
							$link = preg_replace('/<span[^>]*class="[^"]*current[^"]*"[^>]*>([^<]*)<\/span>/', '<a class="active">$1</a>', $link);
						} else {
							// Keep the href and functionality, just remove page-numbers class
							$link = preg_replace('/class="[^"]*page-numbers[^"]*"/', '', $link);
						}
						echo '<li>' . $link . '</li>';
					}
				}
				?>
			</ul>
		</div>
	</div>
</div>