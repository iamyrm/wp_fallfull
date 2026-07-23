<div class="testimonail-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1 text-center">
				<div class="testimonial-sliders">

					<?php

					$testimonials = new WP_Query(array(
						'post_type' => 'testimonials',
						'posts_per_page' => 5,
						'orderby' => 'date',
						'order' => 'DESC'
					));

					if ($testimonials->have_posts()):
						while ($testimonials->have_posts()):
							$testimonials->the_post();

							$testimonials_subheading = get_field('testimonials_subheading');

							$feature_img = esc_url(get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'));
							$img = $feature_img ? $feature_img : THEME_URI . '/assets/images/avatar.jpg';
					?>

							<div class="single-testimonial-slider">
								<div class="client-avater">
									<img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
								</div>
								<div class="client-meta">
									<h3><?php the_title(); ?>&nbsp;<span><?php echo esc_html($testimonials_subheading); ?></span></h3>
									<p class="testimonial-body">
										<?php the_content(); ?>
									</p>
									<div class="last-icon">
										<i class="fas fa-quote-right"></i>
									</div>
								</div>
							</div>

					<?php endwhile;
						wp_reset_postdata();
					endif; ?>

				</div>
			</div>
		</div>
	</div>
</div>