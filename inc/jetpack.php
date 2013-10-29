<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package simplicated
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function simplicated_by_lawsonry_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'content',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'simplicated_by_lawsonry_jetpack_setup' );
