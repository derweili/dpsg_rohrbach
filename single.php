<?php
/**
 * The template for displaying all single posts.
 *
 * @package dpsg_rohrbach
 */

get_header(); ?>
<div class="row">
	<div id="primary" class="content-area large-8 columns">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			<?php //the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<div class="large-4 columns">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>
