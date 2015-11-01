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

