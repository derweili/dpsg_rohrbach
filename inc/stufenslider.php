<?php
if ( ! function_exists( 'dpsg_rohrbach_stufen_slider' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function dpsg_rohrbach_stufen_slider( $stufe ) {
	// Hide category and tag text for pages.
	global $post;  
    $the_query = array(
      'posts_per_page'   => '3',
      //'post_type'      => 'post',
      'orderby'          => 'date',
      'order'            => 'DESC',
      'category_name'    => $stufe,
      'suppress_filters' => false,
      'meta_key'=>'_thumbnail_id',
    );
    $posts = get_posts( $the_query );  
    if(!empty($posts)):
		echo '<div class="jcarousel-posts">
	    	<div class="slides_wrap-posts">';

	    	$postcount = '1';
	            foreach( $posts as $post ): setup_postdata( $post );
	            echo '<div class="slide-posts"><a href="' . get_permalink() . '">';
	            	the_post_thumbnail( $post->ID, 'medium' );
		      		echo '<div class="caption">
		              <h4>' . get_the_date( 'Y' ) . ' ' . get_the_title() . '</h4>
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

function dpsg_rohrbach_stufen_slider_script(){
	?>
	<script type="text/javascript"> 
		//width des slider containers holen (gleichzeitig browserwidth)
		var sliderWidth = jQuery('.jcarousel-posts').width();

		(function(jQuery) {
		  
		    jQuery(function() {
		        jQuery('.jcarousel-posts')
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
		    jQuery('.jcarousel-posts .slide-posts').css('width', sliderWidth / 4.5);

		})(jQuery); 

		//bei resize width der einzelnen slide an container width anpassen
		jQuery(window).resize(function(event) {

		  //neue container width holen
		  sliderWidth = jQuery('.jcarousel-posts').width();

		  jQuery('.jcarousel-posts .slide-posts').css('width', sliderWidth / 4.5);
		});
		//
		//swipe aktivieren
		//
		jQuery(function() {      
		    jQuery(".jcarousel-wrapper-posts").swipe( {
		      swipeLeft:function(event, direction, distance, duration, fingerCount, fingerData) {
		        jQuery('.jcarousel-posts').jcarousel('scroll', '+=1');  
		      },
		      swipeRight:function(event, direction, distance, duration, fingerCount, fingerData) {
		        jQuery('.jcarousel-posts').jcarousel('scroll', '-=1');  
		      },
		      //Default is 75px
		       threshold: 50
		    });
		});
	</script>
	<?php 
}
add_action('wp_footer', 'dpsg_rohrbach_stufen_slider_script');