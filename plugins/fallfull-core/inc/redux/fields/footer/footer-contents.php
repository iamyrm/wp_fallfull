<?php

/**
 * Redux Framework text config.
 * For full documentation, please visit: https://devs.redux.io/
 *
 * @package Redux Framework
 */

// phpcs:disable
defined('ABSPATH') || exit;

$footer_col_heading = array();
$count = 4;

for ($i = 1; $i <= $count; $i++) {
	$footer_col_heading[] = array(
		'id'       => 'footer_column_' . $i,
		'type'     => 'text',
		'title'    => esc_html__('Footer Heading for Column ' . $i, FALLFULL_CORE_TEXTDOMAIN),
		'subtitle' => esc_html__('Enter the heading for footer column ' . $i . '.', FALLFULL_CORE_TEXTDOMAIN),
		'desc'     => esc_html__('Enter the heading for the footer column ' . $i . '.', FALLFULL_CORE_TEXTDOMAIN),
		'default'  => '',
	);
}

$other_fields = array();
$count = 2;

for ($i = 1; $i <= $count; $i++) {
	$col_num = ($i === 2) ? ($i + 2) : $i;

	$other_fields[] = array(
		'id'       => 'footer_column_' . $col_num . '_content',
		'type'     => 'textarea',
		'title'    => sprintf(esc_html__('Column %d Contents', FALLFULL_CORE_TEXTDOMAIN), $col_num),
		'subtitle' => sprintf(esc_html__('Enter contents for footer column %d.', FALLFULL_CORE_TEXTDOMAIN), $col_num),
		'desc'     => sprintf(esc_html__('Enter contents for footer column %d.', FALLFULL_CORE_TEXTDOMAIN), $col_num),
		'default'  => '',
	);
}

Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__('Site Footer', FALLFULL_CORE_TEXTDOMAIN),
		'desc'             => esc_html__('Site Footer and custom text coloring as per site design', FALLFULL_CORE_TEXTDOMAIN),
		'id'               => 'settings_site_footer',
		'subsection'       => true,
		'customizer_width' => '700px',
		'fields'           => array_merge($footer_col_heading, $other_fields),
	)
);
// phpcs:enable
