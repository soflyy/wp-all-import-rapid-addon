<?php
/**
 * ==================================
 * Filter: rapid_is_active_add_on
 * ==================================
 *
 * Determine if the options provided by an add-on are visible for a post type.
 *
 * @param $is_addon_active - (boolean)	- whether the add-on is active for the post type.
 * @param $post_type - (string)			- the slug for the post type.
 * @param $addon_slug - (string)		- the slug for the add-on.
 *
 */

add_filter('rapid_is_active_add_on', 'my_addon_rapid_is_active_add_on', 10, 3);
function my_addon_rapid_is_active_add_on($is_addon_active, $post_type, $addon_slug){
	return $is_addon_active;	
}

// Example: Show add-on section for a specific taxonomy

add_filter('rapid_is_active_add_on', 'my_addon_rapid_is_active_add_on', 10, 3);
function my_addon_rapid_is_active_add_on($is_addon_active, $post_type, $addon_slug){
	$is_addon_active = false;
	if (my_addon_addon_get_taxonomy_type() == 'my_taxonomy'){
		$is_addon_active = true;
	}
	return $is_addon_active;	
}

function my_addon_addon_get_taxonomy_type() {	
	$taxonomy_type = false;
	// Get import ID from URL or set to 'new'
	if ( isset( $_GET['import_id'] ) ) {
		$import_id = $_GET['import_id'];
	} elseif ( isset( $_GET['id'] ) ) {
		$import_id = $_GET['id'];
	}
	if ( empty( $import_id ) ) {
		$import_id = 'new';
	}
	// Declaring $wpdb as global to access database
	global $wpdb;
	// Get values from import data table
	$imports_table = $wpdb->prefix . 'pmxi_imports';
	// Get import session from database based on import ID or 'new'
	$import_options = $wpdb->get_row( $wpdb->prepare("SELECT options FROM $imports_table WHERE id = %d", $import_id), ARRAY_A );
	// If this is an existing import load the custom post type from the array
	if ( ! empty($import_options) )	{
		$import_options_arr = unserialize($import_options['options']);
		$taxonomy_type = $import_options_arr['taxonomy_type'];
	} else {
		// If this is a new import get the custom post type data from the current session
		$import_options = $wpdb->get_row( $wpdb->prepare("SELECT option_name, option_value FROM $wpdb->options WHERE option_name = %s", '_wpallimport_session_' . $import_id . '_'), ARRAY_A );				
		$import_options_arr = empty($import_options) ? array() : unserialize($import_options['option_value']);
		$taxonomy_type = empty($import_options_arr['taxonomy_type']) ? '' : $import_options_arr['taxonomy_type'];		
	}
	return $taxonomy_type;
}
