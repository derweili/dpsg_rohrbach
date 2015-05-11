<?php
/**
 * @package dpsg_rohrbach
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php 
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				echo '<a href="' . get_permalink() . '">';
				the_post_thumbnail();
				echo '</a>';
			} 
		?>
		<?php echo '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">'.get_the_date( 'Y' ) . ' ' . get_the_title() . '</a></h3>'; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		 <?php the_excerpt(); ?> 
		 <a href="<?php echo esc_url( get_permalink() );  ?>" class="readmore">Weiterlesen</a>
		<!--<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'dpsg_rohrbach' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>-->

	</div><!-- .entry-content -->

	
</article><!-- #post-## -->