<?php
/**
 * ==================================
 * Filter: wpai_mylisting_addon_default_post_type_icon
 * ==================================
 *
 * Choose the default icon for all list types in the drop down during step 1 of an import.
 *
 * @param $icon - (string)			- dashicon slug or URL to image for the default icon.
 *
 */
 
add_filter( 'wpai_mylisting_addon_default_post_type_icon', 'my_set_default_icon', 10, 1 );

function my_set_default_icon( $icon ) {
    $icon = 'https://i.imgur.com/5oMzW8k.png';
    return $icon; 
}
