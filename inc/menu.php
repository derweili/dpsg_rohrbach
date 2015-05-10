<?php
//Create A Custom Menu Walker
class dpsg_rohrbach_walker_nav_menu extends Walker_Nav_Menu {
 
  // add classes to ul sub-menus
  function start_lvl(&$output, $depth, $args) {
    // depth dependent classes
    $indent = ( $depth > 0 ? str_repeat("\t", $depth) : '' ); // code indent
 
    // build html
    $output .= "\n" . $indent . '<ul class="dropdown">' . "\n";
  }
}
//Add Class to Parent <li>’s
if (!function_exists('dpsg_rohrbach_menu_set_dropdown')) :
function dpsg_rohrbach_menu_set_dropdown($sorted_menu_items, $args) {
  $last_top = 0;
  foreach ($sorted_menu_items as $key => $obj) {
    // it is a top lv item?
    if (0 == $obj->menu_item_parent) {
      // set the key of the parent
      $last_top = $key;
    } else {
      $sorted_menu_items[$last_top]->classes['dropdown'] = 'has-dropdown';
    }
  }

  return $sorted_menu_items;
}
endif;
add_filter('wp_nav_menu_objects', 'dpsg_rohrbach_menu_set_dropdown', 10, 2);
//Remove WordPress .sticky Class
function remove_sticky_class($classes) {
  $classes = array_diff($classes, array("sticky"));
  $classes[] = 'wordpress-sticky';
  return $classes;
}
add_filter('post_class','remove_sticky_class');