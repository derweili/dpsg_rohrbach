<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package dpsg_rohrbach
 */

if ( ! is_active_sidebar( 'sidebar-stufen' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-stufen' ); ?>
</div><!-- #secondary -->
