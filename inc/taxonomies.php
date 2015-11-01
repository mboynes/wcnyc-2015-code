<?php

/**
 * Setup all the taxonomies for our theme.
 */
function wcnyc_taxonomies() {
	register_taxonomy( 'primary-ingredient', array( 'recipe', 'post' ), array(
		'labels' => array(
			'name'                  => __( 'Primary Ingredients', 'wcnyc-2015' ),
			'singular_name'         => __( 'Primary Ingredient', 'wcnyc-2015' ),
			'search_items'          => __( 'Search Primary Ingredients', 'wcnyc-2015' ),
			'popular_items'         => __( 'Popular Primary Ingredients', 'wcnyc-2015' ),
			'all_items'             => __( 'All Primary Ingredients', 'wcnyc-2015' ),
			'parent_item'           => __( 'Parent Primary Ingredient', 'wcnyc-2015' ),
			'parent_item_colon'     => __( 'Parent Primary Ingredient', 'wcnyc-2015' ),
			'edit_item'             => __( 'Edit Primary Ingredient', 'wcnyc-2015' ),
			'view_item'             => __( 'View Primary Ingredient', 'wcnyc-2015' ),
			'update_item'           => __( 'Update Primary Ingredient', 'wcnyc-2015' ),
			'add_new_item'          => __( 'Add New Primary Ingredient', 'wcnyc-2015' ),
			'new_item_name'         => __( 'New Primary Ingredient Name', 'wcnyc-2015' ),
			'add_or_remove_items'   => __( 'Add or remove Primary Ingredients', 'wcnyc-2015' ),
			'choose_from_most_used' => __( 'Choose from most used Primary Ingredients', 'wcnyc-2015' ),
			'menu_name'             => __( 'Primary Ingredients', 'wcnyc-2015' ),
		),
		'rewrite' => array( 'slug' => 'recipes' ),
	) );
}
add_action( 'init', 'wcnyc_taxonomies' );