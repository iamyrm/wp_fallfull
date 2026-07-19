<?php

// Adding Favicon if not added from admin panel
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
