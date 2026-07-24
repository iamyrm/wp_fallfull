<?php

global $fallfull_options;
$word = isset($fallfull_options['about-features-sec-text-color']) ? $fallfull_options['about-features-sec-text-color'] : '';
$highlight_words = $word ? array_map('trim', explode(',', $word)) : array();

$heading = get_field('about_feature_heading', get_the_ID());

$img = get_field('about_pg_feature_img');
$features_img = get_the_post_thumbnail_url(get_the_ID(), 'full');

if (!empty($img)) {
	$background_url = $img;
} elseif (!empty($features_img)) {
	$background_url = $features_img;
} else {
	$background_url = THEME_URI . '/assets/images/default-slide.jpg';
}
?>

<style>
	.feature-bg:after {
		background-image: url(<?php echo esc_url($background_url); ?>);
	}
</style>



<div class="feature-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<div class="featured-text">
					<h2 class="pb-3"><?php echo fallfull_highlight_words(wp_kses_post($heading), $highlight_words); ?></h2>
					<div class="row">

						<?php
						$features = array(
							array(
								'icon'        => get_field('about_features_icon_heading1'),
								'heading'       => get_field('about_feature_topics1'),
								'desc'        => get_field('about_features_desc1'),
								'column_css'  => 'col-lg-6 col-md-6 mb-4 mb-md-5',
							),
							array(
								'icon'        => get_field('about_features_icon_heading2'),
								'heading'       => get_field('about_feature_topics2'),
								'desc'        => get_field('about_features_desc2'),
								'column_css'  => 'col-lg-6 col-md-6 mb-5 mb-md-5',
							),
							array(
								'icon'        => get_field('about_features_icon_heading3'),
								'heading'       => get_field('about_feature_topics3'),
								'desc'        => get_field('about_features_desc3'),
								'column_css'  => 'col-lg-6 col-md-6 mb-5 mb-md-5',
							),
							array(
								'icon'        => get_field('about_features_icon_heading4'),
								'heading'       => get_field('about_feature_topics4'),
								'desc'        => get_field('about_features_desc4'),
								'column_css'  => 'col-lg-6 col-md-6',
							),
						);


						foreach ($features as $feature) {
							// Skip if no content
							if (empty($feature['icon']) && empty($feature['heading']) && empty($feature['desc'])) {
								continue;
							}
						?>
							<div class="<?php echo esc_attr($feature['column_css']); ?>">
								<div class="list-box d-flex">
									<div class="list-icon">
										<i class="<?php echo esc_attr($feature['icon']); ?>"></i>
									</div>
									<div class="content">
										<h3><?php echo esc_html($feature['heading']); ?></h3>
										<p><?php echo esc_html($feature['desc']); ?></p>
									</div>
								</div>
							</div>
						<?php
						}
						?>


					</div>
				</div>
			</div>
		</div>
	</div>
</div>