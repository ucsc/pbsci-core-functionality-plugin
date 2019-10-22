<?php
/**
 * Plugin Name: UCSC Custom Functionality
 * Plugin URI: https://github.com/Herm71/blackbird-core-functionality-plugin.git
 * Description: Contains custom functionality. Theme independent.
 * Version: 1.1.0
 * Author: UC Santa Cruz Communications & Marketing
 * Author URI: https://communications.ucsc.edu/
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
define( 'UCSC_DIR', dirname( __FILE__ ) );
define('UCSC_PLUG_URL', plugin_dir_url(__FILE__));

//Include Customization files:

// Post Types
require_once( UCSC_DIR . '/lib/functions/post-types.php' );

// Taxonomies
require_once( UCSC_DIR . '/lib/functions/taxonomies.php' );

// Shortcodes
require_once( UCSC_DIR . '/lib/functions/shortcodes.php' );

// Sidebars
//require_once( UCSC_DIR . '/lib/functions/sidebars.php' );

// Widgets
require_once( UCSC_DIR . '/lib/functions/widgets.php' );

// General
require_once( UCSC_DIR . '/lib/functions/general.php' );