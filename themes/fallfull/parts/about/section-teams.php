<?php
global $fallfull_options;
$word = isset($fallfull_options['about-team-sec-text-color']) ? $fallfull_options['about-team-sec-text-color'] : '';
$highlight_words = $word ? array_map('trim', explode(',', $word)) : array();

$heading = get_field('about_team_heading', get_the_ID());
$desc = get_field('about_pg_teams_desc', get_the_ID());

?>

<div class="mt-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="section-title">
					<h3><?php echo fallfull_highlight_words(wp_kses_post($heading), $highlight_words); ?></h3>
					<p><?php echo esc_html($desc); ?></p>
				</div>
			</div>
		</div>

		<div class="row">
			<?php
			$team_args = array(
				'post_type'      => 'teams',
				'posts_per_page' => 3,
				'orderby'        => 'menu_order',
				'order'          => 'ASC'
			);

			$team_query = new WP_Query($team_args);
			$counter = 0;

			$social_media_config = array(
				1 => array(
					'field_key' => 'social_link_1',
					'icon'      => 'fab fa-facebook-f',
					'label'     => 'Facebook'
				),
				2 => array(
					'field_key' => 'social_link_2',
					'icon'      => 'fab fa-linkedin-in',
					'label'     => 'LinkedIn'
				),
				3 => array(
					'field_key' => 'social_link_3',
					'icon'      => 'fab fa-instagram',
					'label'     => 'Instagram'
				)
			);

			if ($team_query->have_posts()) :
				while ($team_query->have_posts()) : $team_query->the_post();
					$counter++;

					// Get featured image
					$featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
					$background_image = $featured_image_url ? $featured_image_url : THEME_URI . '/assets/images/avatar.jpg';

					// Get taxonomy terms (team_type)
					$terms = get_the_terms(get_the_ID(), 'team_type');
					$taxonomy_display = '';

					if ($terms && !is_wp_error($terms)) {
						$first_term = reset($terms);
						$taxonomy_display = $first_term->name;
					}

					$social_links = array();
					foreach ($social_media_config as $key => $config) {
						$social_url = get_field($config['field_key']);
						if (!empty($social_url)) {
							$social_links[] = array(
								'url'  => $social_url,
								'icon' => $config['icon'],
								'label' => $config['label']
							);
						}
					}

					$offset_class = ($counter == 3) ? 'offset-md-3 offset-lg-0' : '';
			?>
					<div class="col-lg-4 col-md-6 <?php echo esc_attr($offset_class); ?>">
						<div class="single-team-item">
							<div class="team-bg" style="background-image: url(<?php echo esc_url($background_image); ?>);"></div>
							<h4>
								<?php the_title(); ?>
								<?php if (!empty($taxonomy_display)) : ?>
									<span><?php echo esc_html($taxonomy_display); ?></span>
								<?php endif; ?>
							</h4>
							<ul class="social-link-team">
								<?php if (!empty($social_links)) : ?>
									<?php foreach ($social_links as $social) : ?>
										<li>
											<a href="<?php echo esc_url($social['url']); ?>" target="_blank" aria-label="<?php echo esc_attr($social['label']); ?>">
												<i class="<?php echo esc_attr($social['icon']); ?>"></i>
											</a>
										</li>
									<?php endforeach; ?>
								<?php endif; ?>
							</ul>
						</div>
					</div>
			<?php
				endwhile;
				wp_reset_postdata();
			else :
				echo '<div class="col-12"><p>No team members found.</p></div>';
			endif;
			?>
		</div>


	</div>
</div>