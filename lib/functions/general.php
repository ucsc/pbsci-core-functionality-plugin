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

// Enable shortcodes in widgets
add_filter( 'widget_text', 'shortcode_unautop' );
add_filter('widget_text', 'do_shortcode');

/**
 * Move Featured Image Metabox on 'slide' post type
 * @author Bill Erickson
 * @link http://www.billerickson.net/code/move-featured-image-metabox
 */
add_action('do_meta_boxes', 'ucsc_underscore_slider_image_metabox' );

function ucsc_underscore_slider_image_metabox() {
 remove_meta_box( 'postimagediv', 'slide', 'side' );
 add_meta_box('postimagediv', __('Slide Image'), 'post_thumbnail_meta_box', 'slide', 'normal', 'high');
}

/**
 * Move Yoast Metabox to bottom
 * @author aderaaij
 * @link https://gist.github.com/aderaaij/6767503
 */
function yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

/**
 * Bring Excerpt Metabox to below Title on Degree post type
 * @author
 * @link https://wpartisan.me/tutorials/wordpress-how-to-move-the-excerpt-meta-box-above-the-editor
 */
/**
 * Removes the regular excerpt box. We're not getting rid
 * of it, we're just moving it above the wysiwyg editor
 *
 * @return null
 */
function oz_remove_normal_excerpt() {
    remove_meta_box( 'postexcerpt' , 'degree' , 'normal' );
}
add_action( 'admin_menu' , 'oz_remove_normal_excerpt' );

/**
 * Add the excerpt meta box back in with a custom screen location
 *
 * @param  string $post_type
 * @return null
 */
function oz_add_excerpt_meta_box( $post_type ) {
    if ( in_array( $post_type, array( 'degree' ) ) ) {
        add_meta_box(
            'oz_postexcerpt',
            __( 'Excerpt', 'ucsc-underscore' ),
            'post_excerpt_meta_box',
            $post_type,
            'after_title',
            'high'
        );
    }
}
add_action( 'add_meta_boxes', 'oz_add_excerpt_meta_box' );

/**
 * You can't actually add meta boxes after the title by default in WP so
 * we're being cheeky. We've registered our own meta box position
 * `after_title` onto which we've regiestered our new meta boxes and
 * are now calling them in the `edit_form_after_title` hook which is run
 * after the post tile box is displayed.
 *
 * @return null
 */
function oz_run_after_title_meta_boxes() {
    global $post, $wp_meta_boxes;
    # Output the `below_title` meta boxes:
    do_meta_boxes( get_current_screen(), 'after_title', $post );
}
add_action( 'edit_form_after_title', 'oz_run_after_title_meta_boxes' );

/**
 * Redirect CPT archives to Pages
 *
 */
function ucsc_archive_to_page_redirect() {
    if( is_post_type_archive( 'degree' ) ) {
        wp_redirect( home_url( '/academics/degrees/' ), 301 );
        exit();
	}
	if( is_post_type_archive( 'department' ) ) {
        wp_redirect( home_url( '/academics/departments/' ), 301 );
        exit();
    }
}
add_action( 'template_redirect', 'ucsc_archive_to_page_redirect' );
