<?php
/**
 * Plugin Name: UCSC PBSci Custom Functionality
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
define( 'BB_DIR', dirname( __FILE__ ) );

//Include Customization files:

// Post Types
require_once( BB_DIR . '/lib/functions/post-types.php' );

// Taxonomies
require_once( BB_DIR . '/lib/functions/taxonomies.php' );

// Metaboxes
// require_once( BB_DIR . '/lib/functions/metaboxes.php' );
// require_once( BB_DIR . '/lib/functions/example-metaboxes.php' );
// require_once( BB_DIR . '/lib/functions/cmb2-extended/address-field-return-template.php' );
// require_once( BB_DIR . '/lib/functions/cmb2-extended/cmb2-attached-posts/cmb2-attached-posts-field.php' );

// Shortcodes
//require_once( BB_DIR . '/lib/functions/shortcodes.php' );

// Sidebars
//require_once( BB_DIR . '/lib/functions/sidebars.php' );

// Widgets
require_once( BB_DIR . '/lib/functions/widgets.php' );

// General
require_once( BB_DIR . '/lib/functions/general.php' );