<?php
add_action('init', 'fallfull_register_team_type_taxonomy');
add_action('init', 'fallfull_team');

function fallfull_register_team_type_taxonomy()
{

	$labels = array(

		'name'                       => __('Team Types', FALLFULL_CORE_TEXTDOMAIN),
		'singular_name'              => __('Team Type', FALLFULL_CORE_TEXTDOMAIN),
		'search_items'               => __('Search Team Types', FALLFULL_CORE_TEXTDOMAIN),
		'popular_items'              => __('Popular Team Types', FALLFULL_CORE_TEXTDOMAIN),
		'all_items'                  => __('All Team Types', FALLFULL_CORE_TEXTDOMAIN),
		'parent_item'                => __('Parent Team Type', FALLFULL_CORE_TEXTDOMAIN),
		'parent_item_colon'          => __('Parent Team Type:', FALLFULL_CORE_TEXTDOMAIN),
		'edit_item'                  => __('Edit Team Type', FALLFULL_CORE_TEXTDOMAIN),
		'update_item'                => __('Update Team Type', FALLFULL_CORE_TEXTDOMAIN),
		'add_new_item'               => __('Add New Team Type', FALLFULL_CORE_TEXTDOMAIN),
		'new_item_name'              => __('New Team Type Name', FALLFULL_CORE_TEXTDOMAIN),
		'separate_items_with_commas' => __('Separate team types with commas', FALLFULL_CORE_TEXTDOMAIN),
		'add_or_remove_items'        => __('Add or remove team types', FALLFULL_CORE_TEXTDOMAIN),
		'choose_from_most_used'      => __('Choose from the most used team types', FALLFULL_CORE_TEXTDOMAIN),
		'not_found'                  => __('No team types found.', FALLFULL_CORE_TEXTDOMAIN),
		'menu_name'                  => __('Team Types', FALLFULL_CORE_TEXTDOMAIN),

	);

	$args = array(

		'labels'            => $labels,
		'public'            => true,
		'hierarchical'      => true,
		'publicly_queryable' => true,
		'show_ui'           => true,
		'show_in_menu'      => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => false,
		'show_admin_column' => true,
		'show_in_rest'      => true,
		'rewrite'           => array('slug' => 'team-type'),
		'query_var'         => true,
		'capabilities'      => array(),

	);

	register_taxonomy('team-type', array('teams'), $args);
}

function fallfull_team()
{

	$labels = array(

		'name'                     => __('Teams', FALLFULL_CORE_TEXTDOMAIN),
		'singular_name'            => __('Team', FALLFULL_CORE_TEXTDOMAIN),
		'add_new'                  => __('Add New', FALLFULL_CORE_TEXTDOMAIN),
		'add_new_item'             => __('Add New Team', FALLFULL_CORE_TEXTDOMAIN),
		'edit_item'                => __('Edit Team', FALLFULL_CORE_TEXTDOMAIN),
		'new_item'                 => __('New Team', FALLFULL_CORE_TEXTDOMAIN),
		'view_item'                => __('View Team', FALLFULL_CORE_TEXTDOMAIN),
		'view_items'               => __('View Teams', FALLFULL_CORE_TEXTDOMAIN),
		'search_items'             => __('Search Teams', FALLFULL_CORE_TEXTDOMAIN),
		'not_found'                => __('No Teams found.', FALLFULL_CORE_TEXTDOMAIN),
		'not_found_in_trash'       => __('No Teams found in Trash.', FALLFULL_CORE_TEXTDOMAIN),
		'parent_item_colon'        => __('Parent Teams:', FALLFULL_CORE_TEXTDOMAIN),
		'all_items'                => __('All Teams', FALLFULL_CORE_TEXTDOMAIN),
		'archives'                 => __('Team Archives', FALLFULL_CORE_TEXTDOMAIN),
		'attributes'               => __('Team Attributes', FALLFULL_CORE_TEXTDOMAIN),
		'insert_into_item'         => __('Insert into Team', FALLFULL_CORE_TEXTDOMAIN),
		'uploaded_to_this_item'    => __('Uploaded to this Team', FALLFULL_CORE_TEXTDOMAIN),
		'featured_image'           => __('Featured Image', FALLFULL_CORE_TEXTDOMAIN),
		'set_featured_image'       => __('Set featured image', FALLFULL_CORE_TEXTDOMAIN),
		'remove_featured_image'    => __('Remove featured image', FALLFULL_CORE_TEXTDOMAIN),
		'use_featured_image'       => __('Use as featured image', FALLFULL_CORE_TEXTDOMAIN),
		'menu_name'                => __('Teams', FALLFULL_CORE_TEXTDOMAIN),
		'filter_items_list'        => __('Filter Team list', FALLFULL_CORE_TEXTDOMAIN),
		'filter_by_date'           => __('Filter by date', FALLFULL_CORE_TEXTDOMAIN),
		'items_list_navigation'    => __('Teams list navigation', FALLFULL_CORE_TEXTDOMAIN),
		'items_list'               => __('Teams list', FALLFULL_CORE_TEXTDOMAIN),
		'item_published'           => __('Team published.', FALLFULL_CORE_TEXTDOMAIN),
		'item_published_privately' => __('Team published privately.', FALLFULL_CORE_TEXTDOMAIN),
		'item_reverted_to_draft'   => __('Team reverted to draft.', FALLFULL_CORE_TEXTDOMAIN),
		'item_scheduled'           => __('Team scheduled.', FALLFULL_CORE_TEXTDOMAIN),
		'item_updated'             => __('Team updated.', FALLFULL_CORE_TEXTDOMAIN),
		'item_link'                => __('Team Link', FALLFULL_CORE_TEXTDOMAIN),
		'item_link_description'    => __('A link to a team.', FALLFULL_CORE_TEXTDOMAIN),

	);

	$args = array(

		'labels'                => $labels,
		'description'           => __('Manage website teams', FALLFULL_CORE_TEXTDOMAIN),
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
		'menu_icon'             => 'dashicons-groups',
		'capability_type'       => 'post',
		'capabilities'          => array(),
		'supports'              => array('title', 'thumbnail'),
		'taxonomies'            => array('team-type'),
		'has_archive'           => true,
		'rewrite'               => array('slug' => 'teams'),
		'query_var'             => true,
		'can_export'            => true,
		'delete_with_user'      => false,
		'template'              => array(),
		'template_lock'         => false,

	);

	register_post_type('teams', $args);
}
