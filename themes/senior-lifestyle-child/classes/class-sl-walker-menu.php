<?php

/**
 * Helper class for custom theme functions, specific to SL needs.
 *
 * @class SL_Custom
 */
final class SL_Walker_Menu extends Walker_Nav_Menu {

    // Displays start of an element. E.g '<li> Item Name'
    // @see Walker::start_el()
    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
    	$object = $item->object;
    	$type = $item->type;
    	$title = $item->title;
    	$description = $item->description;
    	$permalink = $item->url;
       
      $output .= "<li class='" .  implode(" ", $item->classes) . "'>";
        
      //Add SPAN if no Permalink
      if( $permalink && $permalink != '#' ) {
      	$output .= '<a href="' . $permalink . '">';
      } else {
      	$output .= '<span>';
      }
      
      $output .= $title;
      if( $description != '' && $depth == 0 ) {
      	$output .= '<small class="description">' . $description . '</small>';
      }
      if( $permalink && $permalink != '#' ) {
      	$output .= '</a>';
        if($item->menu_item_parent==0 && in_array("menu-item-has-children", $item->classes)){
            $output .= '<a class="arrow-down" href="#"><span class="fas fa-angle-down"></span></a>';
        }
      } else {
      	$output .= '</span>';
      }
    }
}