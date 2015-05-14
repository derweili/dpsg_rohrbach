<?php
if ( ! function_exists( 'dpsg_rohrbach_home_slider' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function dpsg_rohrbach_home_slider() {
	// Hide category and tag text for pages.
	global $post;  
    $the_query = array(
      'posts_per_page'   => '3',
      //'post_type'     => 'post',
      'orderby'          => 'date',
      'order'            => 'DESC',
      'suppress_filters' => false,
      'meta_key'=>'_thumbnail_id',
    );
    $posts = get_posts( $the_query );  
    if(!empty($posts)):
		echo '<div class="jcarousel">
	    	<div class="slides_wrap">';

	    	$postcount = '1';
	            foreach( $posts as $post ): setup_postdata( $post );
	            echo '<div class="slide">
	            	<a href="' . get_permalink() . '">'.get_the_post_thumbnail( $post->ID, 'dpsg_rohrbach_slider' ).'
		      		<div class="caption">
		              <h2>' . get_the_date( 'Y' ) . ' ' . get_the_title() . '</h2>
		            </div>
		        </a></div>';
		        $postcount ++;
            	endforeach;

		echo '</div>
		    <div class="jcarousel-pagination"></div>
		</div>';
	endif;
}
endif;

function dpsg_rohrbach_home_slider_script(){
	?>
	<script type="text/javascript"> 
		//width des slider containers holen (gleichzeitig browserwidth)
		var sliderWidth = jQuery('.jcarousel').width();

		(function(jQuery) {
		  
		    jQuery(function() {
		        jQuery('.jcarousel')
		            .jcarousel({
		               wrap: 'circular'
		            })
		          .jcarouselAutoscroll({
		              interval: 8000,
		              target: '+=1',
		              autostart: true
		          });

		    jQuery('.jcarousel-pagination')
		      .on('jcarouselpagination:active', 'span', function() {
		          jQuery(this).addClass('active');
		      })
		      .on('jcarouselpagination:inactive', 'span', function() {
		          jQuery(this).removeClass('active');
		      })
		      .jcarouselPagination({
		          'perPage' : 1,
		          'item': function(page, carouselItems) {
		                return '<span class="bullet"></span>';
		        }
		      });
		    });

		    //bei pageload width der einzelnen slide an container width anpassen
		    jQuery('.jcarousel .slide').css('width', sliderWidth );

		})(jQuery); 

		//bei resize width der einzelnen slide an container width anpassen
		jQuery(window).resize(function(event) {

		  //neue container width holen
		  sliderWidth = jQuery('.jcarousel').width();

		  jQuery('.jcarousel .slide').css('width', sliderWidth );
		});
		//
		//swipe aktivieren
		//
		jQuery(function() {      
		    jQuery(".jcarousel-wrapper").swipe( {
		      swipeLeft:function(event, direction, distance, duration, fingerCount, fingerData) {
		        jQuery('.jcarousel').jcarousel('scroll', '+=1');  
		      },
		      swipeRight:function(event, direction, distance, duration, fingerCount, fingerData) {
		        jQuery('.jcarousel').jcarousel('scroll', '-=1');  
		      },
		      //Default is 75px
		       threshold: 50
		    });
		});
	</script>
	<?php 
}
add_action('wp_footer', 'dpsg_rohrbach_home_slider_script');