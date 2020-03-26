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
 * @param array $field_names | ACF field names.
 * @return array
 */
function ucsc_acf_get_choices_fields( $field_names = [] ) {
	global $wpdb;

	$sql = "SELECT ID FROM {$wpdb->posts} WHERE post_type = 'acf-field' AND post_content LIKE '%\"choices\"%'";
	
	// Field names are stored as post_excerpt.
	if ( !empty( $field_names ) ) {
		if ( !is_array( $field_names ) ) {
			$field_names = [ $field_names ];
		}
		$field_names = esc_sql( $field_names );
		$sql .= " AND post_excerpt IN ('" . implode("','", $field_names) . "')";
	}

	$field_ids = $wpdb->get_col( $sql, 0 );

	if ( empty( $field_ids ) ) {
		return [];
	}
	
	$choices_fields = [];
	$posts = get_posts( [
		'posts_per_page' => -1,
		'post_type' => 'acf-field',
		'orderby' => 'post_title',
		'order'	=> 'ASC',
		'suppress_filters' => true, // DO NOT allow WPML to modify the query
		'cache_results'	=> true,
		'update_post_meta_cache' => false,
		'update_post_term_cache' => false,
		'ignore_sticky_posts' => true,
		'post__in' => $field_ids,
	] );

	foreach ($posts as $post) {
		$choices_fields[ $post->post_excerpt ] = [
			'ID' => $post->ID,
			'name' => $post->post_excerpt,
			'label' => $post->post_title,
			'choices' => maybe_unserialize( $post->post_content )['choices'],
		];
	}

	return $choices_fields;
}