<?php
if (!defined('ABSPATH')) {
	exit;
}

add_action('acf/init', 'fallfull_register_teams_section_fields');

function fallfull_register_teams_section_fields()
{
	if (function_exists('acf_add_local_field_group')):

		$media_links = array();
		$count = 3;

		// Define social media names
		$social_media_names = array(
			1 => 'Facebook',
			2 => 'LinkedIn',
			3 => 'Instagram'
		);

		for ($i = 1; $i <= $count; $i++) {
			$social_name = $social_media_names[$i];

			$media_links[] = array(
				'key' => 'team_social_link_' . $i,
				'label' => 'Team ' . $social_name . ' URL',
				'name' => 'social_link_' . $i,
				'type' => 'text',
				'prefix' => '',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
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
			);
		}

		acf_add_local_field_group(array(
			'key' => 'fallfull_team_list_section',
			'title' => 'Team Details',
			'fields' => $media_links,
			'location' => array(
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'teams',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
		));

	endif;
}
