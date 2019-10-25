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
		'name' => 'Research Opportunities Category',
		'singular_name' => 'Research Opportunity Category',
		'search_items' =>  'Search Research Opportunities Categories',
		'all_items' => 'All Research Opportunities Categories',
		'parent_item' => 'Parent Research Opportunity Category',
		'parent_item_colon' => 'Parent Research Opportunity Category:',
		'edit_item' => 'Edit Research Opportunity Category',
		'update_item' => 'Update Research Opportunity Category',
		'add_new_item' => 'Add Research Opportunity Category',
		'new_item_name' => 'New Research Opportunity Category',
		'menu_name' => 'Research Opportunity Categories'
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
		'name' => 'Academic Support Type',
		'singular_name' => 'Academic Support Item',
		'search_items' =>  'Search Academic Support Items',
		'all_items' => 'All Academic Support Items',
		'parent_item' => 'Parent Academic Support Item',
		'parent_item_colon' => 'Parent Academic Support Item:',
		'edit_item' => 'Edit Academic Support Item',
		'update_item' => 'Update Academic Support Item',
		'add_new_item' => 'Add Academic Support Item',
		'new_item_name' => 'New Academic Support Item',
		'menu_name' => 'Academic Support Types'
	);

	register_taxonomy(
		'student-support-tax',
		'student-support',
		array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'academic-support-tax'),
			'show_in_rest' => true, //Required for Gutenberg editor
			'rest_base' => 'academic-support-tax-api',
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
		'name' => 'Academic Support Eligibility',
		'singular_name' => 'Academic Support Eligibility Item',
		'search_items' =>  'Search Eligibility Items',
		'all_items' => 'All Academic Support Eligibility Items',
		'parent_item' => 'Parent Academic Support Eligibility Item',
		'parent_item_colon' => 'Parent Academic Support Eligibility Item:',
		'edit_item' => 'Edit Academic Support Eligibility Item',
		'update_item' => 'Update Academic Support Eligibility Item',
		'add_new_item' => 'Add Academic Support Eligibility Item',
		'new_item_name' => 'New Academic Support Eligibility Item',
		'menu_name' => 'Academic Support Eligibility'
	);

	register_taxonomy(
		'student-opp-eligib-tax',
		array('studentopportunities', 'student-support'),
		array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'academic-support-eligib-tax'),
			'show_in_rest' => true, //Required for Gutenberg editor
			'rest_base' => 'academic-support-eligib-tax-api',
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
		'name' => 'Academic Support Availability',
		'singular_name' => 'Academic Support Availability Item',
		'search_items' =>  'Search Availability Items',
		'all_items' => 'All Academic Support Availability Items',
		'parent_item' => 'Parent Academic Support Availability Item',
		'parent_item_colon' => 'Parent Academic Support Availability Item:',
		'edit_item' => 'Edit Academic Support Availability Item',
		'update_item' => 'Update Academic Support Availability Item',
		'add_new_item' => 'Add Academic Support Availability Item',
		'new_item_name' => 'New Academic Support Availability Item',
		'menu_name' => 'Academic Support Availability'
	);

	register_taxonomy(
		'student-opp-avail-tax',
		array('studentopportunities', 'student-support'),
		array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'academic-support-avail-tax'),
			'show_in_rest' => true, //Required for Gutenberg editor
			'rest_base' => 'academic-support-avail-tax-api',
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
			'rewrite' => array('slug' => 'research-area-expertise-tax'),
			'show_in_rest' => true, //Required for Gutenbfeatured-taxerg editor
			'rest_base' => 'resesarch-area-expertise-tax-api',
			'rest_controller_class' => 'WP_REST_Terms_Controller',
		)
	);
}
add_action('init', 'ucsc_research_expertise');

/**
 * Create a 'Support Science Category' taxonomy
 * Attached to 'support-science' Custom Post Type
 * @since 1.0.0
 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
 */

function ucsc_support_science_category()
{
	$labels = array(
		'name' => 'Support Science Category',
		'singular_name' => 'Support Science Category',
		'search_items' =>  'Search Support Science Categories',
		'all_items' => 'All Support Science Categories',
		'edit_item' => 'Edit Support Science Categories',
		'update_item' => 'Update Support Science Categories',
		'add_new_item' => 'Add Support Science Category',
		'new_item_name' => 'New Support Science Categories',
		'menu_name' => 'Support Science Categories'
	);

	register_taxonomy(
		'support-science-cat',
		array('support-science'),
		array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'support-science-cat'),
			'show_in_rest' => true, //Required for Gutenberg editor
			'rest_base' => 'featured-tax-api',
			'rest_controller_class' => 'WP_REST_Terms_Controller',
		)
	);
}
add_action('init', 'ucsc_support_science_category');

/**
 * Create a 'Support Science Interest' taxonomy
 * Attached to 'support-science' Custom Post Type
 * @since 1.0.0
 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
 */

function ucsc_support_science_interest()
{
	$labels = array(
		'name' => 'Support Science Interest',
		'singular_name' => 'Support Science Interest',
		'search_items' =>  'Search Support Science Interests',
		'all_items' => 'All Support Science Interests',
		'edit_item' => 'Edit Support Science Interests',
		'update_item' => 'Update Support Science Interests',
		'add_new_item' => 'Add Support Science Interest',
		'new_item_name' => 'New Support Science Interest',
		'menu_name' => 'Support Science by Interest'
	);

	register_taxonomy(
		'support-science-int',
		array('support-science'),
		array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'support-science-int'),
			'show_in_rest' => true, //Required for Gutenberg editor
			// 'rest_base' => 'featured-tax-api',
			'rest_controller_class' => 'WP_REST_Terms_Controller',
		)
	);
}
add_action('init', 'ucsc_support_science_interest');

/**
 * Prevent adding additional terms to Featured taxonomy
 *
 * @since 1.0.0
 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
 * see: https://wordpress.stackexchange.com/questions/112686/how-to-prevent-new-terms-being-added-to-a-custom-taxonomy
 *
 */

// add_action('pre_insert_term', function ($term, $taxonomy) {
// 	return ('featured-tax' === $taxonomy)
// 		? new WP_Error('term_addition_blocked', __('You cannot add terms to this taxonomy'))
// 		: $term;
// }, 0, 2);