<?php
/**
 * Taxonomies
 *
 * This file registers any custom taxonomies
 *
 * @package      Core_Functionality
 * @since        1.0.0
 * @link         https://github.com/billerickson/Core-Functionality
 * @author       Bill Erickson <bill@billerickson.net>
 * @copyright    Copyright (c) 2011, Bill Erickson
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */


/**
 * Create Slider Location Taxonomy
 * @since 1.0.0
 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
 */

function ucsc_register_location_taxonomy() {
	$labels = array(
		'name' => 'Slider Locations',
		'singular_name' => 'Slider Location',
		'search_items' =>  'Search Slider Locations',
		'all_items' => 'All Slider Locations',
		'parent_item' => 'Parent Slider Location',
		'parent_item_colon' => 'Parent Slider Location:',
		'edit_item' => 'Edit Slider Location',
		'update_item' => 'Update Slider Location',
		'add_new_item' => 'Add New Slider Location',
		'new_item_name' => 'New Slider Location Name',
		'menu_name' => 'Slider Location'
	); 	

	register_taxonomy( 'slider-location', array('slider'), 
		array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'slider-location' ),
		)
	);
}
add_action( 'init', 'ucsc_register_location_taxonomy' );

/**
 * Create Program Type Taxonomy
 * @since 1.0.0
 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
 */

function ucsc_register_program_taxonomy() {
	$labels = array(
		'name' => 'Program Type',
		'singular_name' => 'Program Type',
		'search_items' =>  'Search Program Types',
		'all_items' => 'All Program Types',
		'parent_item' => 'Parent Program Type',
		'parent_item_colon' => 'Parent Program Type:',
		'edit_item' => 'Edit Program Type',
		'update_item' => 'Update Program Type',
		'add_new_item' => 'Add New Program Type',
		'new_item_name' => 'New Program Type Name',
		'menu_name' => 'Program Type'
	); 	

	register_taxonomy( 'program-type', array('program'), 
		array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'program-type' ),
		)
	);
}
add_action( 'init', 'ucsc_register_program_taxonomy' );

/**
 * Create Careers Taxonomy
 * @since 1.0.0
 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
 */

function ucsc_register_degrees_offered_taxonomy() {
	$labels = array(
		'name' => 'Careers',
		'singular_name' => 'Careers',
		'search_items' =>  'Search Careers',
		'all_items' => 'All Careers',
		'parent_item' => 'Parent Careers',
		'parent_item_colon' => 'Parent Careers:',
		'edit_item' => 'Edit Careers',
		'update_item' => 'Update Careers',
		'add_new_item' => 'Add New Degree Offered',
		'new_item_name' => 'New Degree Offered',
		'menu_name' => 'Careers'
	); 	

	register_taxonomy( 'degrees-offered', array('program'), 
		array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'degrees-offered' ),
		)
	);
}
add_action( 'init', 'ucsc_register_degrees_offered_taxonomy' );

/**
 * Create Careers Taxonomy
 * @since 1.0.0
 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
 */

function ucsc_register_careers_taxonomy() {
	$labels = array(
		'name' => 'Careers',
		'singular_name' => 'Career',
		'search_items' =>  'Search Careers',
		'all_items' => 'All Careers',
		'parent_item' => 'Parent Career',
		'parent_item_colon' => 'Parent Career:',
		'edit_item' => 'Edit Careers',
		'update_item' => 'Update Careers',
		'add_new_item' => 'Add New Career',
		'new_item_name' => 'New Career',
		'menu_name' => 'Careers'
	); 	

	register_taxonomy( 'careers', array('major'), 
		array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'careers' ),
		)
	);
}
add_action( 'init', 'ucsc_register_careers_taxonomy' );