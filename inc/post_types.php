<?php
/**
 * Registers blank post types
 */
 
//////////////////////////////////////////////////////////////////
// Custom Post type Components - PHP Templates + Shortcodes
//////////////////////////////////////////////////////////////////

function create_post_type_components() {

	register_taxonomy_for_object_type('category', 'components'); // Register Taxonomies for Category

	register_taxonomy_for_object_type('post_tag', 'components');

	register_post_type('components',
		array(
		'labels' => array(
			'name' => __('Components', 'dp'),
			'singular_name' => __('component', 'dp'),
			'add_new' => __('Add New', 'dp'),
			'add_new_item' => __('Add New component Post', 'dp'),
			'edit' => __('Edit', 'dp'),
			'edit_item' => __('Edit component Post', 'dp'),
			'new_item' => __('New component Post', 'dp'),
			'view' => __('View component Post', 'dp'),
			'view_item' => __('View component Post', 'dp'),
			'search_items' => __('Search component Post', 'dp'),
			'not_found' => __('No component Posts found', 'dp'),
			'not_found_in_trash' => __('No component Posts found in Trash', 'dp')
		),
		'hierarchical' => true,
		'publicly_queryable' => true,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		//'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'show_in_rest' => true,
		'supports' => array('title','editor','thumbnail','page-attributes'),
		'can_export' => true, // Allows export in Tools > Export
		'taxonomies' => array('post_tag','category')
	));
}
// add_action('init', 'create_post_type_components'); => only if need specific large reusable sections

//////////////////////////////////////////////////////////////////
// Custom Post type events - PHP Templates + Shortcodes
//////////////////////////////////////////////////////////////////
function create_post_type_events() {
    register_taxonomy_for_object_type('category', 'events'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'events');
    register_post_type('events',
        array(
        'labels' => array(
            'name' => __('Events', 'dp'),
            'singular_name' => __('Events', 'dp'),
            'add_new' => __('Add New', 'dp'),
            'add_new_item' => __('Add New events Post', 'dp'),
            'edit' => __('Edit', 'dp'),
            'edit_item' => __('Edit events Post', 'dp'),
            'new_item' => __('New events Post', 'dp'),
            'view' => __('View events Post', 'dp'),
            'view_item' => __('View events Post', 'dp'),
            'search_items' => __('Search events Post', 'dp'),
            'not_found' => __('No events Posts found', 'dp'),
            'not_found_in_trash' => __('No events Posts found in Trash', 'dp')
        ),
        'hierarchical' => true,
        'publicly_queryable' => true,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        //'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
        'supports' => array('title','editor','thumbnail','page-attributes'),
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array('post_tag','category')
    ));
}
add_action('init', 'create_post_type_events');
