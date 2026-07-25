<?php get_header();

if (has_post_thumbnail()) {
	$img = get_the_post_thumbnail_url(get_the_ID(), 'full');
} else {
	$img = THEME_URI . '/assets/images/default-slide.jpg';
}

?>

<!-- breadcrumb-section -->
<?php get_template_part('parts/global/breadcrumb'); ?>
<!-- end breadcrumb section -->

<!-- single article section -->
<div class="mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="single-article-section">

					<div class="single-article-text">
						<div class="single-artcile-bg" style="background-image: url(<?php echo esc_url($img); ?>);"></div>
						<p class="blog-meta">
							<span class="author"><i class="fas fa-user"></i><?php echo esc_html(get_the_author_meta('display_name')); ?></span>
							<span class="date"><i class="fas fa-calendar"></i> <?php echo get_the_date('j F, Y'); ?></span>
						</p>
						<h2><?php the_title(); ?></h2>
						<?php the_content(); ?>
					</div>

					<!-- Dynamic Comments Template -->
					<?php
					if (comments_open() || get_comments_number()) {
						comments_template();
					}
					?>

				</div>
			</div>

			<div class="col-lg-4">
				<div class="sidebar-section">
					<div class="recent-posts">
						<h4>Recent Posts</h4>
						<ul>
							<?php
							$current_post_id = get_the_ID();
							$latest_posts_args = array(
								'posts_per_page' => 5,
								'post_type'      => 'post',
								'post_status'    => 'publish',
								'post__not_in'   => array($current_post_id),
							);

							$latest_posts_query = new WP_Query($latest_posts_args);

							if ($latest_posts_query->have_posts()) :
								while ($latest_posts_query->have_posts()) : $latest_posts_query->the_post();
							?>
									<li>
										<a href="<?php the_permalink(); ?>">
											<?php the_title(); ?>
										</a>
									</li>
								<?php
								endwhile;
								wp_reset_postdata();
							else :
								?>
								<li>No other recent posts found.</li>
							<?php endif; ?>
						</ul>

					</div>
					<div class="tag-section">
						<h4>Category</h4>
						<ul>
							<?php
							$categories = get_categories(array(
								'orderby'    => 'name',
								'order'      => 'ASC',
								'hide_empty' => true,
							));

							if (! empty($categories)) :
								foreach ($categories as $category) :
									$category_link = get_category_link($category->term_id);
							?>
									<li>
										<a href="<?php echo esc_url($category_link); ?>">
											<?php echo esc_html($category->name); ?>
										</a>
									</li>
								<?php
								endforeach;
							else :
								?>
								<li>No categories found.</li>
							<?php endif; ?>
						</ul>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end single article section -->

<!-- logo carousel -->
<?php echo get_template_part('parts/global/section', 'carousel'); ?>
<!-- end logo carousel -->

<?php get_footer(); ?>