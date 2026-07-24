<?php
add_action('init', 'fallfull_carousel');

function fallfull_carousel()
{

	$labels = array(

		'name'                     => __('Carousels', FALLFULL_CORE_TEXTDOMAIN),
		'singular_name'            => __('Carousel', FALLFULL_CORE_TEXTDOMAIN),
		'add_new'                  => __('Add New', FALLFULL_CORE_TEXTDOMAIN),
		'add_new_item'             => __('Add New Carousel', FALLFULL_CORE_TEXTDOMAIN),
		'edit_item'                => __('Edit Carousel', FALLFULL_CORE_TEXTDOMAIN),
		'new_item'                 => __('New Carousel', FALLFULL_CORE_TEXTDOMAIN),
		'view_item'                => __('View Carousel', FALLFULL_CORE_TEXTDOMAIN),
		'view_items'               => __('View Carousels', FALLFULL_CORE_TEXTDOMAIN),
		'search_items'             => __('Search Carousels', FALLFULL_CORE_TEXTDOMAIN),
		'not_found'                => __('No Carousels found.', FALLFULL_CORE_TEXTDOMAIN),
		'not_found_in_trash'       => __('No Carousels found in Trash.', FALLFULL_CORE_TEXTDOMAIN),
		'parent_item_colon'        => __('Parent Carousels:', FALLFULL_CORE_TEXTDOMAIN),
		'all_items'                => __('All Carousels', FALLFULL_CORE_TEXTDOMAIN),
		'archives'                 => __('Carousel Archives', FALLFULL_CORE_TEXTDOMAIN),
		'attributes'               => __('Carousel Attributes', FALLFULL_CORE_TEXTDOMAIN),
		'insert_into_item'         => __('Insert into Carousel', FALLFULL_CORE_TEXTDOMAIN),
		'uploaded_to_this_item'    => __('Uploaded to this Carousel', FALLFULL_CORE_TEXTDOMAIN),
		'featured_image'           => __('Featured Image', FALLFULL_CORE_TEXTDOMAIN),
		'set_featured_image'       => __('Set featured image', FALLFULL_CORE_TEXTDOMAIN),
		'remove_featured_image'    => __('Remove featured image', FALLFULL_CORE_TEXTDOMAIN),
		'use_featured_image'       => __('Use as featured image', FALLFULL_CORE_TEXTDOMAIN),
		'menu_name'                => __('Carousels', FALLFULL_CORE_TEXTDOMAIN),
		'filter_items_list'        => __('Filter Carousel list', FALLFULL_CORE_TEXTDOMAIN),
		'filter_by_date'           => __('Filter by date', FALLFULL_CORE_TEXTDOMAIN),
		'items_list_navigation'    => __('Carousels list navigation', FALLFULL_CORE_TEXTDOMAIN),
		'items_list'               => __('Carousels list', FALLFULL_CORE_TEXTDOMAIN),
		'item_published'           => __('Carousel published.', FALLFULL_CORE_TEXTDOMAIN),
		'item_published_privately' => __('Carousel published privately.', FALLFULL_CORE_TEXTDOMAIN),
		'item_reverted_to_draft'   => __('Carousel reverted to draft.', FALLFULL_CORE_TEXTDOMAIN),
		'item_scheduled'           => __('Carousel scheduled.', FALLFULL_CORE_TEXTDOMAIN),
		'item_updated'             => __('Carousel updated.', FALLFULL_CORE_TEXTDOMAIN),
		'item_link'                => __('Carousel Link', FALLFULL_CORE_TEXTDOMAIN),
		'item_link_description'    => __('A link to a carousel.', FALLFULL_CORE_TEXTDOMAIN),

	);

	$args = array(

		'labels'                => $labels,
		'description'           => __('Manage website carousels', FALLFULL_CORE_TEXTDOMAIN),
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
		'menu_icon'             => 'dashicons-images-alt2',
		'capability_type'       => 'post',
		'capabilities'          => array(),
		'supports'              => array('title', 'thumbnail'),
		'taxonomies'            => array(),
		'has_archive'           => true,
		'rewrite'               => array('slug' => 'carousels'),
		'query_var'             => true,
		'can_export'            => true,
		'delete_with_user'      => false,
		'template'              => array(),
		'template_lock'         => false,

	);

	register_post_type('carousels', $args);
}
