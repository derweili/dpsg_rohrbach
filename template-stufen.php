<?php
/*
Template Name: Stufen
*/


get_header(); ?>
<div class="row">
	<div class="large-3 columns">
		<?php get_sidebar( 'stufen' ); ?>
	</div>
	<div id="primary" class="content-area large-9 columns">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>
				<?php
				$stufe = rwmb_meta( 'stufen_metabox_stufe' );
				if (!empty($stufe)) {
					dpsg_rohrbach_stufen_slider( $stufe );
				}

					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php get_footer(); ?>