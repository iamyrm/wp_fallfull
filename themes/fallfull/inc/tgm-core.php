<?php
add_action('tgmpa_register', 'fallfull_register_required_plugins');

function fallfull_register_required_plugins()
{
	$plugins = array(

		// array(
		//    'name'               => 'FallFull Core Plugin',
		//    'slug'               => 'fallfull-core',
		//    'source'             => THEME_DIR . '/plugins/fallfull-core.zip',
		//    'required'           => true,
		//    'version'            => THEME_VERSION,
		//    'force_activation'   => false,
		//    'force_deactivation' => false,
		// ),

		array(
			'name'      => 'Advanced Custom Fields (ACF®)',
			'slug'      => 'advanced-custom-fields',
			'required'  => true,
		),

		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => false,
		),

		array(
			'name'      => 'WooCommerce',
			'slug'      => 'woocommerce',
			'required'  => true,
		)
	);

	$config = array(
		'id'           => 'fallfull',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	tgmpa($plugins, $config);
}
