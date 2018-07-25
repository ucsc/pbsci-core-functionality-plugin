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
 * Slider Metabox
 */
add_action( 'cmb2_admin_init', 'ucsc_underscore_slider_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function ucsc_underscore_slider_metaboxes() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_ucscpbsci_';

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