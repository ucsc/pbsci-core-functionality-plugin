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
		'supports' => array('title','thumbnail','excerpt')
	); 

	register_post_type( 'slider', $args );
}
add_action( 'init', 'ucsc_register_slider_post_type' );	
