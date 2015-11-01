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
	) );
}
add_action( 'init', 'wcnyc_post_types' );
