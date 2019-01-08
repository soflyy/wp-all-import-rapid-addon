<?php
/**
 * ==================================
 * Filter: wpai_mylisting_addon_all_post_type_icons
 * ==================================
 *
 * Set custom icon images for your listing types.
 *
 * @param $icons - (array)			- contains all icons for the listing types.
 * @param $posts - (array)			- contains all listing type posts.
 *
 */
 
// Example: set custom icons for "Cars", "Homes", and "Boats" listing types.

add_filter( 'wpai_mylisting_addon_all_post_type_icons', 'my_set_custom_icon', 10, 2 );

function my_set_custom_icon( $icons, $posts ) {
    if ( ( $key = array_search( 'cars', $posts ) ) !== false ) {
        $icons[ $key ] = 'https://i.imgur.com/4kiORkS.png';
    }

    if ( ( $key = array_search( 'homes', $posts ) ) !== false ) {
        $icons[ $key ] = 'https://i.imgur.com/mbOL2Aj.png';
    }

    if ( ( $key = array_search( 'boats', $posts ) ) !== false ) {
        $icons[ $key ] = 'https://i.imgur.com/5oMzW8k.png';
    }
    return $icons;
}
