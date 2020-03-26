<?php

/**
 * Mechanisms for WordPress posts that represent urls on other websites.
 */

/**
 * Alter the permalink for custom post type posts that are configured as external.
 * 
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/post_type_link
 *
 * @param string  $link The post's permalink.
 * @param WP_Post $post      The post in question.
 * @param bool    $leavename Whether to keep the post name.
 * @param bool    $sample    Is it a sample permalink.
 */
function ucsc_pbsci_external_url_alter_permalink( $link, $post, $leavename, $sample) {
	if ( $sample ) {
		return $link;
	}

	$is_external = get_field( 'external_url_switch', $post->ID );
	$external_link = get_field( 'external_url', $post->ID );

	if ( !is_admin() && $is_external && $external_link && filter_var($external_link, FILTER_VALIDATE_URL) !== FALSE ) {
		$link = $external_link;
	}

    return $link;
}
add_filter('post_type_link', 'ucsc_pbsci_external_url_alter_permalink', 20, 4);

/**
 * Redirect non-logged-in users that visit a post that is configured to be external.
 * 
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/template_redirect
 */
function ucsc_pbsci_external_url_redirect() {
	if ( is_singular() && !is_user_logged_in() ) {
		$post = get_post();

		$is_external = get_field( 'external_url_switch', $post->ID );
		$external_link = get_field( 'external_url', $post->ID );

		if ( $is_external && $external_link && filter_var($external_link, FILTER_VALIDATE_URL) !== FALSE ) {
			wp_redirect( $external_link );
			exit;
		}
	}
}
add_action( 'template_redirect', 'ucsc_pbsci_external_url_redirect' );