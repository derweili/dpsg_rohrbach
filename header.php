<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package dpsg_rohrbach
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<!--<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'dpsg_rohrbach' ); ?></a>-->
	<header id="masthead" class="site-header" role="banner">
	<div class="site-branding row" style="position:relative">
		<div class="large-3 columns">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php bloginfo('template_directory'); ?>/img/dpsg.svg" width="157" class="headerlogo"></a></h1>
		</div>
		<div class="large-9 columns">
			<h4 class="site-description"><?php bloginfo( 'description' ); ?></h4>
		</div>
	    <?php
	$options = array(
	  'theme_location' => 'meta_nav',
	  'container' => false,
	  'depth' => 1,
	  'items_wrap' => '<ul id="%1$s" class="top-menu %2$s">%3$s</ul>',
	);
	wp_nav_menu($options); ?>
	</div><!-- .site-branding -->
	<div class="contain-to-grid sticky"><!-- Add sticky class to make manu "sticky". -->
		<nav class="top-bar" data-topbar role="navigation">
		  <ul class="title-area">
		    <li class="name">
		    	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		      		<img src="<?php bloginfo('template_directory'); ?>/img/dpsg-lilie.png">
		    	</a>
		    </li>
		    <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
		  </ul>

		  <section class="top-bar-section">
		    <!-- Right Nav Section -->
		    <!--<ul class="right">
		      <li class="active"><a href="#">Right Button Active</a></li>
		      <li class="has-dropdown">
		        <a href="#">Right Button with Dropdown</a>
		        <ul class="dropdown">
		          <li><a href="#">First link in dropdown</a></li>
		        </ul>
		      </li>
		    </ul>-->

		    <!-- Left Nav Section -->
		    <?php
			$options = array(
			  'theme_location' => 'main_nav',
			  'container' => false,
			  'depth' => 5,
			  'items_wrap' => '<ul id="%1$s" class="left %2$s">%3$s</ul>',
			  'walker' => new dpsg_rohrbach_walker_nav_menu()
			);
			wp_nav_menu($options); ?>
		  </section>
		</nav>
	</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
