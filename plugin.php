<?php
/**
 * Plugin Name: Blackbird Custom Functionality
 * Plugin URI: https://github.com/Herm71/blackbird-core-functionality-plugin.git
 * Description: Contains custom functionality. Theme independent.
 * Version: 1.1.0
 * Author: Blackbird Consulting
 * Author URI: http://www.blackbirdconsult.com/
 * License: GPL2
 * 
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU 
 * General Public License version 2, as published by the Free Software Foundation.  You may NOT assume 
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without 
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 */

// Plugin Directory 
define( 'BB_DIR', dirname( __FILE__ ) );

//Include Customization files:
 
// Post Types
//include_once( BB_DIR . '/lib/functions/post-types.php' );

// Taxonomies 
//include_once( BB_DIR . '/lib/functions/taxonomies.php' );

// Shortcodes
//include_once( BB_DIR . '/lib/widgets/shortcodes.php' );

// Sidebars
//include_once( BB_DIR . '/lib/widgets/sidebars.php' );

// General
include_once( BB_DIR . '/lib/functions/general.php' );