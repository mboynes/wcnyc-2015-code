<?php

/**
 * Add tests for our rewrite rules.
 *
 * @param  array $tests Rewrite Testing tests.
 * @return array Rewrite Testing tests, with our custom tests added in.
 */
function wcnyc_rewrite_tests( $tests ) {
	$tests['Recipes'] = array(
		'/recipes/' => 'index.php?post_type=recipe',
		'/recipes/eggplant/' => 'index.php?post_type=recipe&primary-ingredient=$matches[1]',
		'/recipes/eggplant/eggplant-parmesan/' => 'index.php?primary-ingredient=$matches[1]&recipe=$matches[2]&page=$matches[3]',
	);
	$tests['Dish Types'] = array(
		'/recipes/dessert/' => array(
			'match' => 'index.php?post_type=recipe&primary-ingredient=$matches[1]',
			'query' => array( 'post_type' => 'recipe', 'dish-type' => 'dessert' ),
		),
	);

	return $tests;
}
add_filter( 'rewrite_testing_tests', 'wcnyc_rewrite_tests' );

/**
 * Improve the primary ingredient rewrite rules to be limited to recipes.
 *
 * @param  array $rules The default rewrite rules for primary ingredients.
 * @return array The filtered rules.
 */
function wcnyc_primary_ingredient_rewrite_rules( $rules ) {
	foreach ( $rules as $regex => $rule ) {
		$rules[ $regex ] = str_replace( 'index.php?', 'index.php?post_type=recipe&', $rule );
	}

	return $rules;
}
add_filter( 'primary-ingredient_rewrite_rules', 'wcnyc_primary_ingredient_rewrite_rules' );

/**
 * Remove the dish type rewrite rules. These would be the same as the rewrites
 * for primary ingredients. {@see wcnyc_request()} for the conflict resolution.
 */
add_filter( 'dish-type_rewrite_rules', '__return_empty_array' );

/**
 * Filter the main request to handle conflicting rewrite rules.
 *
 * @param  array $query_vars Query vars parsed from the main request.
 * @return array Potentially modified query vars.
 */
function wcnyc_request( $query_vars ) {
	if ( isset( $query_vars['primary-ingredient'] ) ) {
		$dish_type = get_term_by( 'slug', $query_vars['primary-ingredient'], 'dish-type' );
		if ( $dish_type && ! is_wp_error( $dish_type ) ) {
			$query_vars['dish-type'] = $query_vars['primary-ingredient'];
			unset( $query_vars['primary-ingredient'] );
		}
	}

	return $query_vars;
}
add_filter( 'request', 'wcnyc_request' );