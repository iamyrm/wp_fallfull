<?php
if (!defined('ABSPATH')) {
	exit;
}

add_action('acf/init', 'fallfull_register_testimonials_section_fields');

function fallfull_register_testimonials_section_fields()
{
	if (function_exists('acf_add_local_field_group')):

		acf_add_local_field_group(array(
			'key' => 'fallfull_testimonials_section',
			'title' => 'Testimonials Section',
			'fields' => array(
				// Product Section Subheading
				array(
					'key' => 'testimonials_section_subheading',
					'label' => 'Testimonials Section Subheading',
					'name' => 'testimonials_subheading',
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
				),
			),

			'location' => array(
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'testimonials',
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
