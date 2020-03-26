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
function bb_custom_functionality_hidden($r, $url)
{
    if (0 !== strpos($url, 'http://api.wordpress.org/plugins/update-check'))
        return $r; // Not a plugin update request. Bail immediately.
    $plugins = unserialize($r['body']['plugins']);
    unset($plugins->plugins[plugin_basename(__FILE__)]);
    unset($plugins->active[array_search(plugin_basename(__FILE__), $plugins->active)]);
    $r['body']['plugins'] = serialize($plugins);
    return $r;
}
add_filter('http_request_args', 'bb_custom_functionality_hidden', 5, 2);

/**
 * Production URL 
 *
 */
function prefix_production_url( $url ) {
	return 'https://science.ucsc.edu';
}
add_filter( 'be_media_from_production_url', 'prefix_production_url' );

/**
 * Enqueue custom Admin CSS
 */

function ucsc_load_custom_wp_admin_style(){
    wp_register_style( 'ucsc-custom-wp-admin-style', UCSC_PLUG_URL . 'lib/styles/admin-style.css', false, '1.0.0' );
    wp_enqueue_style( 'ucsc-custom-wp-admin-style' );
    wp_enqueue_style('fontawesome-admin', 'https://use.fontawesome.com/releases/v5.8.1/css/all.css', '', '5.8.1', 'all'); 
}
add_action('admin_enqueue_scripts', 'ucsc_load_custom_wp_admin_style');

// Enable shortcodes in widgets
add_filter('widget_text', 'shortcode_unautop');
add_filter('widget_text', 'do_shortcode');

/**
 * Move Featured Image Metabox on 'slide' post type
 * @author Bill Erickson
 * @link http://www.billerickson.net/code/move-featured-image-metabox
 */
add_action('do_meta_boxes', 'ucsc_underscore_slider_image_metabox');

function ucsc_underscore_slider_image_metabox()
{
    remove_meta_box('postimagediv', 'slide', 'side');
    add_meta_box('postimagediv', __('Slide Image'), 'post_thumbnail_meta_box', 'slide', 'normal', 'high');
}

/**
 * Move Yoast Metabox to bottom
 * @author aderaaij
 * @link https://gist.github.com/aderaaij/6767503
 */
function yoasttobottom()
{
    return 'low';
}
add_filter('wpseo_metabox_prio', 'yoasttobottom');

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
function oz_remove_normal_excerpt()
{
    remove_meta_box('postexcerpt', 'degree', 'normal');
}
add_action('admin_menu', 'oz_remove_normal_excerpt');

/**
 * Add the excerpt meta box back in with a custom screen location
 *
 * @param  string $post_type
 * @return null
 */
function oz_add_excerpt_meta_box($post_type)
{
    if (in_array($post_type, array('degree'))) {
        add_meta_box(
            'oz_postexcerpt',
            __('Excerpt', 'ucsc-underscore'),
            'post_excerpt_meta_box',
            $post_type,
            'after_title',
            'high'
        );
    }
}
add_action('add_meta_boxes', 'oz_add_excerpt_meta_box');

/**
 * You can't actually add meta boxes after the title by default in WP so
 * we're being cheeky. We've registered our own meta box position
 * `after_title` onto which we've regiestered our new meta boxes and
 * are now calling them in the `edit_form_after_title` hook which is run
 * after the post tile box is displayed.
 *
 * @return null
 */
function oz_run_after_title_meta_boxes()
{
    global $post, $wp_meta_boxes;
    # Output the `below_title` meta boxes:
    do_meta_boxes(get_current_screen(), 'after_title', $post);
}
add_action('edit_form_after_title', 'oz_run_after_title_meta_boxes');

/**
 * Redirect CPT archives to Pages
 *
 */
function ucsc_archive_to_page_redirect()
{
    if (is_post_type_archive('degree')) {
        wp_redirect(home_url('/academics/degrees/'), 301);
        exit();
    }
    if (is_post_type_archive('department')) {
        wp_redirect(home_url('/academics/departments/'), 301);
        exit();
    }
    if (is_post_type_archive('studentopportunities')) {
        wp_redirect(home_url('/research/student-research-opportunities/'), 301);
        exit();
    }
    if (is_post_type_archive('student-support')) {
        wp_redirect(home_url('/academic/student-support/'), 301);
        exit();
    }
    if (is_post_type_archive('institutes-centers')) {
        wp_redirect(home_url('/research/research-groups-facilities/'), 301);
        exit();
    }
    if (is_post_type_archive('labs')) {
        wp_redirect(home_url('/research/faculty-researchers/'), 301);
        exit();
    }
    
}
add_action('template_redirect', 'ucsc_archive_to_page_redirect');

/**
 * Custom Rewrite Rules for Custom Post Types
 *
 * Some custom post types defined in this plugin need to have their slug redirected
 * So we don't mess up any 
 */

 //No rules yet

/**
 * POST FORMATS
 * Add support for WordPress
 * Post Formats: Link Posts
 */
add_action('after_setup_theme', 'ucsc_pbsci_post_formats', 11);
function ucsc_pbsci_post_formats()
{
    add_theme_support('post-formats', array('link'));
}

/*
 *  Filter: link posts
 *  Set link post permalinks to the external URL
 *  go to filter post title for tumblr-style links
 */
function ucsc_pbsci_link_filter($link, $post)
{
    if (has_post_format('link', $post) && get_post_field('post_content', $post->ID, 'display')) {
        $link = get_post_field('post_content', $post->ID, 'display');
    }
    return $link;
}
add_filter('post_link', 'ucsc_pbsci_link_filter', 10, 2);

/**
 * Search for CTAs with visibility options that match the current WP route.
 * 
 * @return array
 */ 
function ucsc_cta_get_visible_ctas() {
    // Simple caching mechanism so this function can be run multiple times
    // without adding load.
    static $ctas = [];

    if ( !empty( $ctas ) ) {
        return $ctas;
    }

    // Search for CTAs visible to the current route.
    if ( is_singular() || is_archive() || is_search() ) {
        $id = get_the_ID();
        $post_type = get_post_type();

        $query = new WP_Query( [
            'post_type' => 'cta',
            'ignore_sticky_posts' => true,
            'meta_query' => [
                'relation' => 'AND',
                [
                    'key' => 'cta_fields_cta_switch',
                    'value' => '1',
                ],
                [
                    'relation' => 'OR',
                    [
                        'key' => 'cta_visibility_post_type',
                        'value' => $post_type,
                        'compare' => 'LIKE',
                    ],
                    [
                        'key' => 'cta_visibility_page',
                        'value' => "\"{$id}\"",
                        'compare' => 'LIKE',
                    ],
                    [
                        'key' => 'cta_visibility_global',
                        'value' => 1,
                    ],
                ]
            ]
        ] );
        
        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();
                $ctas[ get_the_ID() ] = get_post();
            }
            wp_reset_query();
        }
    }

    return $ctas;
}
add_action( 'wp', 'ucsc_cta_get_visible_ctas' );

/**
 * Utility function to get a list of all published departments, grouped by
 * their unit-category.
 * 
 * @return array
 */
function ucsc_get_departments_by_category() {
    $departments = [];

    $posts = get_posts( [
        'post_type' => 'department',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
        'ignore_sticky_posts' => true,
    ] );

    foreach ($posts as $post) {
        $post_terms = get_the_terms( $post, 'unit-category' );

        if ( !empty($post_terms) ) {
            $post->unit_category = $post_terms[0];
            $departments[ $post_terms[0]->name ][] = $post;
        }
    }

    return $departments;
}

/**
 * Get a set of arrays for all taxonomy term objects for a given set of post ids.
 * 
 * @return array
 */
function ucsc_get_all_terms_for_posts( $post_ids ) {
    if ( !is_array( $post_ids ) ) {
        $post_ids = [ $post_ids ];
    }

    // Sanitize here because we can't use prepare replacements for an IN() query.
    array_walk( $post_ids, 'absint' );
    $post_ids_string = implode( ',', $post_ids );

    global $wpdb;
    $sql = "SELECT r.object_id, t.name, t.slug, t.term_id, tt.taxonomy
            FROM {$wpdb->term_relationships} as r
            LEFT JOIN {$wpdb->term_taxonomy} as tt on tt.term_taxonomy_id = r.term_taxonomy_id
            LEFT JOIN {$wpdb->terms} as t on t.term_id = tt.term_id
            WHERE r.object_id IN ({$post_ids_string})
            ";
    $results = $wpdb->get_results( $sql );

    $grouped = [];
    foreach ( $results as $result ) {
        $grouped[ $result->object_id ][] = $result;
    }

    return $grouped;
}
