<?php
if (!defined('ABSPATH')) {
	exit;
}

add_action('acf/init', 'fallfull_register_about_features_section_fields');

function fallfull_register_about_features_section_fields()
{
	if (function_exists('acf_add_local_field_group')):

		$section_header = array(
			array(
				'key' => 'about_feature_section_heading',
				'label' => 'Feature Main Heading',
				'name' => 'about_feature_heading',
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
				'key' => 'about_feature_section_img',
				'label' => 'Feature Main Image',
				'name' => 'about_pg_feature_img',
				'type' => 'image',
				'return_format' => 'url',
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


		$fields = array();
		$feature_count = 4;

		for ($i = 1; $i <= $feature_count; $i++) {

			// Icons Field
			$fields[] = array(
				'key' => 'about_feature_section_heading_icon' . $i,
				'label' => 'Feature Icon ' . $i . ' (class)',
				'name' => 'about_features_icon_heading' . $i,
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
				'key' => 'about_feature_section_topics' . $i,
				'label' => 'Features Topics ' . $i,
				'name' => 'about_feature_topics' . $i,
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
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
				'readonly' => 0,
				'disabled' => 0,
			);

			// Subheading field
			$fields[] = array(
				'key' => 'about_feature_section_desc' . $i,
				'label' => 'Features Description ' . $i,
				'name' => 'about_features_desc' . $i,
				'type' => 'textarea',
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
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
				'readonly' => 0,
				'disabled' => 0,
			);
		}

		acf_add_local_field_group(array(
			'key' => 'fallfull_about_features_section',
			'title' => 'About Features Section',
			'fields' => array_merge($section_header, $fields),
			'location' => array(
				array(
					array(
						'param' => 'page',
						'operator' => '==',
						'value' => '122',
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
