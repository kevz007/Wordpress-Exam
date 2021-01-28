<?php
if (function_exists('register_nav_menus')) 
{
	register_nav_menus(
		array(
		  'main_menu' => 'Main Menu',
		  'footer_menu' => 'Footer Menu'
		)
	);
}
if(function_exists('register_sidebar'))
{	
	register_sidebar(array(
		'id'=> 'main-sidebar',
		'name'=> 'Main Sidebar', 
		'description' => 'Main Sidebar Widget', 
		'before_widget' => '<li>', 
		'after_widget' => '</li>',
		'before_title' => '<h2>', 
		'after_title' => '</h2>'
	));
}

?>