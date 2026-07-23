<?php

$title = "";
$display_subtitle = "";

if (has_post_thumbnail()) {
	$background_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
} else {
	$background_url = THEME_URI . '/assets/images/default-slide.jpg';
}

if (is_404()) { // 404 Page 
	$title = get_the_title() ? get_the_title() : '404 - Not Found';
	$subtitle =	get_post_meta(get_the_ID(), 'wp_page_subtitle', true);
	$display_subtitle = $subtitle ? $subtitle : 'Fresh and Organic';
} elseif (is_page('about')) { // About Page
	$title = get_the_title() ? get_the_title() : 'About Us';
	$subtitle =	get_post_meta(get_the_ID(), 'wp_page_subtitle', true);
	$display_subtitle = $subtitle ? $subtitle : 'We sale fresh fruits';
}

?>

<div class="breadcrumb-section" style=" background-image: url(<?php echo esc_url($background_url); ?>);">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p><?php echo esc_html($display_subtitle); ?></p>
					<h1><?php echo esc_html($title); ?></h1>
				</div>
			</div>
		</div>
	</div>
</div>