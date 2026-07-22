<?php

/**
 * Redux Framework text config.
 * For full documentation, please visit: https://devs.redux.io/
 *
 * @package Redux Framework
 */

// phpcs:disable
defined('ABSPATH') || exit;

Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__('Site Customization', FALLFULL_CORE_TEXTDOMAIN),
		'desc'             => esc_html__('Site Customization and custom text coloring as per site design', FALLFULL_CORE_TEXTDOMAIN),
		'id'               => 'settings_site_customization',
		'subsection'       => true,
		'customizer_width' => '700px',
		'fields'           => array(
			array(
				'id'       => 'home-prod-desc-text-color',
				'type'     => 'text',
				'title'    => esc_html__('Product section heading text', FALLFULL_CORE_TEXTDOMAIN),
				'subtitle' => esc_html__('Enter one or more word', FALLFULL_CORE_TEXTDOMAIN),
				'desc'     => esc_html__('Enter the word/s seperated by comma to change its color in the frontend of the product description heading. Do not add space after comma', FALLFULL_CORE_TEXTDOMAIN),
				'default'  => '',
			),
			array(
				'id'       => 'home-ads-text-color',
				'type'     => 'text',
				'title'    => esc_html__('Ads section heading text', FALLFULL_CORE_TEXTDOMAIN),
				'subtitle' => esc_html__('Enter one or more word', FALLFULL_CORE_TEXTDOMAIN),
				'desc'     => esc_html__('Enter the word/s seperated by comma to change its color in the frontend of the product description heading. Do not add space after comma', FALLFULL_CORE_TEXTDOMAIN),
				'default'  => '',
			),
			array(
				'id'       => 'home-sale-text-color',
				'type'     => 'text',
				'title'    => esc_html__('Sale section heading text', FALLFULL_CORE_TEXTDOMAIN),
				'subtitle' => esc_html__('Enter one or more word', FALLFULL_CORE_TEXTDOMAIN),
				'desc'     => esc_html__('Enter the word/s seperated by comma to change its color in the frontend of the product description heading. Do not add space after comma', FALLFULL_CORE_TEXTDOMAIN),
				'default'  => '',
			),
			array(
				'id'       => 'home-news-text-color',
				'type'     => 'text',
				'title'    => esc_html__('News section heading text', FALLFULL_CORE_TEXTDOMAIN),
				'subtitle' => esc_html__('Enter one or more word', FALLFULL_CORE_TEXTDOMAIN),
				'desc'     => esc_html__('Enter the word/s seperated by comma to change its color in the frontend of the product description heading. Do not add space after comma', FALLFULL_CORE_TEXTDOMAIN),
				'default'  => '',
			),
		),
	)
);
// phpcs:enable
