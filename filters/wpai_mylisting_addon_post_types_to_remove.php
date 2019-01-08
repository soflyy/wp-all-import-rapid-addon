<?php
/**
 * ==================================
 * Filter: wpai_mylisting_addon_post_types_to_remove
 * ==================================
 *
 * Determine which posts will be displayed in the post type drop down on step 1 of an import.
 *
 * @param $removed_posts - (array)			- the default list of post types that will be removed.
 *
 */
 
// Example: remove WooCommerce post types from the list

add_filter( 'wpai_mylisting_addon_remove_post_types', 'my_remove_wooco_posts', 10, 1 );

function my_remove_wooco_posts( $removed_posts ) {

    $remove_these = array( 'shop_order', 'shop_coupon', 'product' );
    $final = array_merge( $removed_posts, $remove_these );

    return $final;
}
