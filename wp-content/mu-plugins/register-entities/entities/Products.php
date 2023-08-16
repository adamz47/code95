<?php
//
//namespace Register_Entities;
//
//class Products extends Entity
//{
//  public static function init()
//  {
//    register_post_type('news', [
//        'label' => __('news', 'webofai_theme'),
//        'description' => __('news and reviews', 'webofai_theme'),
//        'labels' => array(
//            'name' => _x('News', 'Post Type General Name', 'webofai_theme'),
//            'singular_name' => _x('News', 'Post Type Singular Name', 'webofai_theme'),
//            'menu_name' => __('News', 'webofai_theme'),
//            'parent_item_colon' => __('Parent News', 'webofai_theme'),
//            'all_items' => __('All News', 'webofai_theme'),
//            'view_item' => __('View News', 'webofai_theme'),
//            'add_new_item' => __('Add New News', 'webofai_theme'),
//            'add_new' => __('Add New', 'webofai_theme'),
//            'edit_item' => __('Edit News', 'webofai_theme'),
//            'update_item' => __('Update News', 'webofai_theme'),
//            'search_items' => __('Search News', 'webofai_theme'),
//            'not_found' => __('Not Found', 'webofai_theme'),
//            'not_found_in_trash' => __('Not found in Trash', 'webofai_theme'),
//        ),
//      // Features this CPT supports in Post Editor
////        'supports' => array(
////            'title',
////            'custom-fields',
////        ),
//        'hierarchical' => false,
//        'public' => true,
//        'show_ui' => true,
//        'menu_icon' => 'dashicons-admin-site-alt',
//        'show_in_menu' => true,
//        'show_in_nav_menus' => true,
//        'show_in_admin_bar' => true,
//        'menu_position' => 5,
//        'can_export' => true,
//        'has_archive' => true,
//        'exclude_from_search' => false,
//        'publicly_queryable' => true,
//        'capability_type' => 'post',
//        'show_in_rest' => true,
//    ]);
//    register_taxonomy(
//        'for-sale',
//        'products',
//        array(
//            'labels' => array(
//                'name' => 'Ehitusmaterjalid',
//                'singular_name' => 'For Sale',
//                'add_new_item' => 'Add New For Sale',
//                'new_item_name' => "New Category",
//            ),
//            'public' => true,
//            'hierarchical' => true,
//            'show_in_rest' => true,
//            'description' => 'Used to define the For Sale'
//        )
//    );
//    register_taxonomy(
//        'for-rent',
//        'products',
//        array(
//            'labels' => array(
//                'name' => 'Tööriistade rent',
//                'singular_name' => 'For Rent',
//                'add_new_item' => 'Add New For Rent',
//                'new_item_name' => "New Category",
//            ),
//            'public' => true,
//            'hierarchical' => true,
//            'show_in_rest' => true,
//            'description' => 'Used to define the For Rent'
//        )
//    );
//    register_taxonomy(
//        'general',
//        'products',
//        array(
//            'labels' => array(
//                'name' => 'Metallitöö',
//                'singular_name' => 'General',
//                'add_new_item' => 'Add New General',
//                'new_item_name' => "New Category",
//            ),
//            'public' => true,
//            'hierarchical' => true,
//            'show_in_rest' => true,
//            'description' => 'Used to define the Tool Category'
//        )
//    );
//
//
//  }
//}
//
//
