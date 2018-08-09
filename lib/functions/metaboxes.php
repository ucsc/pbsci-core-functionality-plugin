<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category PBSciCoreFunctionality
 * @package  CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/CMB2/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

/**
 * 
 * THEME OPTIONS METABOXES
 * 
 */

add_action( 'cmb2_admin_init', 'ucsc_register_theme_options_metabox' );
/**
 * Hook in and register a metabox to handle a theme options page and adds a menu item.
 */
function ucsc_register_theme_options_metabox() {

	/**
	 * Registers options page menu item and form.
	 */
	$cmb_options = new_cmb2_box( array(
		'id'           => 'ucsc_theme_options_page',
		'title'        => esc_html__( 'Theme Options', 'cmb2' ),
		'object_types' => array( 'options-page' ),

		/*
		 * The following parameters are specific to the options-page box
		 * Several of these parameters are passed along to add_menu_page()/add_submenu_page().
		 */

		'option_key'      => 'ucsc_theme_options', // The option key and admin menu page slug.
		'icon_url'        => 'dashicons-palmtree', // Menu icon. Only applicable if 'parent_slug' is left empty.
		// 'menu_title'      => esc_html__( 'Options', 'cmb2' ), // Falls back to 'title' (above).
		// 'parent_slug'     => 'themes.php', // Make options page a submenu item of the themes menu.
		// 'capability'      => 'manage_options', // Cap required to view options-page.
		// 'position'        => 1, // Menu position. Only applicable if 'parent_slug' is left empty.
		// 'admin_menu_hook' => 'network_admin_menu', // 'network_admin_menu' to add network-level options page.
		// 'display_cb'      => false, // Override the options-page form output (CMB2_Hookup::options_page_output()).
		// 'save_button'     => esc_html__( 'Save Theme Options', 'cmb2' ), // The text for the options-page save button. Defaults to 'Save'.
		// 'disable_settings_errors' => true, // On settings pages (not options-general.php sub-pages), allows disabling.
		// 'message_cb'      => 'yourprefix_options_page_message_callback',
		// 'tab_group'       => '', // Tab-group identifier, enables options page tab navigation.
		// 'tab_title'       => null, // Falls back to 'title' (above).
		// 'autoload'        => false, // Defaults to true, the options-page option will be autloaded.
	) );

	/**
	 * Options fields ids only need
	 * to be unique within this box.
	 * Prefix is not needed.
	 */

	// Radio Inline: Number of Slides
	$cmb_options->add_field( array(
		'name' => esc_html__( 'Number of slides in Home slider', 'cmb2' ),
		'desc' => esc_html__( 'Select the number of slides you want on the home page', 'cmb2' ),
		'id'   => 'slide_count',
		'type' => 'radio_inline',
		'before_row' => '<h2 style="font-weight:bold">Slider Options</h2>',
		// 'show_option_none' => 'No Selection',
		'options'          => array(
			'one' => esc_html__( 'One', 'cmb2' ),
			'two'   => esc_html__( 'Two', 'cmb2' ),
			'three'     => esc_html__( 'Three', 'cmb2' ),
			'four'     => esc_html__( 'Four', 'cmb2' ),
			'five'     => esc_html__( 'Five', 'cmb2' ),
			'six'     => esc_html__( 'Six', 'cmb2' ),
			'seven'     => esc_html__( 'Seven', 'cmb2' ),
			'eight'     => esc_html__( 'Eight', 'cmb2' ),
			'nine'     => esc_html__( 'Nine', 'cmb2' ),
			'ten'     => esc_html__( 'Ten', 'cmb2' ),
		),
		// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
		// 'repeatable' => true,
	) );

	// Radio Inline: Slide animation
	// $cmb_options->add_field( array(
		// 'name' => esc_html__( 'Slide animation', 'cmb2' ),
		// 'desc' => esc_html__( 'Select the type of animation for the slides', 'cmb2' ),
		// 'id'   => 'slide_animate',
		// 'type' => 'radio_inline',
		// 'show_option_none' => 'No Selection',
		// 'options'          => array(
			// 'fade' => esc_html__( 'Fade', 'cmb2' ),
			// 'slide'   => esc_html__( 'Slide', 'cmb2' ),
		// ),
		// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
		// 'repeatable' => true,
	// ) );


}

/**
 * 
 * SLIDER METABOXES
 * 
 */

add_action( 'cmb2_admin_init', 'ucsc_slider_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function ucsc_slider_metaboxes() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_ucsc_';

	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'slider_metabox',
		'title'         => __( 'Slider Metabox', 'cmb2' ),
		'object_types'  => array( 'slider', ), // Post type
		'context'       => 'normal',
		'priority'      => 'core',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );

	// Regular text field
	$cmb->add_field( array(
		'name'       => __( 'Slide Title Headline', 'cmb2' ),
		'desc'       => __( 'enter the title headline of the slide here (optional)', 'cmb2' ),
		'id'         => $prefix . 'text',
		'type'       => 'text',
		'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
	) );
	// Small Text Area
	$cmb->add_field( array(
		'name' => __('Slide Teaser', 'cmb2' ),
		'desc' => __('enter the slide teaser here (optional)', 'cmb2'),
		'id' => $prefix . 'textareasmall',
		'type' => 'textarea_small',
	));

	// URL text field
	$cmb->add_field( array(
		'name' => __( 'Slide URL', 'cmb2' ),
		'desc' => __( 'paste the url to the slide story here (optional)', 'cmb2' ),
		'id'   => $prefix . 'url',
		'type' => 'text_url',
		// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
		// 'repeatable' => true,
	) );

	// Radio Inline: Layouts
	$cmb->add_field( array(
		'name' => esc_html__( 'Slider Layout', 'cmb2' ),
		'desc' => esc_html__( 'Choose a layout for your headline, teaser and link', 'cmb2' ),
		'id'   => $prefix . 'layout_chooser',
		'type' => 'radio_inline',
		'show_option_none' => 'No Selection',
		'options'          => array(
			'left' => esc_html__( 'Left', 'cmb2' ),
			'right'   => esc_html__( 'Right', 'cmb2' ),
			'top'     => esc_html__( 'Top', 'cmb2' ),
			'bottom'     => esc_html__( 'Bottom', 'cmb2' ),
		),
		// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
		// 'repeatable' => true,
	) );

	// Radio Inline: Background Colors
	$cmb->add_field( array(
		'name' => esc_html__( 'Background Color', 'cmb2' ),
		'desc' => esc_html__( 'Choose a background color for the text area', 'cmb2' ),
		'id'   => $prefix . 'background_chooser',
		'type' => 'radio_inline',
		'show_option_none' => 'No Selection',
		'options'          => array(
			'blue' => esc_html__( 'Blue', 'cmb2' ),
			'gold'   => esc_html__( 'Gold', 'cmb2' ),
			'green'     => esc_html__( 'Green', 'cmb2' ),
			'light-blue'     => esc_html__( 'Light Blue', 'cmb2' ),
			'lime'     => esc_html__( 'Lime', 'cmb2' ),
			'pink'     => esc_html__( 'Pink', 'cmb2' ),
		),
		// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
		// 'repeatable' => true,
	) );


	// Add other metaboxes as needed

}

/**
 * 
 * DIVISIONS METABOXES
 * 
 */

add_action( 'cmb2_admin_init', 'ucsc_division_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function ucsc_division_metaboxes() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_ucsc_';

	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'division_metabox',
		'title'         => __( 'Division Metabox', 'cmb2' ),
		'object_types'  => array( 'division', ), // Post type
		'context'       => 'normal',
		'priority'      => 'core',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );

	$cmb->add_field( array(
		'name' => esc_html__( 'Division Location', 'cmb2' ),
		'desc' => esc_html__( 'Enter the campus location of this division', 'cmb2' ),
		'id'   => $prefix . 'textmedium',
		'type' => 'text_medium',
	) );

	$cmb->add_field( array(
		'name' => esc_html__( 'Division Phone Number', 'cmb2' ),
		'desc' => esc_html__( 'Enter the phone number of this division (123-456-7890)', 'cmb2' ),
		'id'   => $prefix . 'division_phone',
		'type' => 'text_medium',
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
		)
	) );

	$cmb->add_field( array(
		'name' => esc_html__( 'Division Website', 'cmb2' ),
		'desc' => esc_html__( 'Enter the Division website url', 'cmb2' ),
		'id'   => $prefix . 'url',
		'type' => 'text_url',
		// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
		// 'repeatable' => true,
	) );

	$cmb->add_field( array(
		'name' => esc_html__( 'Division Address', 'cmb2' ),
		'desc' => esc_html__( 'Enter the address of this division', 'cmb2' ),
		'id'   => $prefix . 'division_address',
		'type' => 'address',
	) );

	$cmb->add_field( array(
		'name'    => __( 'Departments', 'cmb2' ),
		'desc'    => __( 'Drag posts from the left column to the right column to attach them to this page.<br />You may rearrange the order of the posts in the right column by dragging and dropping.', 'cmb2' ),
		'id'      => $prefix .'attached_cmb2_attached_departments',
		'type'    => 'custom_attached_posts',
		'column'  => true, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
		'options' => array(
			'show_thumbnails' => true, // Show thumbnails on the left
			'filter_boxes'    => true, // Show a text box for filtering the results
			'query_args'      => array(
				'posts_per_page' => 10,
				'post_type'      => 'department',
			), // override the get_posts args
		),
	) );
}

/**
 * 
 * DEPARTMENT METABOXES
 * 
 */

add_action( 'cmb2_admin_init', 'ucsc_department_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function ucsc_department_metaboxes() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_ucsc_';

	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'department_metabox',
		'title'         => __( 'Department Metabox', 'cmb2' ),
		'object_types'  => array( 'department', ), // Post type
		'context'       => 'normal',
		'priority'      => 'core',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );

	$cmb->add_field( array(
		'name' => esc_html__( 'Department Blurb', 'cmb2' ),
		'desc' => esc_html__( 'Enter a short description of the department here', 'cmb2' ),
		'id'   => $prefix . 'department_blurb_wysiwyg',
		'type' => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
	) );

	$cmb->add_field( array(
		'name' => esc_html__( 'Department Location', 'cmb2' ),
		'desc' => esc_html__( 'Enter the campus location of this department', 'cmb2' ),
		'id'   => $prefix . 'textmedium',
		'type' => 'text_medium',
	) );

	$cmb->add_field( array(
		'name' => esc_html__( 'Department Phone Number', 'cmb2' ),
		'desc' => esc_html__( 'Enter the phone number of this department', 'cmb2' ),
		'id'   => $prefix . 'department_phone',
		'type' => 'text_medium',
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
		)
	) );

	$cmb->add_field( array(
		'name' => esc_html__( 'Department Website', 'cmb2' ),
		'desc' => esc_html__( 'Enter the Department website url', 'cmb2' ),
		'id'   => $prefix . 'url',
		'type' => 'text_url',
		// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
		// 'repeatable' => true,
	) );

	$cmb->add_field( array(
		'name' => esc_html__( 'Department Address', 'cmb2' ),
		'desc' => esc_html__( 'Enter the address of this department', 'cmb2' ),
		'id'   => $prefix . 'department_address',
		'type' => 'address',
	) );

}

/**
 * 
 * PROGRAMS METABOXES
 * 
 */

add_action( 'cmb2_admin_init', 'ucsc_program_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function ucsc_program_metaboxes() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_ucsc_';

	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'program_metabox',
		'title'         => __( 'Program Metabox', 'cmb2' ),
		'object_types'  => array( 'program', ), // Post type
		'context'       => 'normal',
		'priority'      => 'core',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );

	$cmb->add_field( array(
		'name' => esc_html__( 'Program Subtitle', 'cmb2' ),
		'desc' => esc_html__( 'Enter a subtitle here (optional)', 'cmb2' ),
		'id'   => $prefix . 'program_subtitle_text',
		'type' => 'text',
	) );

	$cmb->add_field( array(
		'name' => esc_html__( 'Program Blurb', 'cmb2' ),
		'desc' => esc_html__( 'Enter a short description of the program here', 'cmb2' ),
		'id'   => $prefix . 'program_blurb_wysiwyg',
		'type' => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
	) );

	$cmb->add_field( array(
		'name'    => __( 'Department link', 'cmb2' ),
		'desc'    => __( 'Drag posts from the left column to the right column to attach them to this page.<br />You may rearrange the order of the posts in the right column by dragging and dropping.', 'cmb2' ),
		'id'      => $prefix .'attached_cmb2_attached_department',
		'type'    => 'custom_attached_posts',
		'column'  => true, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
		'options' => array(
			'show_thumbnails' => true, // Show thumbnails on the left
			'filter_boxes'    => true, // Show a text box for filtering the results
			'query_args'      => array(
				'posts_per_page' => 10,
				'post_type'      => 'department',
			), // override the get_posts args
		),
	) );

	$cmb->add_field( array(
		'name'    => __( 'Degree requirements', 'cmb2' ),
		'desc'    => __( 'Drag posts from the left column to the right column to attach them to this page.<br />You may rearrange the order of the posts in the right column by dragging and dropping.', 'cmb2' ),
		'id'      => $prefix .'attached_cmb2_attached_majors',
		'type'    => 'custom_attached_posts',
		'column'  => true, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
		'options' => array(
			'show_thumbnails' => true, // Show thumbnails on the left
			'filter_boxes'    => true, // Show a text box for filtering the results
			'query_args'      => array(
				'posts_per_page' => 10,
				'post_type'      => 'major',
			), // override the get_posts args
		),
	) );
}

/**
 * 
 * MAJORS METABOXES
 * 
 */

add_action( 'cmb2_admin_init', 'ucsc_major_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function ucsc_major_metaboxes() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_ucsc_';

	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'major_metabox',
		'title'         => __( 'Major Metabox', 'cmb2' ),
		'object_types'  => array( 'major', ), // Post type
		'context'       => 'normal',
		'priority'      => 'core',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );

	$cmb->add_field( array(
		'name'    => esc_html__( 'Components of this Major', 'cmb2' ),
		'desc'    => esc_html__( 'check the various aspects this major includes', 'cmb2' ),
		'id'      => $prefix . 'major_components_multicheckbox',
		'type'    => 'multicheck',
		// 'multiple' => true, // Store values in individual rows
		'options' => array(
			'overview' => esc_html__( 'Overview', 'cmb2' ),
			'bachelors' => esc_html__( 'Bachelor\'s', 'cmb2' ),
			'minor' => esc_html__( 'Minor', 'cmb2' ),
			'masters' => esc_html__( 'Master\'s', 'cmb2' ),
			'doctoral' => esc_html__( 'Doctoral', 'cmb2' ),
			'faculty' => esc_html__( 'Faculty', 'cmb2' ),
			'courses' => esc_html__( 'Courses', 'cmb2' ),
		),
		'inline'  => true, // Toggles display to inline
	) );

	// $cmb->add_field( array(
	// 	'name' => esc_html__( 'Study and Research Opportunities', 'cmb2' ),
	// 	'desc' => esc_html__( 'Describe study and research opportunities here', 'cmb2' ),
	// 	'id'   => $prefix . 'research_wysiwyg',
	// 	'type' => 'wysiwyg',
	// 	'options' => array(
	// 		'textarea_rows' => 5,
	// 	),
	// ) );

	// $cmb->add_field( array(
	// 	'name' => esc_html__( 'Information for First Year Students', 'cmb2' ),
	// 	'desc' => esc_html__( 'Include information for first year students here', 'cmb2' ),
	// 	'id'   => $prefix . 'first_year_wysiwyg',
	// 	'type' => 'wysiwyg',
	// 	'options' => array(
	// 		'textarea_rows' => 5,
	// 	),
	// ) );

	// $cmb->add_field( array(
	// 	'name' => esc_html__( 'Information for Transfer Students', 'cmb2' ),
	// 	'desc' => esc_html__( 'Include information for transfer students here', 'cmb2' ),
	// 	'id'   => $prefix . 'transfer_wysiwyg',
	// 	'type' => 'wysiwyg',
	// 	'options' => array(
	// 		'textarea_rows' => 5,
	// 	),
	// ) );

}

add_action( 'cmb2_admin_init', 'ucsc_register_repeatable_major_components_metabox' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function ucsc_register_repeatable_major_components_metabox() {
	$prefix = '_ucsc_';

	/**
	 * Repeatable Field Groups
	 */
	$cmb_group = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => esc_html__( 'Repeating Component Field Group', 'cmb2' ),
		'object_types' => array( 'major' ),
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$group_field_id = $cmb_group->add_field( array(
		'id'          => $prefix . 'major_components_group',
		'type'        => 'group',
		'description' => esc_html__( 'Generates reusable form entries', 'cmb2' ),
		'options'     => array(
			'group_title'   => esc_html__( 'Major Component {#}', 'cmb2' ), // {#} gets replaced by row number
			'add_button'    => esc_html__( 'Add Another Major Component', 'cmb2' ),
			'remove_button' => esc_html__( 'Remove Major Component', 'cmb2' ),
			'sortable'      => true,
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );

	/**
	 * Group fields works the same, except ids only need
	 * to be unique to the group. Prefix is not needed.
	 *
	 * The parent field's id needs to be passed as the first argument.
	 */
	$cmb_group->add_group_field($group_field_id, array(
		'name'    => esc_html__( 'Major Component', 'cmb2' ),
		'desc'    => esc_html__( 'which major component is this?', 'cmb2' ),
		'id'      => 'major_component_checkbox',
		'type'    => 'select',
		'show_option_none' => true,
		// 'default' => 'Select One',
		'options' => array(
			'overview' => esc_html__( 'Overview', 'cmb2' ),
			'bachelors' => esc_html__( 'Bachelor\'s', 'cmb2' ),
			'minor' => esc_html__( 'Minor', 'cmb2' ),
			'masters' => esc_html__( 'Master\'s', 'cmb2' ),
			'doctoral' => esc_html__( 'Doctoral', 'cmb2' ),
			'faculty' => esc_html__( 'Faculty', 'cmb2' ),
			'courses' => esc_html__( 'Courses', 'cmb2' ),
		),
		'inline'  => true, // Toggles display to inline
	) );

	$cmb_group->add_group_field($group_field_id, array(
		'name' => esc_html__( 'Component text', 'cmb2' ),
		'desc' => esc_html__( 'Include description of component here', 'cmb2' ),
		'id'   => 'major_component_wysiwyg',
		'type' => 'wysiwyg',
		'options' => array(
			'wpautop' => true,
			'textarea_rows' => 5,
		),
	) );

	$cmb_group->add_group_field($group_field_id, array(
		'name' => esc_html__( 'Component text', 'cmb2' ),
		'desc' => esc_html__( 'Include description of component here', 'cmb2' ),
		'id'   => 'major_component_text',
		'type' => 'textarea',
	) );
}