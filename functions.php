<?php

/**
 * Load the twentyfifteen stylesheet.
 */
function twentyfifteen_parent_theme_enqueue_styles() {
    wp_enqueue_style( 'twentyfifteen-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_parent_theme_enqueue_styles' );
