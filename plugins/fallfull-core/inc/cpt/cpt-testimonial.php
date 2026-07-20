<?php
add_action('init', 'fallfull_testimonial');

function fallfull_testimonial()
{

	$labels = array(

		'name'                     => __('Testimonials', FALLFULL_CORE_TEXTDOMAIN),
		'singular_name'            => __('Testimonial', FALLFULL_CORE_TEXTDOMAIN),
		'add_new'                  => __('Add New', FALLFULL_CORE_TEXTDOMAIN),
		'add_new_item'             => __('Add New Testimonial', FALLFULL_CORE_TEXTDOMAIN),
		'edit_item'                => __('Edit Testimonial', FALLFULL_CORE_TEXTDOMAIN),
		'new_item'                 => __('New Testimonial', FALLFULL_CORE_TEXTDOMAIN),
		'view_item'                => __('View Testimonial', FALLFULL_CORE_TEXTDOMAIN),
		'view_items'               => __('View Testimonials', FALLFULL_CORE_TEXTDOMAIN),
		'search_items'             => __('Search Testimonials', FALLFULL_CORE_TEXTDOMAIN),
		'not_found'                => __('No Testimonials found.', FALLFULL_CORE_TEXTDOMAIN),
		'not_found_in_trash'       => __('No Testimonials found in Trash.', FALLFULL_CORE_TEXTDOMAIN),
		'parent_item_colon'        => __('Parent Testimonials:', FALLFULL_CORE_TEXTDOMAIN),
		'all_items'                => __('All Testimonials', FALLFULL_CORE_TEXTDOMAIN),
		'archives'                 => __('Testimonial Archives', FALLFULL_CORE_TEXTDOMAIN),
		'attributes'               => __('Testimonial Attributes', FALLFULL_CORE_TEXTDOMAIN),
		'insert_into_item'         => __('Insert into Testimonial', FALLFULL_CORE_TEXTDOMAIN),
		'uploaded_to_this_item'    => __('Uploaded to this Testimonial', FALLFULL_CORE_TEXTDOMAIN),
		'featured_image'           => __('Featured Image', FALLFULL_CORE_TEXTDOMAIN),
		'set_featured_image'       => __('Set featured image', FALLFULL_CORE_TEXTDOMAIN),
		'remove_featured_image'    => __('Remove featured image', FALLFULL_CORE_TEXTDOMAIN),
		'use_featured_image'       => __('Use as featured image', FALLFULL_CORE_TEXTDOMAIN),
		'menu_name'                => __('Testimonials', FALLFULL_CORE_TEXTDOMAIN),
		'filter_items_list'        => __('Filter Testimonial list', FALLFULL_CORE_TEXTDOMAIN),
		'filter_by_date'           => __('Filter by date', FALLFULL_CORE_TEXTDOMAIN),
		'items_list_navigation'    => __('Testimonials list navigation', FALLFULL_CORE_TEXTDOMAIN),
		'items_list'               => __('Testimonials list', FALLFULL_CORE_TEXTDOMAIN),
		'item_published'           => __('Testimonial published.', FALLFULL_CORE_TEXTDOMAIN),
		'item_published_privately' => __('Testimonial published privately.', FALLFULL_CORE_TEXTDOMAIN),
		'item_reverted_to_draft'   => __('Testimonial reverted to draft.', FALLFULL_CORE_TEXTDOMAIN),
		'item_scheduled'           => __('Testimonial scheduled.', FALLFULL_CORE_TEXTDOMAIN),
		'item_updated'             => __('Testimonial updated.', FALLFULL_CORE_TEXTDOMAIN),
		'item_link'                => __('Testimonial Link', FALLFULL_CORE_TEXTDOMAIN),
		'item_link_description'    => __('A link to a testimonial.', FALLFULL_CORE_TEXTDOMAIN),

	);

	$args = array(

		'labels'                => $labels,
		'description'           => __('Manage website testimonials', FALLFULL_CORE_TEXTDOMAIN),
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
		'supports'              => array('title', 'thumbnail', 'editor'),
		'taxonomies'            => array(),
		'has_archive'           => true,
		'rewrite'               => array('slug' => 'testimonials'),
		'query_var'             => true,
		'can_export'            => true,
		'delete_with_user'      => false,
		'template'              => array(),
		'template_lock'         => false,

	);

	register_post_type('testimonials', $args);
}
