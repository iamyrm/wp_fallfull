<?php

$title = get_the_title();
$display_subtitle = get_post_meta(get_the_ID(), 'wp_page_subtitle', true);

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
} elseif (is_page('contact')) { // Contact Page
	$title = get_the_title() ? get_the_title() : 'Contact Us';
	$subtitle =	get_post_meta(get_the_ID(), 'wp_page_subtitle', true);
	$display_subtitle = $subtitle ? $subtitle : 'Get 24/7 Support';
} elseif (is_home()) {
	$blog_page_id = get_option('page_for_posts');
	$title = get_the_title($blog_page_id) ? get_the_title($blog_page_id) : 'Blog';
	$subtitle = get_post_meta($blog_page_id, 'wp_page_subtitle', true);
	$display_subtitle = $subtitle ? $subtitle : 'Our Latest News';

	if (has_post_thumbnail($blog_page_id)) {
		$background_url = get_the_post_thumbnail_url($blog_page_id, 'full');
	}
} elseif (is_search()) {
	$title = get_search_query();
	$subtitle = get_post_meta(get_the_ID(), 'wp_page_subtitle', true);
	$display_subtitle = $subtitle ? $subtitle : 'What are you looking for?';
} elseif (is_shop()) {
	$background_url = THEME_URI . '/assets/images/default-slide.jpg';
	$title = get_the_title(wc_get_page_id('shop')) ? get_the_title(wc_get_page_id('shop')) : 'Our Shop';
	$display_subtitle = 'All Fresh and Organis';
} elseif (function_exists('is_product') && is_product()) {
	$background_url = THEME_URI . '/assets/images/default-slide.jpg';
	$title = 'Product Details';
	$display_subtitle = 'All Fresh and Organics';
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