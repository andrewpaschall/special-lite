<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Special-Lite
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function special_lite_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'special_lite_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function special_lite_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'special_lite_pingback_header' );


/**
 * Gutenberg Block Limitations.
*/

// my-plugin.php

function sl_blacklist_blocks() {
    wp_enqueue_script(
        'sl_blacklist_blocks',
        plugins_url( 'js/blacklist-blocks.js', __FILE__ ),
        array( 'wp-blocks' )
    );
}
add_action( 'enqueue_block_editor_assets', 'sl_blacklist_blocks' );


/**
 *Navigation Customizations
*/

class My_Walker_Nav_Menu extends Walker_Nav_Menu { 
	function start_lvl(&$output, $depth = 0, $args = Array() ) { 
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"menu\">\n";
	}
}


add_filter( 'get_the_archive_title', function ($title) {
 
    if ( is_category() ) {
 
            $title = single_cat_title( '', false );
 
        } elseif ( is_tag() ) {
 
            $title = single_tag_title( '', false );
 
        } elseif ( is_author() ) {
 
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;
 
        }
 
    return $title;
 
});