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
