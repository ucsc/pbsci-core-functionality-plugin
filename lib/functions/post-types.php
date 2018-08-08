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

function ucsc_register_slider_post_type() {
	$labels = array(
		'name' => 'Slider Items',
		'singular_name' => 'Slider Item',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Slider Item',
		'edit_item' => 'Edit Slider Item',
		'new_item' => 'New Slider Item',
		'view_item' => 'View Slider Item',
		'search_items' => 'Search Slider Items',
		'not_found' =>  'No slider items found',
		'not_found_in_trash' => 'No slider items found in trash',
		'parent_item_colon' => '',
		'menu_name' => 'Slider'
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
  		'rest_base'          => 'slides-api',
  		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'supports' => array('title','thumbnail')
	); 

	register_post_type( 'slider', $args );
}
add_action( 'init', 'ucsc_register_slider_post_type' );	

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
add_action( 'init', 'ucsc_register_division_post_type' );

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
		'has_archive' => false, 
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
 * Register Programs Post Type
 */

function ucsc_register_program_post_type() {
	$labels = array(
		'name' => 'Programs',
		'singular_name' => 'Program',
		'add_new' => 'Add New Program',
		'add_new_item' => 'Add New Program',
		'edit_item' => 'Edit Program',
		'new_item' => 'New Program',
		'view_item' => 'View Program',
		'search_items' => 'Search Programs',
		'not_found' =>  'No Programs found',
		'not_found_in_trash' => 'No Programs found in trash',
		'parent_item_colon' => '',
		'menu_name' => 'Programs'
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
		'menu_icon' => 'dashicons-book',
		'show_in_rest'       => true,
  		'rest_base'          => 'programs-api',
  		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'supports' => array('title','thumbnail')
	); 

	register_post_type( 'program', $args );
}
add_action( 'init', 'ucsc_register_program_post_type' );

/**
 * Register Majors Post Type
 */

function ucsc_register_major_post_type() {
	$labels = array(
		'name' => 'Majors',
		'singular_name' => 'Major',
		'add_new' => 'Add New Major',
		'add_new_item' => 'Add New Major',
		'edit_item' => 'Edit Major',
		'new_item' => 'New Major',
		'view_item' => 'View Major',
		'search_items' => 'Search Majors',
		'not_found' =>  'No Majors found',
		'not_found_in_trash' => 'No Majors found in trash',
		'parent_item_colon' => '',
		'menu_name' => 'Majors'
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
		'menu_icon' => 'dashicons-awards',
		'show_in_rest'       => true,
  		'rest_base'          => 'majors-api',
  		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'supports' => array('title','thumbnail','editor')
	); 

	register_post_type( 'major', $args );
}
add_action( 'init', 'ucsc_register_major_post_type' );

