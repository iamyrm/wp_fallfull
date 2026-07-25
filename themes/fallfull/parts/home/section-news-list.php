<?php
// Custom Query - Display 3 posts
$custom_query = new WP_Query(array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => 3,
));

if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>

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
	wp_reset_postdata();
else : ?>
	<div class="col-md-12">
		<p><?php esc_html_e('No posts found.', THEME_TEXTDOMAIN); ?></p>
	</div>
<?php endif; ?>