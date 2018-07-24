<?php
/**
 * General
 *
 * This file contains any general functions
 *
 * @package      BB_Custom_Functionality
 * @since        1.0.0
 * @link         https://github.com/Herm71/blackbird-core-functionality-plugin.git
 * @author       UC Santa Cruz Communications and Marketing
 * @copyright    Copyright (c) 2015, Blackbird Consulting
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */
 
/**
 * Don't Update Plugin
 * @since 1.0.0
 * 
 * This prevents you being prompted to update if there's a public plugin
 * with the same name.
 *
 * @author Mark Jaquith
 * @link http://markjaquith.wordpress.com/2009/12/14/excluding-your-plugin-or-theme-from-update-checks/
 *
 * @param array $r, request arguments
 * @param string $url, request url
 * @return array request arguments
 */
function bb_custom_functionality_hidden( $r, $url ) {
	if ( 0 !== strpos( $url, 'http://api.wordpress.org/plugins/update-check' ) )
		return $r; // Not a plugin update request. Bail immediately.
	$plugins = unserialize( $r['body']['plugins'] );
	unset( $plugins->plugins[ plugin_basename( __FILE__ ) ] );
	unset( $plugins->active[ array_search( plugin_basename( __FILE__ ), $plugins->active ) ] );
	$r['body']['plugins'] = serialize( $plugins );
	return $r;
}
add_filter( 'http_request_args', 'bb_custom_functionality_hidden', 5, 2 );

// Use shortcodes in widgets
add_filter( 'widget_text', 'do_shortcode' );

/**
 * Move Featured Image Metabox on 'slider' post type
 * @author Bill Erickson
 * @link http://www.billerickson.net/code/move-featured-image-metabox
 */
add_action('do_meta_boxes', 'ucsc_underscore_slider_image_metabox' );

function ucsc_underscore_slider_image_metabox() {
 remove_meta_box( 'postimagediv', 'slider', 'side' );
 add_meta_box('postimagediv', __('Slider Image'), 'post_thumbnail_meta_box', 'slider', 'normal', 'high');
}