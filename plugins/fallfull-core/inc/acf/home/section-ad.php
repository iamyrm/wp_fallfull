<?php
if (!defined('ABSPATH')) {
	exit;
}

add_action('acf/init', 'fallfull_register_homepage_ad_section_fields');

function fallfull_register_homepage_ad_section_fields()
{
	if (function_exists('acf_add_local_field_group')):

		acf_add_local_field_group(array(
			'key' => 'fallfull_homepage_ad_section',
			'title' => 'Homepage Ads Section',
			'fields' => array(

				// Ad Section Heading
				array(
					'key' => 'adsection_video_url',
					'label' => 'YouTube Video URL',
					'name' => 'ad_video_url',
					'type' => 'url',
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

				// Ad Section Subheading
				array(
					'key' => 'adsection_subheading',
					'label' => 'Ads Section Subheading',
					'name' => 'ad_subheading',
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

				// Ad Section Heading
				array(
					'key' => 'adsection_heading',
					'label' => 'Ads Section Heading',
					'name' => 'ad_heading',
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

				// Product Section Button Text
				array(
					'key' => 'adsection_btn_txt',
					'label' => 'Ads Section Button Text',
					'name' => 'ad_btn_txt',
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

				// Product Section Button Slug
				array(
					'key' => 'adsection_btn_slug',
					'label' => 'Ads Section Button Slug',
					'name' => 'ad_btn_slug',
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

				// Product Section Description
				array(
					'key' => 'adsection_description',
					'label' => 'Ads Section Description',
					'name' => 'ad_description',
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
			'menu_order' => 3,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
		));

	endif;
}
