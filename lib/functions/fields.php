<?php

/**
 * Dynamically provide the post type value options to ACF fields.
 * 
 * @link https://www.advancedcustomfields.com/resources/dynamically-populate-a-select-fields-choices/
 */
function ucsc_post_type_field_options( $field ) {
    $field['choices'] = [];

    // Get all the desirable post types
    $types = get_post_types( [
        'public' => true,
        '_builtin' => true,
    ], 'objects' );
    $types += get_post_types( [
        'public' => true,
        '_builtin' => false,
        'publicly_queryable' => true,
    ], 'objects' );

    foreach ( $types as $type ) {
        $field['choices'][ $type->name ] = $type->label;
    }

    return $field;
}
add_filter('acf/load_field/name=cta_visibility_post_type', 'ucsc_post_type_field_options');
add_filter('acf/load_field/name=fc_query_post_type', 'ucsc_post_type_field_options');

/**
 * Dynamically provide the taxonomy value options to ACF fields.
 * 
 * @link https://www.advancedcustomfields.com/resources/dynamically-populate-a-select-fields-choices/
 */
function ucsc_taxonomy_field_options( $field ) {
    $field['choices'] = [];

    // Get all the desirable post types
    $types = get_taxonomies( [
        'show_ui' => true,
        '_builtin' => false,
    ], 'objects' );

    foreach ( $types as $type ) {
        $field['choices'][ $type->name ] = $type->label;
    }

    return $field;
}
add_filter('acf/load_field/name=filter_taxonomy', 'ucsc_taxonomy_field_options');

/**
 * Dynamically provide
 * 
 * @link https://www.advancedcustomfields.com/resources/dynamically-populate-a-select-fields-choices/
 */
function ucsc_choices_fields_as_field_options( $field ) {
    $field['choices'] = [];
	$choices_fields = ucsc_acf_get_choices_fields();

	if ( isset( $choices_fields[ $field['name'] ] ) ) {
		unset( $choices_fields[ $field['name'] ] );
	}

	foreach ( $choices_fields as $_field ) {
		$field['choices'][ $_field['name'] ] = $_field['label'];
	}

    return $field;
}
add_filter('acf/load_field/name=filter_field', 'ucsc_choices_fields_as_field_options');

/**
 * Helper function get all ACF fields that offer choices.
 *
 * @return array
 */
function ucsc_acf_get_choices_fields() {
	$choices_fields = [];
	$posts = get_posts( [
		'posts_per_page' => -1,
		'post_type' => 'acf-field',
		'orderby' => 'title',
		'order'	=> 'ASC',
		'suppress_filters' => true, // DO NOT allow WPML to modify the query
		'cache_results'	=> true,
		'update_post_meta_cache' => false,
		'update_post_term_cache' => false,
		'ignore_sticky_posts' => true,
	] );

	foreach ($posts as $post) {
		$config = maybe_unserialize( $post->post_content );
		if ( !isset( $config['choices'] ) ) {
			continue;
		}
		$choices_fields[ $post->post_excerpt ] = [
			'ID' => $post->ID,
			'name' => $post->post_excerpt,
			'label' => $post->post_title,
			'choices' => $config['choices'],
		];
	}

	return $choices_fields;
}
