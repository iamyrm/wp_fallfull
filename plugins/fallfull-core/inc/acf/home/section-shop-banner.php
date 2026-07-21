<?php
if (!defined('ABSPATH')) {
	exit;
}

add_action('acf/init', 'fallfull_register_homepage_sale_section_fields');

function fallfull_register_homepage_sale_section_fields()
{
	if (function_exists('acf_add_local_field_group')):

		acf_add_local_field_group(array(
			'key' => 'fallfull_homepage_sale_section',
			'title' => 'Homepage Sale Section',
			'fields' => array(

				// Sale Section Heading1
				array(
					'key' => 'salesection_heading1',
					'label' => 'Sale Heading 1',
					'name' => 'sale_heading1',
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
				),

				// Sale Section Heading2
				array(
					'key' => 'salesection_heading2',
					'label' => 'Sale Heading 2',
					'name' => 'sale_heading2',
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
				),

				// Sale Section Discount Percentage
				array(
					'key' => 'salesection_discount',
					'label' => 'Sale Section Discount',
					'name' => 'sale_discount',
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
					'placeholder' => 'eg: 20, 30, 50',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),

				// Sale Section Button Text
				array(
					'key' => 'salesection_btn_txt',
					'label' => 'Sale Section Button Text',
					'name' => 'sale_btn_txt',
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
				),

				// Sale Section Button Slug
				array(
					'key' => 'salesection_btn_slug',
					'label' => 'Sale Section Button Slug',
					'name' => 'sale_btn_slug',
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
				),

				// Sale Section BG Image
				array(
					'key' => 'salesection_bg_img',
					'label' => 'Sale Banner Image',
					'name' => 'sale_bg_img',
					'type' => 'image',
					'return_format' => 'url',
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
			'menu_order' => 4,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
		));

	endif;
}
