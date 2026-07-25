<?php
if (!defined('ABSPATH')) {
	exit;
}


add_action('acf/init', 'fallfull_register_contactpg_contact_section_fields');

function fallfull_register_contactpg_contact_section_fields()
{
	$menu_order = !is_page('about') ? 4 : 1;
	if (function_exists('acf_add_local_field_group')):

		acf_add_local_field_group(array(
			'key' => 'fallfull_contactpg_contact_section',
			'title' => 'Contact Page Form Section',
			'fields' => array(

				// Form Heading Section
				array(
					'key' => 'contactpg_form_hading',
					'label' => 'Form Heading',
					'name' => 'contact_form_heading',
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

				// Form Description Section
				array(
					'key' => 'contactpg_form_desc',
					'label' => 'Form Description',
					'name' => 'contact_form_desc',
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
				// Form Map URL
				array(
					'key' => 'contactpg_form_map',
					'label' => 'Map URL',
					'name' => 'contact_form_map',
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
					'placeholder' => 'Enter the entire script tag of the google maps',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				)
			),

			'location' => array(
				array(
					array(
						'param' => 'page',
						'operator' => '==',
						'value' => '45',
					),
				)
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
