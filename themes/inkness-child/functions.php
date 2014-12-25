<?php
/**
 * Inkness functions and definitions
 *
 * @package Inkness
 */


/**
 * Initialize Options Panel
 */
 
 require_once('inc/custom-post-types.php');
 require_once('inc/custom-sidebars.php');
 require_once('inc/shortcodes.php');

 add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles', PHP_INT_MAX);
function enqueue_child_theme_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(), array('parent-style')  );
}

function load_fonts() {
            wp_register_style('http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700|Open+Sans:400italic,400,300,600,700');
            wp_enqueue_style( 'et-googleFonts');
        }
    add_action('wp_print_styles', 'load_fonts');