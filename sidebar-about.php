<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package dpsg_rohrbach
 */

if ( ! is_active_sidebar( 'sidebar-about' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-about' ); ?>
</div><!-- #secondary -->
