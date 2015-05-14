<?php
/*add_filter('post_gallery', 'my_post_gallery', 10, 2); //replace Wordpress Gallery
function my_post_gallery($output, $attr) {
    global $post;

    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
        if (!$attr['orderby'])
            unset($attr['orderby']);
    }

    extract(shortcode_atts(array(
        'order' => 'ASC',
        'orderby' => 'menu_order ID',
        'id' => $post->ID,
        'itemtag' => 'dl',
        'icontag' => 'dt',
        'captiontag' => 'dd',
        'columns' => 3,
        'size' => 'thumbnail',
        'include' => '',
        'exclude' => ''
    ), $attr));

    $id = intval($id);
    if ('RAND' == $order) $orderby = 'none';

    if (!empty($include)) {
        $include = preg_replace('/[^0-9,]+/', '', $include);
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

        $attachments = array();
        $imggallerycount = 1; //Count the numer of the picture
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    }

    if (empty($attachments)) return '';

    // Here's your actual output, you may customize it to your need
    $output = "<div class=\"slideshow-wrapper\">\n";
    $output .= "<div class='row'><div class='large-12 columns'><ul class='clearing-thumbs small-block-grid-4' data-clearing>";
    //$output .= "<ul data-orbit>\n";

    // Now you loop through each attachment
    foreach ($attachments as $id => $attachment) {
        // Fetch the thumbnail (or full image, it's up to you)
      	$img = wp_prepare_attachment_for_js($id);

		// If you want a different size change 'large' to eg. 'medium'
		$url = $img['sizes']['thumbnail']['url'];
		$urlfull = $img['sizes']['full']['url'];
		$height = $img['sizes']['medium']['height'];
		$width = $img['sizes']['medium']['width'];
		$alt = $img['alt'];
		// Store the caption
    	$caption = $img['caption'];

        $output .= "<li class='pciturenumber-".$imggallerycount."'>\n";
        $output .= "<a href=\"{$urlfull}\"><img data-caption=\"{$caption}\" src=\"{$url}\" width=\"{$width}\" height=\"{$height}\" alt=\"{$alt}\" /></a>\n";
        $output .= "</li>\n";
        $imggallerycount ++;
    }
    $output .= "</div></div></div>\n";

    return $output;
}
*/


add_action( 'after_setup_theme', 'dpsg_rohrbach_theme_setup' );
function dpsg_rohrbach_theme_setup() {
     add_image_size( 'dpsg_rohrbach_slider', 1056, 410, true ); // 300 pixels wide (and unlimited height)
 //    add_image_size( 'dpsg_rohrbach-medium-thumb', 183, 122, true ); // 300 pixels wide (and unlimited height)
 //    add_image_size( 'dpsg_rohrbach-archive', 610 ); //  pixels wide (and unlimited height)

    }



//Register Scripts
function dpsg_rohrbach_register_scripts() {
    /*Header Script*/
    wp_register_script( 'modernizr', get_template_directory_uri() . '/js/vendor/modernizr.js', array( 'jquery' ), 1.0);
    wp_register_script( 'jcarousel', get_template_directory_uri() . '/js/jcarousel.min.js', array( 'jquery' ), 1.0, true);
    wp_register_script( 'touchswipe', get_template_directory_uri() . '/js/touchswipe.min.js', array( 'jquery' ), 1.0, true);
    wp_register_script( 'foundation', get_template_directory_uri() . '/js/foundation.min.js', array( 'jquery' ), 1.0, true);
    wp_register_script( 'foundation-topbar', get_template_directory_uri() . '/js/foundation/foundation.topbar.js', array( 'jquery', 'foundation' ), 1.0, true);
    wp_register_script( 'foundation-clearing', get_template_directory_uri() . '/js/foundation/foundation.clearing.js', array( 'jquery', 'foundation' ), 1.0, true);
 
    wp_register_style( 'foundation', get_template_directory_uri() . '/css/foundation.css', array(), 1.0, 'screen' );
    wp_register_style( 'theme-css', get_template_directory_uri() . '/css/theme.css', array('foundation'), 1.0, 'screen' );
}
 
add_action( 'wp_enqueue_scripts', 'dpsg_rohrbach_register_scripts' );


function dpsg_rohrbach_enqueue_scripts() {
    wp_enqueue_script( "jquery" );
    wp_enqueue_script( 'modernizr' );
    wp_enqueue_script( 'jcarousel' );
    wp_enqueue_script( 'touchswipe' );
    wp_enqueue_script( 'foundation' );
    wp_enqueue_script( 'foundation-topbar' );
    wp_enqueue_script( 'foundation-clearing' );

    wp_enqueue_style( 'foundation' );
    wp_enqueue_style( 'theme-css' );
}
 
add_action( 'wp_enqueue_scripts', 'dpsg_rohrbach_enqueue_scripts' );

function new_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

// URL aus kommentaren entfernen
function crunchify_disable_comment_url($fields) { 
    unset($fields['url']);
    return $fields;
}
add_filter('comment_form_default_fields','crunchify_disable_comment_url');

?>