<?php
 
////////////////////////////////////////////////////////////////////////	 
// Definitions
////////////////////////////////////////////////////////////////////////
define('AUTHOR', 'http://kevintest.cf/');
define('THEME', 'KevinTest');
define('PREFIX', THEME.'_');
define('PREMETA', '_'.THEME.'_');
define('THEMENAME', 'KevinTest');
define('SITEURL', get_bloginfo('url'));
define('THEMEURL', get_bloginfo('template_url')); // Or TEMPLATEPATH (UNIX)
define('IMG', THEMEURL.'/img');
define('JS', THEMEURL.'/js'); 
define('CSS', THEMEURL.'/css'); 
define('INC', THEMEURL.'/inc'); 

////////////////////////////////////////////////////////////////////////	 
// Includes
////////////////////////////////////////////////////////////////////////
require_once( TEMPLATEPATH."/inc/include-widgets.php");
require_once( TEMPLATEPATH."/inc/include-customposts.php");
require_once( TEMPLATEPATH."/inc/include-breadcrumbs.php");
require_once( TEMPLATEPATH."/inc/include-comments.php");	
require_once( TEMPLATEPATH."/inc/include-metabox.php");
require_once( TEMPLATEPATH."/inc/include-functions.php");
require_once( TEMPLATEPATH."/inc/include-settings.php");
require_once( TEMPLATEPATH."/inc/include-hooks.php");
?>