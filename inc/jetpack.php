<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package dpsg_rohrbach
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function dpsg_rohrbach_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'dpsg_rohrbach_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function dpsg_rohrbach_jetpack_setup
add_action( 'after_setup_theme', 'dpsg_rohrbach_jetpack_setup' );

function dpsg_rohrbach_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function dpsg_rohrbach_infinite_scroll_render