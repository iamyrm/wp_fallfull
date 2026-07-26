<div class="row">
	<div class="col-md-12">
		<div class="product-filters">
			<ul>
				<?php
				// Get all product categories
				$product_categories = get_terms(array(
					'taxonomy'   => 'product_cat',
					'hide_empty' => true,
					'orderby'    => 'name',
					'order'      => 'ASC',
				));

				// Get current category if on category page
				$current_cat = get_queried_object();
				$current_slug = (is_product_category() && isset($current_cat->slug)) ? $current_cat->slug : '';

				// Display "All" category as active if on shop page
				$all_active = (! is_product_category() && ! is_product_tag() && ! is_search()) ? 'active fallfull_white' : '';
				echo '<li class="' . esc_attr($all_active) . '"><a href="' . esc_url(get_permalink(wc_get_page_id('shop'))) . '">All</a></li>';

				// Loop through categories and display them
				if (! empty($product_categories) && ! is_wp_error($product_categories)) {
					foreach ($product_categories as $category) {
						$active_class = ($current_slug === $category->slug) ? 'active fallfull_white' : '';
						$category_link = get_term_link($category);
						if (! is_wp_error($category_link)) {
							echo '<li class="' . esc_attr($active_class) . '"><a href="' . esc_url($category_link) . '">' . esc_html($category->name) . '</a></li>';
						}
					}
				}
				?>
			</ul>
		</div>
	</div>
</div>