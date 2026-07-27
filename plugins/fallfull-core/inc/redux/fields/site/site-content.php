<?php

/**
 * Redux Framework text config.
 * For full documentation, please visit: https://devs.redux.io/
 *
 * @package Redux Framework
 */

// phpcs:disable
defined('ABSPATH') || exit;


$other_fields = array(
	array(
		'id'       => 'fallfull_site_address',
		'type'     => 'text',
		'title'    => esc_html__('Site Address', FALLFULL_CORE_TEXTDOMAIN),
		'subtitle' => esc_html__('Enter the address of your organizatio', FALLFULL_CORE_TEXTDOMAIN),
		'desc'     => esc_html__('Enter the address of your organizatio', FALLFULL_CORE_TEXTDOMAIN),
		'default'  => '',
	),
	array(
		'id'       => 'fallfull_site_email',
		'type'     => 'text',
		'title'    => esc_html__('Email Address', FALLFULL_CORE_TEXTDOMAIN),
		'subtitle' => esc_html__('Enter the email of your organizatio.', FALLFULL_CORE_TEXTDOMAIN),
		'desc'     => esc_html__('Enter the email of your organizatio.', FALLFULL_CORE_TEXTDOMAIN),
		'validate' => array('email'),
		'default'  => '',
	),
	array(
		'id'       => 'fallfull_site_phoneno',
		'type'     => 'text',
		'title'    => esc_html__('Email Phone Number', FALLFULL_CORE_TEXTDOMAIN),
		'subtitle' => esc_html__('Enter the phone number of your organizatio.', FALLFULL_CORE_TEXTDOMAIN),
		'desc'     => esc_html__('Enter the phone number of your organizatio.', FALLFULL_CORE_TEXTDOMAIN),
		'validate' => array('numeric'),
		'default'  => '',
	),
);


$social_medias = array();

$social_media_labels = array(
	1 => 'Facebook',
	2 => 'X (Twitter)',
	3 => 'Instagram',
	4 => 'LinkedIn',
	5 => 'GitHub'
);

$count = 5;

for ($i = 1; $i <= $count; $i++) {
	$platform = isset($social_media_labels[$i]) ? $social_media_labels[$i] : 'Social Media ' . $i;
	$social_medias[] = array(
		'id'       => 'fallfull_site_socialmedia_urls_' . $i,
		'type'     => 'text',
		'title'    => sprintf(esc_html__('%s URL', FALLFULL_CORE_TEXTDOMAIN), $platform),
		'subtitle' => sprintf(esc_html__('Enter the URL of your %s account', FALLFULL_CORE_TEXTDOMAIN), $platform),
		'desc'     => sprintf(esc_html__('Enter the URL of your %s account', FALLFULL_CORE_TEXTDOMAIN), $platform),
		'validate' => array('url'),
		'default'  => '',
	);
}

Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__('Site Content', FALLFULL_CORE_TEXTDOMAIN),
		'desc'             => esc_html__('Site Content and custom text coloring as per site design', FALLFULL_CORE_TEXTDOMAIN),
		'id'               => 'settings_site_content',
		'subsection'       => true,
		'customizer_width' => '700px',
		'fields'           => array_merge($other_fields, $social_medias),
	)
);
// phpcs:enable
