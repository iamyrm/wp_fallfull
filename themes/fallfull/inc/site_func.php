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
