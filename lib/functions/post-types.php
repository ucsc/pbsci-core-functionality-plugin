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
		'menu_icon' => 'dashicons-book',
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
 */

function ucsc_register_student_support_post_type()
{
	$labels = array(
		'name' => 'Student Support Resources',
		'singular_name' => 'Student Support Resource',
		'add_new' => 'Add New Student Support Resource',
		'add_new_item' => 'Add New Student Support Resource',
		'edit_item' => 'Edit Student Support Resource',
		'new_item' => 'New Student Support Resource',
		'view_item' => 'View Student Support Resource',
		'search_items' => 'Search Student Support Resources',
		'not_found' =>  'No Student Support Resources found',
		'not_found_in_trash' => 'No Student Support Resources found in trash',
		'parent_item_colon' => '',
		'menu_name' => 'Student Support'
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
		'menu_icon' => 'dashicons-book',
		'show_in_rest'       => true,
		'rest_base'          => 'student-support-resources-api',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'supports' => array('title', 'thumbnail', 'excerpt')
	);

	register_post_type('student-support', $args);
}
add_action('init', 'ucsc_register_student_support_post_type');

/**
 * Register Student Opportunities Post Type
 */

function ucsc_register_student_opportunities_post_type()
{
	$labels = array(
		'name' => 'Student Opportunities',
		'singular_name' => 'Student Opportunity',
		'add_new' => 'Add New Student Opportunity',
		'add_new_item' => 'Add New Student Opportunity',
		'edit_item' => 'Edit Student Opportunity',
		'new_item' => 'New Student Opportunity',
		'view_item' => 'View Student Opportunity',
		'search_items' => 'Search Student Opportunities',
		'not_found' =>  'No Student Opportunities found',
		'not_found_in_trash' => 'No Student Opportunities found in trash',
		'parent_item_colon' => '',
		'menu_name' => 'Student Opportunities'
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
		'menu_icon' => 'dashicons-book',
		'show_in_rest'       => true,
		// 'rest_base'          => 'Student Support Resources-api',
		// 'rest_controller_class' => 'WP_REST_Posts_Controller',
		'supports' => array('title', 'thumbnail', 'excerpt')
	);

	register_post_type('studentopportunities', $args);
}
add_action('init', 'ucsc_register_student_opportunities_post_type');

/**
 * Register Institutes and Centers Post Type
 */

function ucsc_register_institutes_centers_post_type()
{
	$labels = array(
		'name' => 'Institutes and Centers',
		'singular_name' => 'Institute or Center',
		'add_new' => 'Add New Institute or Center',
		'add_new_item' => 'Add New Institute or Center',
		'edit_item' => 'Edit Institute or Center',
		'new_item' => 'New Institute or Center',
		'view_item' => 'View Institute or Center',
		'search_items' => 'Search Institutes and Centers',
		'not_found' =>  'No Institute or Center found',
		'not_found_in_trash' => 'No Institute or Center found in trash',
		'parent_item_colon' => '',
		'menu_name' => 'Institutes and Centers'
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
		'menu_icon' => 'dashicons-book',
		'show_in_rest'       => true,
		// 'rest_base'          => 'Student Support Resources-api',
		// 'rest_controller_class' => 'WP_REST_Posts_Controller',
		'supports' => array('title', 'thumbnail', 'excerpt')
	);

	register_post_type('institutes-centers', $args);
}

add_action('init', 'ucsc_register_institutes_centers_post_type');

/**
 * Register Researcher and Faculty Labs Post Type
 */

function ucsc_register_labs_post_type()
{
	$labels = array(
		'name' => 'Researcher and Faculty Labs',
		'singular_name' => 'Researcher or Faculty Lab',
		'add_new' => 'Add New Researcher or Faculty Lab',
		'add_new_item' => 'Add New Researcher or Faculty Lab',
		'edit_item' => 'Edit Researcher or Faculty Lab',
		'new_item' => 'New Researcher or Faculty Lab',
		'view_item' => 'View Researcher or Faculty Lab',
		'search_items' => 'Search Researcher or Faculty Labs',
		'not_found' =>  'No Researcher or Faculty Lab found',
		'not_found_in_trash' => 'No Researcher or Faculty Lab found in trash',
		'parent_item_colon' => '',
		'menu_name' => 'Labs'
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
		'menu_icon' => 'dashicons-book',
		'show_in_rest' => true,
		// 'rest_base' => 'Student Support Resources-api',
		// 'rest_controller_class' => 'WP_REST_Posts_Controller',
		'supports' => array('title', 'thumbnail', 'excerpt')
	);

	register_post_type('labs', $args);
}
add_action('init', 'ucsc_register_labs_post_type');

/**
 * Register Support Science Post Type
 */

function ucsc_register_suppport_science_post_type()
{
	$labels = array(
		'name' => 'Support Science',
		'singular_name' => 'Support Science Org',
		'add_new' => 'Add New Support Science Org',
		'add_new_item' => 'Add New Support Science Org',
		'edit_item' => 'Edit Support Science Org',
		'new_item' => 'New Support Science Org',
		'view_item' => 'View Support Science Org',
		'search_items' => 'Search Support Science Orgs',
		'not_found' =>  'No Support Science Org found',
		'not_found_in_trash' => 'No Support Science Org found in trash',
		'parent_item_colon' => '',
		'menu_name' => 'Support Science Organizations'
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
		'menu_icon' => 'dashicons-book',
		'show_in_rest' => true,
		// 'rest_base' => 'Student Support Resources-api',
		// 'rest_controller_class' => 'WP_REST_Posts_Controller',
		'supports' => array('title', 'thumbnail', 'excerpt')
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

    // ATTENTION: This is *only* done during plugin activation hook in this example!
    // You should *NEVER EVER* do this on every page load!!
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'ucsc_pbsci_rewrite_flush' );