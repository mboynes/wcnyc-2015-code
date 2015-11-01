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

	register_taxonomy( 'dish-type', array( 'recipe' ), array(
		'labels' => array(
			'name'                  => __( 'Dish Types', 'wcnyc-2015' ),
			'singular_name'         => __( 'Dish Type', 'wcnyc-2015' ),
			'search_items'          => __( 'Search Dish Types', 'wcnyc-2015' ),
			'popular_items'         => __( 'Popular Dish Types', 'wcnyc-2015' ),
			'all_items'             => __( 'All Dish Types', 'wcnyc-2015' ),
			'parent_item'           => __( 'Parent Dish Type', 'wcnyc-2015' ),
			'parent_item_colon'     => __( 'Parent Dish Type', 'wcnyc-2015' ),
			'edit_item'             => __( 'Edit Dish Type', 'wcnyc-2015' ),
			'view_item'             => __( 'View Dish Type', 'wcnyc-2015' ),
			'update_item'           => __( 'Update Dish Type', 'wcnyc-2015' ),
			'add_new_item'          => __( 'Add New Dish Type', 'wcnyc-2015' ),
			'new_item_name'         => __( 'New Dish Type Name', 'wcnyc-2015' ),
			'add_or_remove_items'   => __( 'Add or remove Dish Types', 'wcnyc-2015' ),
			'choose_from_most_used' => __( 'Choose from most used Dish Types', 'wcnyc-2015' ),
			'menu_name'             => __( 'Dish Types', 'wcnyc-2015' ),
		),
		'rewrite' => true,
	) );
}
add_action( 'init', 'wcnyc_taxonomies' );