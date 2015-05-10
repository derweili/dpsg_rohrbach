<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package dpsg_rohrbach
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'dpsg_rohrbach' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'dpsg_rohrbach' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'dpsg_rohrbach' ), 'dpsg_rohrbach', '<a href="http://julian-weiland.de" rel="designer">Julian Weiland</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script>

jQuery(document).foundation();
</script>
</body>
</html>
