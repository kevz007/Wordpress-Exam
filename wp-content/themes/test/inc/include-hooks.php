<?php
// Custom Posts
add_action('init', 'gloss_team');
// add_action('init', 'fim_gallery_posts');

// Shortcode
add_shortcode(strtoupper(THEME), 'fim_do_shortcode');

// Admin Menu
add_action('admin_menu', 'fim_create_menu');

// Admin Scripts and Styles
add_action('admin_print_styles', 'fim_admin_styles');
add_action('admin_print_scripts', 'fim_admin_scripts');

// Metabox
add_action('admin_menu', 'fim_add_custom_box');
add_action('save_post', 'fim_save_postdata');

// Comments
add_filter('comment_form_default_fields', 'fim_comment_remove_url_input');

// Theme Support Thumbnails on pages
add_theme_support( 'post-thumbnails', array( 'post','page','package','gallery' ) );
?>