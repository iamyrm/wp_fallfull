<?php
if (!defined('ABSPATH')) {
	exit;
}

add_action('acf/init', 'fallfull_register_homepage_hero_section_fields');

function fallfull_register_homepage_hero_section_fields()
{
	if (function_exists('acf_add_local_field_group')):

		acf_add_local_field_group(array(
			'key' => 'fallfull_homepage_hero_section',
			'title' => 'Homepage Hero Section',
			'fields' => array(

				// Subheading Field
				array(
					'key' => 'herosection_subheading',
					'label' => 'Heor Subheading',
					'name' => 'hero_subheading',
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

				// Heading Field
				array(
					'key' => 'herosection_heading',
					'label' => 'Heor Heading',
					'name' => 'hero_heading',
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

				// Button one Text
				array(
					'key' => 'herosection_btn1txt',
					'label' => 'Button1 Text',
					'name' => 'hero_btn1txt',
					'type' => 'text',
					'prefix' => '',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '20',
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

				// Button one URL
				array(
					'key' => 'herosection_btn1url_slug',
					'label' => 'Button1 URL Slug',
					'name' => 'hero_btn1url_slug',
					'type' => 'text',
					'prefix' => '',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '20',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => 'eg: contact, about',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),

				// Button two Text
				array(
					'key' => 'herosection_btn2txt',
					'label' => 'Button2 Text',
					'name' => 'hero_btn2txt',
					'type' => 'text',
					'prefix' => '',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '20',
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

				// Button two URL
				array(
					'key' => 'herosection_btn2url_slug',
					'label' => 'Button2 URL Slug',
					'name' => 'hero_btn2url_slug',
					'type' => 'text',
					'prefix' => '',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '20',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => 'eg: contact, about',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),

				// Hero Image
				array(
					'key' => 'herosection_heroimg',
					'label' => 'Hero Banner Image',
					'name' => 'hero_heroimg',
					'type' => 'image',
					'return_format' => 'url',
					'prefix' => '',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '20',
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

			),

			'location' => array(
				array(
					array(
						'param' => 'page_type',
						'operator' => '==',
						'value' => 'front_page',
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
