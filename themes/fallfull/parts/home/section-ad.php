<?php

$ad_video_url = get_field('ad_video_url');
$ad_subheading = get_field('ad_subheading');
$ad_heading = get_field('ad_heading');
$ad_description = get_field('ad_description');
$ad_btn_txt = get_field('ad_btn_txt');
$ad_btn_slug = get_field('ad_btn_slug');
?>
<div class="abt-section mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12">
				<div class="abt-bg" style="background-image: url(<?php echo esc_url(get_youtube_thumbnail($ad_video_url)); ?>);">
					<?php if ($ad_video_url) : ?>
						<a href="<?php echo esc_url($ad_video_url); ?>" class="video-play-btn popup-youtube"><i class="fas fa-play"></i></a>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-lg-6 col-md-12">
				<div class="abt-text">
					<?php if ($ad_subheading) : ?>
						<p class="top-sub"><?php echo esc_html($ad_subheading); ?></p>
					<?php endif; ?>

					<?php if ($ad_heading) : ?>
						<h2><?php echo fallfull_highlight_words(wp_kses_post($ad_heading), array('Fruitkha')); ?></h2>
					<?php endif; ?>

					<?php if ($ad_description) : ?>
						<p><?php echo esc_html($ad_description); ?></p>
					<?php endif; ?>

					<?php if ($ad_btn_txt && $ad_btn_slug) : ?>
						<a href="<?php echo esc_url(home_url('/' . $ad_btn_slug)); ?>" class="boxed-btn mt-4"><?php echo esc_html($ad_btn_txt); ?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>