<div class="logo-carousel-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="logo-carousel-inner">

					<?php
					$carousels_query = new WP_Query(array(
						'post_type' => 'carousels',
						'posts_per_page' => -1,
						'orderby' => 'date',
						'order' => 'DESC'
					));

					if ($carousels_query->have_posts()):
						while ($carousels_query->have_posts()):
							$carousels_query->the_post();

							$feature_img = esc_url(get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'));
							$img = $feature_img ? $feature_img : THEME_URI . '/assets/images/strawberry.png';
					?>

							<div class="single-logo-item">
								<img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
							</div>

					<?php endwhile;
						wp_reset_postdata();
					endif; ?>

				</div>
			</div>
		</div>
	</div>
</div>