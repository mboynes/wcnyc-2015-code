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
