<?php
/**
 * Custom post type registrations.
 *
 * @package AlderStone
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Registers the Project custom post type.
 *
 * @return void
 */
function alder_stone_register_project_post_type() {
	$labels = array(
		'name'                  => _x( 'Projects', 'Post type general name', 'alder-stone' ),
		'singular_name'         => _x( 'Project', 'Post type singular name', 'alder-stone' ),
		'menu_name'             => _x( 'Projects', 'Admin Menu text', 'alder-stone' ),
		'name_admin_bar'        => _x( 'Project', 'Add New on Toolbar', 'alder-stone' ),
		'add_new'               => __( 'Add New', 'alder-stone' ),
		'add_new_item'          => __( 'Add New Project', 'alder-stone' ),
		'new_item'              => __( 'New Project', 'alder-stone' ),
		'edit_item'             => __( 'Edit Project', 'alder-stone' ),
		'view_item'             => __( 'View Project', 'alder-stone' ),
		'all_items'             => __( 'All Projects', 'alder-stone' ),
		'search_items'          => __( 'Search Projects', 'alder-stone' ),
		'parent_item_colon'     => __( 'Parent Projects:', 'alder-stone' ),
		'not_found'             => __( 'No projects found.', 'alder-stone' ),
		'not_found_in_trash'    => __( 'No projects found in Trash.', 'alder-stone' ),
		'featured_image'        => _x( 'Project Featured Image', 'Overrides the “Featured Image” phrase', 'alder-stone' ),
		'set_featured_image'    => _x( 'Set featured image', 'Overrides the “Set featured image” phrase', 'alder-stone' ),
		'remove_featured_image' => _x( 'Remove featured image', 'Overrides the “Remove featured image” phrase', 'alder-stone' ),
		'use_featured_image'    => _x( 'Use as featured image', 'Overrides the “Use as featured image” phrase', 'alder-stone' ),
		'archives'              => _x( 'Project archives', 'The post type archive label', 'alder-stone' ),
		'insert_into_item'      => _x( 'Insert into project', 'Overrides the “Insert into post” phrase', 'alder-stone' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this project', 'Overrides the “Uploaded to this post” phrase', 'alder-stone' ),
		'filter_items_list'     => _x( 'Filter projects list', 'Screen reader text for the filter links', 'alder-stone' ),
		'items_list_navigation' => _x( 'Projects list navigation', 'Screen reader text for the pagination', 'alder-stone' ),
		'items_list'            => _x( 'Projects list', 'Screen reader text for the items list', 'alder-stone' ),
	);

	$args = array(
		'labels'       => $labels,
		'public'       => true,
		'show_ui'      => true,
		'show_in_rest' => true,
		'has_archive'  => true,
		'rewrite'      => array(
			'slug' => 'projects',
		),
		'menu_icon'    => 'dashicons-portfolio',
		'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
	);

	register_post_type( 'project', $args );
}
add_action( 'init', 'alder_stone_register_project_post_type' );
