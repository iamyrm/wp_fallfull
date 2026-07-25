<?php get_header(); ?>

<!-- breadcrumb-section -->
<?php get_template_part('parts/global/breadcrumb'); ?>
<!-- end breadcrumb section -->

<!-- search results -->
<div class="latest-news mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="search-header mb-4">
					<h2 class="search-title">
						<?php
						/* translators: %s: search query */
						printf(esc_html__('Search Results for: %s', 'textdomain'), '<span class="search-query">' . get_search_query() . '</span>');
						?>
					</h2>
					<?php if (have_posts()) : ?>
						<p class="search-results-count"><?php echo esc_html($wp_query->found_posts); ?> <?php esc_html_e('results found', 'textdomain'); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>

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

				<div class="col-lg-12">
					<div class="no-results text-center">
						<h3><?php esc_html_e('No Results Found', 'textdomain'); ?></h3>
						<p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'textdomain'); ?></p>
						<div class="search-form-wrapper mt-4">
							<?php get_search_form(); ?>
						</div>
					</div>
				</div>

			<?php endif; ?>
		</div>

		<!-- Pagination Row -->
		<?php if (have_posts()) : ?>
			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							<?php custom_numeric_pagination(); ?>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>
<!-- end search results -->

<!-- logo carousel -->
<?php echo get_template_part('parts/global/section', 'carousel'); ?>
<!-- end logo carousel -->

<?php get_footer(); ?>