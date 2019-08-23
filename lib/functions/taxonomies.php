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
 * Not assigned to any post or post type. Used as a template for creating additional taxonomies
 * @since 1.0.0
 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
 */

function ucsc_register_location_taxonomy()
{
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

	register_taxonomy(
		'slider-location',
		array('slider'),
		array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'slider-location'),
			'show_in_rest'       => true, //Required for Gutenberg editor
		)
	);
}
// add_action( 'init', 'ucsc_register_location_taxonomy' );

/**
 * Create Faculty and Researcher Labs Taxonomy
 * Attached to 'Labs' Custom Post Type
 * @since 1.0.0
 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
 */

function ucsc_register_researcher_faculty_labs_taxonomy()
{
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

	register_taxonomy(
		'researcher-faculty-labs-tax',
		'labs',
		array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'researcher-faculty-labs-tax'),
			'show_in_rest' => true, //Required for Gutenberg editor
			'rest_base' => 'researcher-faculty-labs-tax-api',
			'rest_controller_class' => 'WP_REST_Terms_Controller',
		)
	);
}
add_action('init', 'ucsc_register_researcher_faculty_labs_taxonomy');

/**
 * Create Student Opportunities Category
 * Attached to 'studentopportunities' Custom Post Type
 * @since 1.0.0
 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
 */

function ucsc_register_student_opportunities_taxonomy()
{
	$labels = array(
		'name' => 'Student Opportunities Category',
		'singular_name' => 'Student Opportunity Category',
		'search_items' =>  'Search Student Opportunities Categories',
		'all_items' => 'All Student Opportunities Categories',
		'parent_item' => 'Parent Student Opportunity Category',
		'parent_item_colon' => 'Parent Student Opportunity Category:',
		'edit_item' => 'Edit Student Opportunity Category',
		'update_item' => 'Update Student Opportunity Category',
		'add_new_item' => 'Add Student Opportunity Category',
		'new_item_name' => 'New Student Opportunity Category',
		'menu_name' => 'Opportunity Categories'
	);

	register_taxonomy(
		'student-opportunities-tax',
		'studentopportunities',
		array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'student-opportunities-tax'),
			'show_in_rest' => true, //Required for Gutenberg editor
			'rest_base' => 'student-opportunities-tax-api',
			'rest_controller_class' => 'WP_REST_Terms_Controller',
		)
	);
}
add_action('init', 'ucsc_register_student_opportunities_taxonomy');

/**
 * Create Student Opportunities Category
 * Attached to 'student-support' Custom Post Type
 * @since 1.0.0
 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
 */

function ucsc_register_student_support_taxonomy()
{
	$labels = array(
		'name' => 'Student Support',
		'singular_name' => 'Student Support Item',
		'search_items' =>  'Search Student Support Items',
		'all_items' => 'All Student Support Items',
		'parent_item' => 'Parent Student Support Item',
		'parent_item_colon' => 'Parent Student Support Item:',
		'edit_item' => 'Edit Student Support Item',
		'update_item' => 'Update Student Support Item',
		'add_new_item' => 'Add Student Support Item',
		'new_item_name' => 'New Student Support Item',
		'menu_name' => 'Student Support Categories'
	);

	register_taxonomy(
		'student-support-tax',
		'student-support',
		array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'student-support-tax'),
			'show_in_rest' => true, //Required for Gutenberg editor
			'rest_base' => 'student-support-tax-api',
			'rest_controller_class' => 'WP_REST_Terms_Controller',
		)
	);
}
add_action('init', 'ucsc_register_student_support_taxonomy');

/**
 * Create Student Eligibility
 * Attached to 'studentopportunities' and 'student-support' Custom Post Type
 * @since 1.0.0
 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
 */

function ucsc_register_student_opportunities_eligibility()
{
	$labels = array(
		'name' => 'Student Eligibility',
		'singular_name' => 'Student Eligibility Item',
		'search_items' =>  'Search Eligibility Items',
		'all_items' => 'All Student Eligibility Items',
		'parent_item' => 'Parent Student Eligibility Item',
		'parent_item_colon' => 'Parent Student Eligibility Item:',
		'edit_item' => 'Edit Student Eligibility Item',
		'update_item' => 'Update Student Eligibility Item',
		'add_new_item' => 'Add Student Eligibility Item',
		'new_item_name' => 'New Student Eligibility Item',
		'menu_name' => 'Opportunity Eligibility'
	);

	register_taxonomy(
		'student-opp-eligib-tax',
		array('studentopportunities', 'student-support'),
		array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'student-opp-eligib-tax'),
			'show_in_rest' => true, //Required for Gutenberg editor
			'rest_base' => 'student-opportunity-eligibility-tax-api',
			'rest_controller_class' => 'WP_REST_Terms_Controller',
		)
	);
}
add_action('init', 'ucsc_register_student_opportunities_eligibility');

/**
 * Create Student Availability
 * Attached to 'studentopportunities'  and 'student-support' Custom Post Type
 * @since 1.0.0
 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
 */

function ucsc_register_student_opportunities_availability()
{
	$labels = array(
		'name' => 'Opportunity Availability',
		'singular_name' => 'Opportunity Availability Item',
		'search_items' =>  'Search Availability Items',
		'all_items' => 'All Opportunity Availability Items',
		'parent_item' => 'Parent Opportunity Availability Item',
		'parent_item_colon' => 'Parent Opportunity Availability Item:',
		'edit_item' => 'Edit Opportunity Availability Item',
		'update_item' => 'Update Opportunity Availability Item',
		'add_new_item' => 'Add Opportunity Availability Item',
		'new_item_name' => 'New Opportunity Availability Item',
		'menu_name' => 'Opportunity Availability'
	);

	register_taxonomy(
		'student-opp-avail-tax',
		array('studentopportunities', 'student-support'),
		array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'student-opp-avail-tax'),
			'show_in_rest' => true, //Required for Gutenberg editor
			'rest_base' => 'student-opportunity-availability-tax-api',
			'rest_controller_class' => 'WP_REST_Terms_Controller',
		)
	);
}
add_action('init', 'ucsc_register_student_opportunities_availability');

/**
 * Create Research Facility Locations taxonomy
 * Attached to 'institutes-centers' Custom Post Type
 * @since 1.0.0
 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
 */

function ucsc_research_group_location()
{
	$labels = array(
		'name' => 'Research Facility Locations',
		'singular_name' => 'Research Facility Location',
		'search_items' =>  'Search Research Facility Locations',
		'all_items' => 'All Research Facility Locations',
		'parent_item' => 'Parent Research Facility Location',
		'parent_item_colon' => 'Parent Research Facility Location:',
		'edit_item' => 'Edit Research Facility Location',
		'update_item' => 'Update Research Facility Location',
		'add_new_item' => 'Add Research Facility Location',
		'new_item_name' => 'New Research Facility Location',
		'menu_name' => 'Research Facility Locations'
	);

	register_taxonomy(
		'resesarch-group-location-tax',
		'institutes-centers',
		array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'resesarch-group-location-tax'),
			'show_in_rest' => true, //Required for Gutenberg editor
			'rest_base' => 'resesarch-group-location-tax-api',
			'rest_controller_class' => 'WP_REST_Terms_Controller',
		)
	);
}
add_action('init', 'ucsc_research_group_location');

/**
 * Create Research Facility and Lab Area of Expertise taxonomy
 * Attached to 'institutes-centers'  and 'labs' Custom Post Type
 * @since 1.0.0
 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
 */

function ucsc_research_expertise()
{
	$labels = array(
		'name' => 'Areas of Expertise',
		'singular_name' => 'Area of Expertise',
		'search_items' =>  'Search Areas of Expertise',
		'all_items' => 'All Areas of Expertise',
		'parent_item' => 'Parent Area of Expertise',
		'parent_item_colon' => 'Parent Area of Expertise:',
		'edit_item' => 'Edit Area of Expertise',
		'update_item' => 'Update Area of Expertise',
		'add_new_item' => 'Add Area of Expertise',
		'new_item_name' => 'New Area of Expertise',
		'menu_name' => 'Areas of Expertise'
	);

	register_taxonomy(
		'resesarch-area-expertise-tax',
		array('institutes-centers', 'labs'),
		array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'resesarch-area-expertise-tax'),
			'show_in_rest' => true, //Required for Gutenberg editor
			'rest_base' => 'resesarch-area-expertise-tax-api',
			'rest_controller_class' => 'WP_REST_Terms_Controller',
		)
	);
}
add_action('init', 'ucsc_research_expertise');