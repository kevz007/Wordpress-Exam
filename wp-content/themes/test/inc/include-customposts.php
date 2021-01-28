<?php
// Package
function gloss_team() 
{
  $labels = array(
    'name' => _x('Teams', 'post type general name'),
    'singular_name' => _x('Team', 'post type singular name'),
    'add_new' => _x('Add New', 'Team'),
    'add_new_item' => __('Add New Team'),
    'edit_item' => __('Edit Team'),
    'new_item' => __('New Team'),
    'all_items' => __('All Teams'),
    'view_item' => __('View Team'),
    'search_items' => __('Search Teams'),
    'not_found' =>  __('No team found'),
    'not_found_in_trash' => __('No Teams found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Teams'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => 4,
    'supports' => array('title','editor','author','thumbnail','excerpt','comments')
  ); 
  register_post_type('team',$args);
   
  flush_rewrite_rules();
}


function fim_gallery_posts() 
{
  $labels = array(
    'name' => _x('Galleries', 'post type general name'),
    'singular_name' => _x('Gallery', 'post type singular name'),
    'add_new' => _x('Add New', 'Gallery'),
    'add_new_item' => __('Add New Gallery'),
    'edit_item' => __('Edit Gallery'),
    'new_item' => __('New Gallery'),
    'all_items' => __('All Galleries'),
    'view_item' => __('View Gallery'),
    'search_items' => __('Search Galleries'),
    'not_found' =>  __('No galleries found'),
    'not_found_in_trash' => __('No galleries found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Galleries'

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => 4,
	'menu_icon' => SITEURL . '/gallery.png',
    'supports' => array('title','editor','author','thumbnail','excerpt','comments')
  ); 
  register_post_type('gallery',$args);
  

  $labels = array(
    'name' => _x( 'Gallery Type', 'taxonomy general name' ),
    'singular_name' => _x( 'Gallery Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Galleries Type' ),
    'all_items' => __( 'All Galleries Type' ),
    'parent_item' => __( 'Parent Gallery Type' ),
    'parent_item_colon' => __( 'Parent Gallery Type:' ),
    'edit_item' => __( 'Edit Gallery Type' ), 
    'update_item' => __( 'Update Gallery Type' ),
    'add_new_item' => __( 'Add New Gallery Type' ),
    'new_item_name' => __( 'New Gallery Type Name' ),
    'menu_name' => __( 'Gallery Type' ),
  ); 	
  register_taxonomy('gallery-type', 'gallery', array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'gallery' ),
  ));
  
  flush_rewrite_rules();
}
?>