<?php
/**
 * Post Types
 *
 * This file registers any custom post types
 *
 * @package      Core_Functionality
 * @since        1.0.0
 * @link         https://github.com/billerickson/Core-Functionality
 * @author       Jason Chafin <jchafin@ucsc.edu>
 * @copyright    Copyright (c) 2018, Jason Chafin
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

/**
 * Create Slider post type
 * @since 1.0.0
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */

function ucsc_register_slide_post_type() {
	$labels = array(
		'name' => 'Slides',
		'singular_name' => 'Slide',
		'add_new' => 'Add Slide',
		'add_new_item' => 'Add New Slide',
		'edit_item' => 'Edit Slide',
		'new_item' => 'New Slide',
		'view_item' => 'View Slide',
		'search_items' => 'Search Slides',
		'not_found' =>  'No slides found',
		'not_found_in_trash' => 'No slides found in trash',
		'parent_item_colon' => '',
		'menu_name' => 'Slides'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => false,
		'hierarchical' => false,
		'menu_position' => null,
		'menu_icon' => 'dashicons-images-alt2',
		'show_in_rest'       => true,
  		'rest_base'          => 'slide-api',
  		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'supports' => array('title','thumbnail')
	);

	register_post_type( 'slide', $args );
}
add_action( 'init', 'ucsc_register_slide_post_type' );

/**
 * Register Divisions Post Type
 */

function ucsc_register_division_post_type() {
	$labels = array(
		'name' => 'Divisions',
		'singular_name' => 'Division',
		'add_new' => 'Add New Division',
		'add_new_item' => 'Add New Division',
		'edit_item' => 'Edit Division',
		'new_item' => 'New Division',
		'view_item' => 'View Division',
		'search_items' => 'Search Divisions',
		'not_found' =>  'No Divisions found',
		'not_found_in_trash' => 'No Divisions found in trash',
		'parent_item_colon' => '',
		'menu_name' => 'Divisions'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => false,
		'hierarchical' => false,
		'menu_position' => null,
		'menu_icon' => 'dashicons-book-alt',
		'show_in_rest'       => true,
  		'rest_base'          => 'divisions-api',
  		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'supports' => array('title','thumbnail','editor')
	);

	register_post_type( 'division', $args );
}
// add_action( 'init', 'ucsc_register_division_post_type' );

/**
 * Register Departments Post Type
 */

function ucsc_register_department_post_type() {
	$labels = array(
		'name' => 'Departments',
		'singular_name' => 'Department',
		'add_new' => 'Add New Department',
		'add_new_item' => 'Add New Department',
		'edit_item' => 'Edit Department',
		'new_item' => 'New Department',
		'view_item' => 'View Department',
		'search_items' => 'Search Departments',
		'not_found' =>  'No Departments found',
		'not_found_in_trash' => 'No Departments found in trash',
		'parent_item_colon' => '',
		'menu_name' => 'Departments'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'menu_icon' => 'dashicons-book-alt',
		'show_in_rest'       => true,
  		'rest_base'          => 'departments-api',
  		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'supports' => array('title','thumbnail')
	);

	register_post_type( 'department', $args );
}
add_action( 'init', 'ucsc_register_department_post_type' );

/**
 * Register Degrees Post Type
 */

function ucsc_register_degree_post_type() {
	$labels = array(
		'name' => 'Degrees',
		'singular_name' => 'Degree',
		'add_new' => 'Add New Degree',
		'add_new_item' => 'Add New Degree',
		'edit_item' => 'Edit Degree',
		'new_item' => 'New Degree',
		'view_item' => 'View Degree',
		'search_items' => 'Search Degrees',
		'not_found' =>  'No Degrees found',
		'not_found_in_trash' => 'No Degrees found in trash',
		'parent_item_colon' => '',
		'menu_name' => 'Degrees'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'menu_icon' => 'dashicons-book',
		'show_in_rest'       => true,
  		'rest_base'          => 'degrees-api',
  		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'supports' => array('title','thumbnail','excerpt')
	);

	register_post_type( 'degree', $args );
}
add_action( 'init', 'ucsc_register_degree_post_type' );



