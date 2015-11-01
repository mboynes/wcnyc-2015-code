<?php

/**
 * Load our theme library.
 */
require_once( __DIR__ . '/inc/post-types.php' );
require_once( __DIR__ . '/inc/taxonomies.php' );
require_once( __DIR__ . '/inc/rewrites.php' );

/**
 * Load the twentyfifteen stylesheet.
 */
function twentyfifteen_parent_theme_enqueue_styles() {
    wp_enqueue_style( 'twentyfifteen-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_parent_theme_enqueue_styles' );
