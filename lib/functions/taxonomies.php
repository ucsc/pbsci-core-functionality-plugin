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
			'show_in_rest'       => true, //Required for Gutenberg editor
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
			'show_in_rest'       => true, //Required for Gutenberg editor
		)
	);
}
// add_action( 'init', 'ucsc_register_program_taxonomy' );

/**
 * Create Student Support Resources Taxonomy
 * @since 1.0.0
 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
 */

function ucsc_register_student_support_resources_taxonomy() {
	$labels = array(
		'name' => 'Student Support Resources Category',
		'singular_name' => 'Student Support Resources Category',
		'search_items' =>  'Search Student Support Resources Categories',
		'all_items' => 'All Student Support Resources Categories',
		'parent_item' => 'Parent Student Support Resources Category',
		'parent_item_colon' => 'Parent Student Support Resources Category:',
		'edit_item' => 'Edit Student Support Resources Category',
		'update_item' => 'Update Student Support Resources Category',
		'add_new_item' => 'Add Student Support Resources Category',
		'new_item_name' => 'New Student Support Resources Category',
		'menu_name' => 'Student Support Resources Categories'
	);

	register_taxonomy( 'student-support-resources-tax', 'student-support',
		array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'student-support-resources-tax' ),
			'show_in_rest' => true, //Required for Gutenberg editor
			'rest_base' => 'student-support-resources-tax-api',
  			'rest_controller_class' => 'WP_REST_Terms_Controller',
		)
	);
}
add_action( 'init', 'ucsc_register_student_support_resources_taxonomy' );

/**
 * Create Researcher/Faculty Labs Taxonomy
 * @since 1.0.0
 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
 */

function ucsc_register_researcher_faculty_labs_taxonomy() {
	$labels = array(
		'name' => 'Labs Category',
		'singular_name' => 'Labs Category',
		'search_items' =>  'Search Labs Categories',
		'all_items' => 'All Labs Categories',
		'parent_item' => 'Parent Labs Category',
		'parent_item_colon' => 'Parent Labs Category:',
		'edit_item' => 'Edit Labs Category',
		'update_item' => 'Update Labs Category',
		'add_new_item' => 'Add Labs Category',
		'new_item_name' => 'New Labs Category',
		'menu_name' => 'Labs Categories'
	);

	register_taxonomy( 'researcher-faculty-labs-tax', 'labs',
		array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'researcher-faculty-labs-tax' ),
			'show_in_rest' => true, //Required for Gutenberg editor
			'rest_base' => 'researcher-faculty-labs-tax-api',
  			'rest_controller_class' => 'WP_REST_Terms_Controller',
		)
	);
}
add_action( 'init', 'ucsc_register_researcher_faculty_labs_taxonomy' );