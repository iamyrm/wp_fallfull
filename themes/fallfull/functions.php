<?php

// Define theme constants
define('THEME_VERSION', wp_get_theme()->get('Version'));
define('THEME_TEXTDOMAIN', wp_get_theme()->get('TextDomain'));
define('THEME_DIR', get_template_directory());
define('THEME_URI', get_template_directory_uri());

if (!defined('ABSPATH')) {
	exit;
}

require_once THEME_DIR . '/inc/site_func.php';

add_action('after_setup_theme', 'fallfull_setup');
function fallfull_setup()
{
	load_theme_textdomain('fallfull', get_template_directory() . '/languages');
	add_theme_support('title-tag');
	add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails');
	add_theme_support('custom-logo');
	add_theme_support('html5', array('search-form', 'comment-list', 'comment-form', 'gallery', 'caption', 'style', 'script', 'navigation-widgets'));
	add_theme_support('responsive-embeds');
	add_theme_support('align-wide');
	add_theme_support('wp-block-styles');
	add_theme_support('editor-styles');
	add_editor_style('editor-style.css');
	add_theme_support('appearance-tools');
	add_theme_support('woocommerce');
	global $content_width;
	if (!isset($content_width)) {
		$content_width = 1920;
	}
	register_nav_menus(array('main-menu' => esc_html__('Main Menu', 'fallfull')));
}


add_action('wp_enqueue_scripts', 'fallfull_enqueue');
function fallfull_enqueue()
{
	wp_enqueue_style('fallfull-style', get_stylesheet_uri());

	// Google Fonts
	wp_enqueue_style('google-fonts-open-sans', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,700', array(), null);
	wp_enqueue_style('google-fonts-poppins', 'https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap', array(), null);

	// Font Awesome
	wp_enqueue_style('font-awesome', THEME_URI . '/assets/css/all.min.css', array(), THEME_VERSION);

	// Bootstrap CSS
	wp_enqueue_style('bootstrap', THEME_URI . '/assets/bootstrap/css/bootstrap.min.css', array(), THEME_VERSION);

	// Owl Carousel
	wp_enqueue_style('owl-carousel', THEME_URI . '/assets/css/owl.carousel.css', array(), THEME_VERSION);

	// Magnific Popup
	wp_enqueue_style('magnific-popup', THEME_URI . '/assets/css/magnific-popup.css', array(), THEME_VERSION);

	// Animate CSS
	wp_enqueue_style('animate', THEME_URI . '/assets/css/animate.css', array(), THEME_VERSION);

	// Mean Menu
	wp_enqueue_style('meanmenu', THEME_URI . '/assets/css/meanmenu.min.css', array(), THEME_VERSION);

	// Main Style
	wp_enqueue_style('theme-main', THEME_URI . '/assets/css/main.css', array(), THEME_VERSION);

	// Responsive
	wp_enqueue_style('theme-responsive', THEME_URI . '/assets/css/responsive.css', array('theme-main'), THEME_VERSION);

	// jQuery 
	wp_enqueue_script('jquery-custom', THEME_URI . '/assets/js/jquery-1.11.3.min.js', array(), THEME_VERSION, true);

	// Bootstrap JS
	wp_enqueue_script('bootstrap', THEME_URI . '/assets/bootstrap/js/bootstrap.min.js', array('jquery-custom'), THEME_VERSION, true);

	// Countdown
	wp_enqueue_script('countdown', THEME_URI . '/assets/js/jquery.countdown.js', array('jquery-custom'), THEME_VERSION, true);

	// Isotope
	wp_enqueue_script('isotope', THEME_URI . '/assets/js/jquery.isotope-3.0.6.min.js', array('jquery-custom'), THEME_VERSION, true);

	// Waypoints
	wp_enqueue_script('waypoints', THEME_URI . '/assets/js/waypoints.js', array('jquery-custom'), THEME_VERSION, true);

	// Owl Carousel
	wp_enqueue_script('owl-carousel', THEME_URI . '/assets/js/owl.carousel.min.js', array('jquery-custom'), THEME_VERSION, true);

	// Magnific Popup
	wp_enqueue_script('magnific-popup', THEME_URI . '/assets/js/jquery.magnific-popup.min.js', array('jquery-custom'), THEME_VERSION, true);

	// Mean Menu
	wp_enqueue_script('meanmenu', THEME_URI . '/assets/js/jquery.meanmenu.min.js', array('jquery-custom'), THEME_VERSION, true);

	// Sticker JS
	wp_enqueue_script('sticker', THEME_URI . '/assets/js/sticker.js', array('jquery-custom'), THEME_VERSION, true);

	// Main JS
	wp_enqueue_script('theme-main-js', THEME_URI . '/assets/js/main.js', array('jquery-custom', 'bootstrap', 'owl-carousel', 'magnific-popup', 'meanmenu'), THEME_VERSION, true);

	// Comment reply script
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}

/**
 * Custom Body Classes
 */
function theme_body_classes($classes)
{
	// Adds a class of hfeed to non-singular pages
	if (!is_singular()) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter('body_class', 'theme_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts and pages
 */
function theme_pingback_header()
{
	if (is_singular() && pings_open()) {
		printf(
			'<link rel="pingback" href="%s">',
			esc_url(get_bloginfo('pingback_url'))
		);
	}
}
add_action('wp_head', 'theme_pingback_header');

/**
 * Custom Excerpt More
 */
function theme_excerpt_more($more)
{
	return '...';
}
add_filter('excerpt_more', 'theme_excerpt_more');

/**
 * Load Translation Files
 */
function theme_load_textdomain()
{
	load_theme_textdomain(THEME_TEXTDOMAIN, THEME_DIR . '/languages');
}
add_action('after_setup_theme', 'theme_load_textdomain');
