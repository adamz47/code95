<?php

namespace Register_Entities;

class Example extends Entity {
	public static function init() {
		// to copy
		register_post_type( 'example', [
			'label'               => __( 'example', 'webofai_theme' ),
			'description'         => __( 'Example news and reviews', 'webofai_theme' ),
			'labels'              => array(
				'name'               => _x( 'Example', 'Post Type General Name', 'webofai_theme' ),
				'singular_name'      => _x( 'Example', 'Post Type Singular Name', 'webofai_theme' ),
				'menu_name'          => __( 'Example', 'webofai_theme' ),
				'parent_item_colon'  => __( 'Parent Example', 'webofai_theme' ),
				'all_items'          => __( 'All Examples', 'webofai_theme' ),
				'view_item'          => __( 'View Example', 'webofai_theme' ),
				'add_new_item'       => __( 'Add New Example', 'webofai_theme' ),
				'add_new'            => __( 'Add New', 'webofai_theme' ),
				'edit_item'          => __( 'Edit Example', 'webofai_theme' ),
				'update_item'        => __( 'Update Example', 'webofai_theme' ),
				'search_items'       => __( 'Search Example', 'webofai_theme' ),
				'not_found'          => __( 'Not Found', 'webofai_theme' ),
				'not_found_in_trash' => __( 'Not found in Trash', 'webofai_theme' ),
			),
			// Features this CPT supports in Post Editor
			'supports'            => array(
				'title',
				'editor',
				'custom-fields',
				'thumbnail'
			),
			// You can associate this CPT with a taxonomy or custom taxonomy.
			'taxonomies'          => array( 'guide_urls_structure' ),
			/* A hierarchical CPT is like Pages and can have
		  * Parent and child items. A non-hierarchical CPT
		  * is like Posts.
		  */
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'menu_icon'           => 'dashicons-format-quote',
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'show_in_rest'        => true,
		] );
		register_taxonomy(
			'guide_urls_structure',
			null,
			array(
				'labels'       => array(
					'name'          => 'Example URLS Structure',
					'singular_name' => 'Example',
					'add_new_item'  => 'Add New URL',
					'new_item_name' => "New Category",
				),
				'public'       => true,
				'hierarchical' => true,
				'show_in_rest' => true,
				'description'  => 'Used to define the URLS Structure of Example'
			)
		);
	}
}


