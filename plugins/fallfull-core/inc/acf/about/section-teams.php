<?php
if (!defined('ABSPATH')) {
	exit;
}

add_action('acf/init', 'fallfull_register_about_team_section_fields');

function fallfull_register_about_team_section_fields()
{
	if (function_exists('acf_add_local_field_group')):

		$section_header = array(
			array(
				'key' => 'about_team_section_heading',
				'label' => 'Team Section Main Heading',
				'name' => 'about_team_heading',
				'type' => 'text',
				'prefix' => '',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '50',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
				'readonly' => 0,
				'disabled' => 0,
			),

			array(
				'key' => 'about_teams_section_desc',
				'label' => 'Team Section Description',
				'name' => 'about_pg_teams_desc',
				'type' => 'textarea',
				'prefix' => '',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '50',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
				'readonly' => 0,
				'disabled' => 0,
			),
		);

		acf_add_local_field_group(array(
			'key' => 'fallfull_about_teams_section',
			'title' => 'About Teams Section',
			'fields' => $section_header,
			'location' => array(
				array(
					array(
						'param' => 'page',
						'operator' => '==',
						'value' => '122',
					),
				),
			),
			'menu_order' => 5,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
		));

	endif;
}
