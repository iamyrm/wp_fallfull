<?php
if (!defined('ABSPATH')) {
	exit;
}

add_action('acf/init', 'fallfull_register_homepage_features_section_fields');

function fallfull_register_homepage_features_section_fields()
{
	if (function_exists('acf_add_local_field_group')):

		$fields = array();
		$feature_count = 3;

		for ($i = 1; $i <= $feature_count; $i++) {

			// Icons Field
			$fields[] = array(
				'key' => 'featuressection_icon' . $i,
				'label' => 'Feature Icon ' . $i . ' (class)',
				'name' => 'features_icon' . $i,
				'type' => 'text',
				'prefix' => '',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '30',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => 'eg: fas fa-shipping-fast',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
				'readonly' => 0,
				'disabled' => 0,
			);

			// Heading field
			$fields[] = array(
				'key' => 'featuressection_heading' . $i,
				'label' => 'Feature Heading ' . $i,
				'name' => 'features_heading' . $i,
				'type' => 'text',
				'prefix' => '',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '35',
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

			// Subheading field
			$fields[] = array(
				'key' => 'featuressection_subheading' . $i,
				'label' => 'Feature Subheading ' . $i,
				'name' => 'features_subheading' . $i,
				'type' => 'text',
				'prefix' => '',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '35',
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
			'key' => 'fallfull_homepage_features_section',
			'title' => 'Homepage Features Section',
			'fields' => $fields,
			'location' => array(
				array(
					array(
						'param' => 'page_type',
						'operator' => '==',
						'value' => 'front_page',
					),
				),
			),
			'menu_order' => 1,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
		));

	endif;
}
