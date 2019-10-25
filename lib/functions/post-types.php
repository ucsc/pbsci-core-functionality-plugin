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
 * Register Divisions Post Type
 */

function ucsc_register_division_post_type()
{
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
		'rewrite' => array(
			'with_front' => false,
		),
		'capability_type' => 'post',
		'has_archive' => false,
		'hierarchical' => false,
		'menu_position' => null,
		'menu_icon' => 'dashicons-book-alt',
		'show_in_rest'       => true,
		'rest_base'          => 'divisions-api',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'supports' => array('title', 'thumbnail', 'editor')
	);

	register_post_type('division', $args);
}
// add_action( 'init', 'ucsc_register_division_post_type' );

/**
 * Register Departments Post Type
 */

function ucsc_register_department_post_type()
{
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
		'rewrite' => array(
			'with_front' => false,
			'slug' => 'department',
		),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'menu_icon' => '',
		'show_in_rest'       => true,
		'rest_base'          => 'departments-api',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'supports' => array('title', 'thumbnail', 'excerpt')
	);

	register_post_type('department', $args);
}
add_action('init', 'ucsc_register_department_post_type');

/**
 * Register Degrees Post Type
 */

function ucsc_register_degree_post_type()
{
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
		'rewrite' => array(
			'with_front' => false,
		),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'menu_icon' => '',
		'show_in_rest'       => true,
		'rest_base'          => 'degrees-api',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'supports' => array('title', 'thumbnail', 'excerpt')
	);

	register_post_type('degree', $args);
}
add_action('init', 'ucsc_register_degree_post_type');

/**
 * Register Student Support Post Type
 * 
 * note: Original spec called this "Student Support"
 * It was subsequently changed to "Academic Support";
 * however, the callback needs to stay as is.
 */

function ucsc_register_student_support_post_type()
{
	$labels = array(
		'name' => 'Academic Support Resources',
		'singular_name' => 'Academic Support Resource',
		'add_new' => 'Add New Academic Support Resource',
		'add_new_item' => 'Add New Academic Support Resource',
		'edit_item' => 'Edit Academic Support Resource',
		'new_item' => 'New Academic Support Resource',
		'view_item' => 'View Academic Support Resource',
		'search_items' => 'Search Academic Support Resources',
		'not_found' =>  'No Academic Support Resources found',
		'not_found_in_trash' => 'No Academic Support Resources found in trash',
		'parent_item_colon' => '',
		'menu_name' => 'Academic Support'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array(
			'with_front' => false,
			'slug' => 'academic-support',
		),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'menu_icon' => '',
		'show_in_rest'       => true,
		'rest_base'          => 'academic-support-api',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'supports' => array('title', 'thumbnail', 'excerpt', 'editor')
	);

	register_post_type('student-support', $args);
}
add_action('init', 'ucsc_register_student_support_post_type');

/**
 * Register Student Opportunities Post Type
 * 
 * note: Original spec called this "Student Opportunities"
 * It was subsequently changed to "Research Opportunities";
 * however, the callback needs to stay as is.
 */

function ucsc_register_student_opportunities_post_type()
{
	$labels = array(
		'name' => 'Research Opportunities',
		'singular_name' => 'Research Opportunity',
		'add_new' => 'Add New Research Opportunity',
		'add_new_item' => 'Add New Research Opportunity',
		'edit_item' => 'Edit Research Opportunity',
		'new_item' => 'New Research Opportunity',
		'view_item' => 'View Research Opportunity',
		'search_items' => 'Search Research Opportunities',
		'not_found' =>  'No Research Opportunities found',
		'not_found_in_trash' => 'No Research Opportunities found in trash',
		'parent_item_colon' => '',
		'menu_name' => 'Research Opportunities'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array(
			'with_front' => false,
			'slug' => 'research-opportunities'
		),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'menu_icon' => '',
		'show_in_rest'       => true,
		'rest_base'          => 'research-opportunities-api',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'supports' => array('title', 'thumbnail', 'excerpt', 'editor')
	);

	register_post_type('studentopportunities', $args);
}
add_action('init', 'ucsc_register_student_opportunities_post_type');

/**
 * Register Institutes and Centers Post Type
 * 
 * note: Original spec called this "Institutes and Centers"
 * It was subsequently changed to "Groups and Facilities";
 * however, the callback needs to stay as is.
 */

function ucsc_register_institutes_centers_post_type()
{
	$labels = array(
		'name' => 'Groups & Facilities',
		'singular_name' => 'Group or Facility',
		'add_new' => 'Add New Group or Facility',
		'add_new_item' => 'Add New Group or Facility',
		'edit_item' => 'Edit Group or Facility',
		'new_item' => 'New Group or Facility',
		'view_item' => 'View Group or Facility',
		'search_items' => 'Search Groups & Facilities',
		'not_found' =>  'No Group or Facility found',
		'not_found_in_trash' => 'No Group or Facility found in trash',
		'parent_item_colon' => '',
		'menu_name' => 'Groups & Facilities'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array(
			'with_front' => false,
			'slug' => 'groups-facilities'
		),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'menu_icon' => '',
		'show_in_rest'       => true,
		'rest_base'          => 'groups-facilities-api',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'supports' => array('title', 'thumbnail', 'excerpt', 'editor')
	);

	register_post_type('institutes-centers', $args);
}

add_action('init', 'ucsc_register_institutes_centers_post_type');

/**
 * Register Researcher and Faculty Labs Post Type
 * 
 * note: Original spec called this "Labs"
 * It was subsequently changed to "People";
 * however, the callback needs to stay as is.
 */

function ucsc_register_labs_post_type()
{
	$labels = array(
		'name' => 'Researchers & Faculty',
		'singular_name' => 'Researcher or Faculty',
		'add_new' => 'Add New Researcher or Faculty',
		'add_new_item' => 'Add New Researcher or Faculty',
		'edit_item' => 'Edit Researcher or Faculty',
		'new_item' => 'New Researcher or Faculty',
		'view_item' => 'View Researcher or Faculty',
		'search_items' => 'Search Researchers or Faculty',
		'not_found' =>  'No Researcher or Faculty found',
		'not_found_in_trash' => 'No Researcher or Faculty found in trash',
		'parent_item_colon' => '',
		'menu_name' => 'People'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array(
			'with_front' => false,
			'slug' => 'people',
		),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'menu_icon' => '',
		'show_in_rest' => true,
		'rest_base' => 'people-api',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'supports' => array('title', 'thumbnail', 'excerpt', 'editor')
	);

	register_post_type('labs', $args);
}
add_action('init', 'ucsc_register_labs_post_type');

/**
 * Register Support Science Post Type
 * 
 * note: Original spec called this "Support Science"
 * It was subsequently changed to "Support Funds";
 * however, the callback needs to stay as is.
 * 
 */

function ucsc_register_suppport_science_post_type()
{
	$labels = array(
		'name' => 'Support Science',
		'singular_name' => 'Support Fund',
		'add_new' => 'Add New Support Fund',
		'add_new_item' => 'Add New Support Fund',
		'edit_item' => 'Edit Support Fund',
		'new_item' => 'New Support Fund',
		'view_item' => 'View Support Fund',
		'search_items' => 'Search Support Funds',
		'not_found' =>  'No Support Fund found',
		'not_found_in_trash' => 'No Support Fund found in trash',
		'parent_item_colon' => '',
		'menu_name' => 'Support Funds'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array(
			'with_front' => false,
			'slug' => 'support-funds'
		),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'menu_icon' => '',
		'show_in_rest' => true,
		'rest_base' => 'support-funds-api',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'supports' => array('title', 'thumbnail', 'excerpt', 'editor')
	);

	register_post_type('support-science', $args);
}
add_action('init', 'ucsc_register_suppport_science_post_type');


/**
 * Flush permalink rewrite on activation
 *
 * @return void
 * Flushes permalinks and rewrites them upon plugin activation
 * @package
 * @since
 * @author Jason Chafin
 * @link http://www.blackbirdconsult.com
 * @license GNU General Public License 2.0+
 */
function ucsc_pbsci_rewrite_flush() {
    // First, we "add" the custom post type via the above written function.
    // Note: "add" is written with quotes, as CPTs don't get added to the DB,
    // They are only referenced in the post_type column with a post entry, 
    // when you add a post of this CPT.
	ucsc_register_department_post_type();
	ucsc_register_degree_post_type();
	ucsc_register_student_support_post_type();
	ucsc_register_student_opportunities_post_type();
	ucsc_register_labs_post_type();
	ucsc_register_suppport_science_post_type();

    // ATTENTION: This is *only* done during plugin activation hook in this example!
    // You should *NEVER EVER* do this on every page load!!
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'ucsc_pbsci_rewrite_flush' );