<?php

/**
 * Setup all the post types for our theme.
 */
function wcnyc_post_types() {
	register_post_type( 'recipe', array(
		'labels' => array(
			'name'               => __( 'Recipes', 'wcnyc-2015' ),
			'singular_name'      => __( 'Recipe', 'wcnyc-2015' ),
			'add_new'            => __( 'Add New Recipe', 'wcnyc-2015' ),
			'add_new_item'       => __( 'Add New Recipe', 'wcnyc-2015' ),
			'edit_item'          => __( 'Edit Recipe', 'wcnyc-2015' ),
			'new_item'           => __( 'New Recipe', 'wcnyc-2015' ),
			'view_item'          => __( 'View Recipe', 'wcnyc-2015' ),
			'search_items'       => __( 'Search Recipes', 'wcnyc-2015' ),
			'not_found'          => __( 'No Recipes found', 'wcnyc-2015' ),
			'not_found_in_trash' => __( 'No Recipes found in Trash', 'wcnyc-2015' ),
			'parent_item_colon'  => __( 'Parent Recipe:', 'wcnyc-2015' ),
			'menu_name'          => __( 'Recipes', 'wcnyc-2015' ),
		),
		'public' => true,
		'taxonomies' => array( 'primary-ingredient' ),
		'rewrite' => array( 'slug' => 'recipes/%primary-ingredient%' ),
	) );

	// The recipes 'archive'
	add_rewrite_rule( "recipes/?$", "index.php?post_type=recipe", 'top' );
	add_rewrite_rule( "recipes/{$GLOBALS['wp_rewrite']->pagination_base}/([0-9]{1,})/?$", 'index.php?post_type=recipe&paged=$matches[1]', 'top' );
}
add_action( 'init', 'wcnyc_post_types' );

/**
 * Add the primary ingredient to the post type links for recipes.
 *
 * @param  string $permalink The post's permalink.
 * @param  object $post WP_Post object for this permalink.
 * @return string Modified permalink.
 */
function wcnyc_post_type_link( $permalink, $post ) {
	if ( 'recipe' == $post->post_type ) {
		$primary_ingredient = get_the_terms( $post, 'primary-ingredient' );
		if ( ! is_wp_error( $primary_ingredient ) && ! empty( $primary_ingredient ) ) {
			$primary_ingredient = reset( $primary_ingredient );
			$permalink = str_replace( '%primary-ingredient%', $primary_ingredient->slug, $permalink );
		}
	}

	return $permalink;
}
add_filter( 'post_type_link', 'wcnyc_post_type_link', 10, 2 );