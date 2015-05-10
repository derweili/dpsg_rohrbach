<?php
/**
 * @package dpsg_rohrbach
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php 
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				echo '<a href="' . esc_url( get_permalink() ) . '">';
				the_post_thumbnail();
				echo '</a>';
			} 
		?>

		<?php echo '<h3 class="entry-title">'.get_the_date( 'Y' ) . ' ' . get_the_title() . '</h3>'; ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dpsg_rohrbach' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php dpsg_rohrbach_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
