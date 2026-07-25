<?php get_header(); ?>

<!-- breadcrumb-section -->
<?php get_template_part('parts/global/breadcrumb'); ?>
<!-- end breadcrumb section -->

<!-- latest news -->
<div class="latest-news mt-150 mb-150">
	<div class="container">
		<div class="row">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php
					// Fallback Logic for Featured Images
					if (has_post_thumbnail()) {
						$post_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
					} else {
						$post_image_url = THEME_URI . '/assets/images/default-slide.jpg';
					}
					?>

					<div class="col-lg-4 col-md-6">
						<div class="single-latest-news">
							<a href="<?php the_permalink(); ?>">
								<div class="latest-news-bg" style="background-image: url(<?php echo esc_url($post_image_url); ?>);"></div>
							</a>
							<div class="news-text-box">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<p class="blog-meta">
									<span class="author"><i class="fas fa-user"></i> <?php the_author(); ?></span>
									<span class="date"><i class="fas fa-calendar"></i> <?php echo get_the_date('j F, Y'); ?></span>
								</p>
								<p class="excerpt"><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
								<a href="<?php the_permalink(); ?>" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
							</div>
						</div>
					</div>

				<?php endwhile;
			else : ?>
				<div class="col-md-12">
					<p><?php esc_html_e('No posts found.', 'textdomain'); ?></p>
				</div>
			<?php endif; ?>
		</div>

		<!-- Pagination Row -->
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<?php custom_numeric_pagination(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- end latest news -->

<!-- logo carousel -->
<?php echo get_template_part('parts/global/section', 'carousel'); ?>
<!-- end logo carousel -->

<?php get_footer(); ?>