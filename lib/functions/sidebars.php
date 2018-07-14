<?
/**
 * Custom Sidebars
 *
 * This file contains any custom sidebar registration
 *
 * @package      Core_Functionality
 * @since        1.0.0
 * @link         https://github.com/billerickson/Core-Functionality
 * @author       Jason Chafin <Jason@blackbirdconsult.com>
 * @copyright    Copyright (c) 2012, Jason Chafin
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */



/** Register Home Page widget areas */
genesis_register_sidebar( array(
	'id'			=> 'home-large-image',
	'name'			=> __( 'Home Large Image'),
	'description'	=> __( 'This is the large image on the left of the home page.'),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-copy',
	'name'			=> __( 'Home Copy'),
	'description'	=> __( 'This is the main text on the home page section.'),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-below-copy',
	'name'			=> __( 'Home Below Copy' ),
	'description'	=> __( 'This is the area beneathe the home copy section' ),
) );
