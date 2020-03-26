<?php
/**
 * Plugin Name: UCSC Science/PBSci Custom Functionality
 * Plugin URI: https://github.com/ucsc/pbsci-core-functionality-plugin
 * Description: Contains custom functionality. Theme independent.
 * Version: 1.2.0
 * Author: Jason Chafin, Senior Developer, UC Santa Cruz Communications & Marketing
 * Author URI: https://github.com/Herm71
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
require_once( UCSC_DIR . '/lib/external-urls.php' );
require_once( UCSC_DIR . '/lib/functions/fields.php' );

// Post Types
require_once( UCSC_DIR . '/lib/functions/post-types.php' );

// Taxonomies
require_once( UCSC_DIR . '/lib/functions/taxonomies.php' );

// Shortcodes
require_once( UCSC_DIR . '/lib/functions/shortcodes.php' );

// General
require_once( UCSC_DIR . '/lib/functions/general.php' );