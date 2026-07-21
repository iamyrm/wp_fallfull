<?php

/*
 * Adding Favicon if not added from admin panel
 */

function fallfull_add_custom_meta_tags()
{
	if (! has_site_icon()) {
?>
		<?php /* All your extra meta tags here */ ?>
		<link rel="shortcut icon" type="image/png" href="<?php echo home_url('/wp-content/uploads/2026/07/favicon.png'); ?>">
	<?php
	}
}
add_action('wp_head', 'fallfull_add_custom_meta_tags');

/*
 * Custom logo
 */
function fallfull_logo()
{
	?>
	<a href="<?php echo home_url('/'); ?>">
		<?php if (has_custom_logo()) :
			$custom_logo_id = get_theme_mod('custom_logo');
			$logo = wp_get_attachment_image_src($custom_logo_id, 'full'); ?>

			<img src="<?php echo esc_url($logo[0]); ?>" alt="<?php bloginfo('name'); ?> Logo" height="45" width="auto">

		<?php elseif (file_exists(ABSPATH . 'wp-content/uploads/2026/07/logo.png')) : ?>

			<img src="<?php echo home_url('/wp-content/uploads/2026/07/logo.png'); ?>" alt="<?php bloginfo('name'); ?> Logo" height="45" width="auto">

		<?php else : ?>

			<h2 class="fallfull-title"><?php bloginfo('name'); ?></h2>

		<?php endif; ?>
	</a>
<?php
}


/*
 * Add header icons to menu
 */
function add_header_icons_to_menu($items, $args)
{
	if ($args->theme_location == 'primary-menu') {
		$header_icons = '<li><div class="header-icons"><a class="shopping-cart" href="' . home_url('/cart') . '"><i class="fas fa-shopping-cart"></i></a><a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a></div></li>';
		$items .= $header_icons;
	}
	return $items;
}
add_filter('wp_nav_menu_items', 'add_header_icons_to_menu', 10, 2);

/*
 * Add custom class to li items
 */
function add_menu_item_classes($classes, $item, $args)
{
	if ($args->theme_location == 'primary-menu') {
		if (in_array('current-menu-item', $classes) || in_array('current-page-ancestor', $classes)) {
			$classes[] = 'current-list-item';
		}
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'add_menu_item_classes', 10, 3);


/*
 * Highlight Words 
 */

function fallfull_highlight_words($content, $words, $class = 'orange-text')
{
	if (empty($content) || empty($words)) {
		return $content;
	}

	// Convert to array if single word
	if (!is_array($words)) {
		$words = array($words);
	}

	// Sort by length descending to avoid partial matches
	usort($words, function ($a, $b) {
		return strlen($b) - strlen($a);
	});

	foreach ($words as $word) {
		$word = trim($word);
		if (empty($word)) {
			continue;
		}
		// Escape special regex characters
		$escaped_word = preg_quote($word, '/');
		// Replace word with highlighted version (case-insensitive)
		$content = preg_replace(
			'/' . $escaped_word . '/i',
			'<span class="' . esc_attr($class) . '">$0</span>',
			$content
		);
	}

	return $content;
}


/**
 * Display youtube video thumbnail
 */
function get_youtube_thumbnail($url, $quality = 'maxresdefault')
{
	if (empty($url)) {
		return '';
	}

	// Extract video ID from various YouTube URL formats
	$pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i';

	if (preg_match($pattern, $url, $matches)) {
		$video_id = $matches[1];
		return 'https://img.youtube.com/vi/' . $video_id . '/' . $quality . '.jpg';
	}

	return '';
}
