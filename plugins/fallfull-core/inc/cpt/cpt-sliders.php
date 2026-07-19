<?php
add_action('init', 'fallfull_sliders');

function fallfull_sliders()
{

	$labels = array(

		'name'                     => __('Sliders', FALLFULL_CORE_TEXTDOMAIN),
		'singular_name'            => __('Slider', FALLFULL_CORE_TEXTDOMAIN),
		'add_new'                  => __('Add New', FALLFULL_CORE_TEXTDOMAIN),
		'add_new_item'             => __('Add New Slider', FALLFULL_CORE_TEXTDOMAIN),
		'edit_item'                => __('Edit Slider', FALLFULL_CORE_TEXTDOMAIN),
		'new_item'                 => __('New Slider', FALLFULL_CORE_TEXTDOMAIN),
		'view_item'                => __('View Slider', FALLFULL_CORE_TEXTDOMAIN),
		'view_items'               => __('View Sliders', FALLFULL_CORE_TEXTDOMAIN),
		'search_items'             => __('Search Sliders', FALLFULL_CORE_TEXTDOMAIN),
		'not_found'                => __('No Sliders found.', FALLFULL_CORE_TEXTDOMAIN),
		'not_found_in_trash'       => __('No Sliders found in Trash.', FALLFULL_CORE_TEXTDOMAIN),
		'parent_item_colon'        => __('Parent Sliders:', FALLFULL_CORE_TEXTDOMAIN),
		'all_items'                => __('All Sliders', FALLFULL_CORE_TEXTDOMAIN),
		'archives'                 => __('Slider Archives', FALLFULL_CORE_TEXTDOMAIN),
		'attributes'               => __('Slider Attributes', FALLFULL_CORE_TEXTDOMAIN),
		'insert_into_item'         => __('Insert into Slider', FALLFULL_CORE_TEXTDOMAIN),
		'uploaded_to_this_item'    => __('Uploaded to this Slider', FALLFULL_CORE_TEXTDOMAIN),
		'featured_image'           => __('Featured Image', FALLFULL_CORE_TEXTDOMAIN),
		'set_featured_image'       => __('Set featured image', FALLFULL_CORE_TEXTDOMAIN),
		'remove_featured_image'    => __('Remove featured image', FALLFULL_CORE_TEXTDOMAIN),
		'use_featured_image'       => __('Use as featured image', FALLFULL_CORE_TEXTDOMAIN),
		'menu_name'                => __('Sliders', FALLFULL_CORE_TEXTDOMAIN),
		'filter_items_list'        => __('Filter Slider list', FALLFULL_CORE_TEXTDOMAIN),
		'filter_by_date'           => __('Filter by date', FALLFULL_CORE_TEXTDOMAIN),
		'items_list_navigation'    => __('Sliders list navigation', FALLFULL_CORE_TEXTDOMAIN),
		'items_list'               => __('Sliders list', FALLFULL_CORE_TEXTDOMAIN),
		'item_published'           => __('Slider published.', FALLFULL_CORE_TEXTDOMAIN),
		'item_published_privately' => __('Slider published privately.', FALLFULL_CORE_TEXTDOMAIN),
		'item_reverted_to_draft'   => __('Slider reverted to draft.', FALLFULL_CORE_TEXTDOMAIN),
		'item_scheduled'           => __('Slider scheduled.', FALLFULL_CORE_TEXTDOMAIN),
		'item_updated'             => __('Slider updated.', FALLFULL_CORE_TEXTDOMAIN),
		'item_link'                => __('Slider Link', FALLFULL_CORE_TEXTDOMAIN),
		'item_link_description'    => __('A link to a slider.', FALLFULL_CORE_TEXTDOMAIN),

	);

	$args = array(

		'labels'                => $labels,
		'description'           => __('Manage website sliders', FALLFULL_CORE_TEXTDOMAIN),
		'public'                => true,
		'hierarchical'          => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => true,
		'show_in_admin_bar'     => true,
		'show_in_rest'          => true,
		'menu_position'         => null,
		'menu_icon'             => 'dashicons-slides',
		'capability_type'       => 'post',
		'capabilities'          => array(),
		'supports'              => array('title', 'thumbnail'),
		'taxonomies'            => array(),
		'has_archive'           => true,
		'rewrite'               => array('slug' => 'sliders'),
		'query_var'             => true,
		'can_export'            => true,
		'delete_with_user'      => false,
		'template'              => array(),
		'template_lock'         => false,

	);

	register_post_type('sliders', $args);
}
