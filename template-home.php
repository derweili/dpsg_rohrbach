<?php
/*
Template Name: Home
*/


get_header(); ?>
<div class="row">
	<div id="homeslider" class="content-area large-12 columns">
		<div class="slidecontainer">
			<?php dpsg_rohrbach_home_slider(); ?>
		</div>
	</div>
</div>
<div class="row boxes-container">
	<div class="large-3 medium-6 columns startbox">
		<img src="<?php bloginfo('template_directory'); ?>/img/ueber-uns.jpg">
		<h3>Über Uns</h3>
	</div>
	<div class="large-3 medium-6 columns startbox">
		<img src="<?php bloginfo('template_directory'); ?>/img/DieDPSG.jpg">
		<h3>Die DPSG</h3>
	</div>
	<div class="large-3 medium-6 columns startbox">
		<img src="<?php bloginfo('template_directory'); ?>/img/stufen.jpg">
		<h3>Stufen</h3>
	</div>
	<div class="large-3 medium-6 columns startbox">
		<a href="http://pfadiwebsite:8888/?page_id=2050">
		<img src="<?php bloginfo('template_directory'); ?>/img/aktuelles.jpg">
		<h3>Aktuelles</h3>
		</a>
	</div>
</div>
<?php get_footer(); ?>