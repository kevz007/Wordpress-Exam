<?php
function load_stylesheet(){
	wp_register_style('maincss', get_template_directory_uri() . '/css/main.css', array() ,1,'all');
	wp_enqueue_style('maincss');	
 }
 add_action('wp_enqueue_scripts','load_stylesheet');

wp_deregister_script('jquery');
wp_register_script('jquery', 'https://code.jquery.com/jquery-3.5.1.min.js', array(), '3.5.1',1);
wp_enqueue_script('jquery');
wp_register_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js', false,'3.5.1',1);
wp_enqueue_script('gsap');	
wp_register_script('scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/ScrollTrigger.min.js', false,'3.5.1',1);
wp_enqueue_script('scrolltrigger');	
wp_register_script('main', get_template_directory_uri() . '/js/main.js', false,1,1);
wp_enqueue_script('main');

add_theme_support( 'post-thumbnails' );

//if( !is_admin()){
//	wp_deregister_script('jquery');
//	wp_register_script('jquery', (JS . "/vendor/jquery-1.10.2.min.js"), false, '1.10.2');
//	wp_enqueue_script('jquery');
//}
// Landing Page Functions
function custom_login() {
	echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/css/login.css" />';
}
add_action('login_head', 'custom_login');
// Menu Functions
function fim_create_menu() 
{
	add_theme_page(THEMENAME, THEMENAME. ' Settings', 'administrator', "fim_options", 'fim_option_settings');
	add_menu_page(THEMENAME, THEMENAME, 'administrator', "fim_options", 'fim_option_settings', IMG . '/settings.png', 3);
}

// Admin Scripts and Styles Functions
function fim_admin_scripts()
{
	wp_enqueue_script('media-upload');
	wp_enqueue_script('jquery-ui-sortable');
	wp_enqueue_script('dashboard');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('mini', JS.'/mini.js');
}
function fim_admin_styles()
{
	wp_enqueue_style('thickbox');
	wp_enqueue_style('dashboard');
	wp_enqueue_style('global');
	wp_enqueue_style('wp-admin');	
}

// Navigation Functions
function fim_navigation($displaypagenumber = false) {
  	global $wp_query, $wp_rewrite, $query;
  	$pages = '';
  	$max = $wp_query->max_num_pages ? $wp_query->max_num_pages : $query->max_num_pages;
  	if (!$current = get_query_var('paged')) { $current = 1; }
	
	$total = 1; 
	if($displaypagenumber)
	{
		$a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
		$a['total'] = $max;
		$a['current'] = $current;
		$a['mid_size'] = 5;
		$a['end_size'] = 1;
		$a['prev_text'] = '<div class="prev">&lt;</div>';
		$a['next_text'] = '<div class="next">&gt;</div>';
	}
	
	if ($max > 1) { echo '<div class="productNavigation">'; }
	if ($total == 1 && $max > 1) { echo '<div class="next">';
		next_posts_link('&lt;', $max); echo '</div><div class="count">' . $current . ' מ- ' . $max .'</div> <div class="prev">';
		previous_posts_link('&gt;', $max); echo __('</div> <div class="text">הצג הכל</div>'); }
	if ($max > 1) { echo '</div>'; }
}

// Utility Functions
function fim_list_select_pages($name = '', $value='')
{
	$pages = get_pages();	
	echo '<select name="'.$name.'" class="'.$value.'" style="width:200px">';
	foreach ($pages as $page) {
		$sel = "";
		if($value == $page->ID) { $sel='selected="selected"'; }
		echo '<option value="'.$page->ID.'" '.$sel.'>'.$page->post_title.'</option>';
	}
	echo '</select>';
}

function fim_list_select_gallery($name = '', $value='')
{
	global $wpdb;
	$galleries = $wpdb->get_results("SELECT gid, title FROM `".$wpdb->prefix."ngg_gallery` ORDER BY `title` ASC", ARRAY_A);
		
	echo '<select name="'.$name.'" class="'.$value.'" style="width:200px">';
	foreach ($galleries as $gallery) {
		$sel = "";
		if($value == $gallery['gid']) { $sel='selected="selected"'; }
		echo '<option value="'.$gallery['gid'].'" '.$sel.'>'.$gallery['title'].'</option>';
	}
	echo '</select>';
}

function fim_list_select_categories($tax = 'category', $name = '', $value='')
{
	$terms = get_terms($tax,'hide_empty=0');	
	echo '<select name="'.$name.'" class="'.$value.'" style="width:200px">';
	echo __('<option value="0">All</option>');
	foreach ($terms as $term) {
		$sel = "";
		if($value == $term->term_id) { $sel='selected="selected"'; }
		echo '<option value="'.$term->term_id.'" '.$sel.'>'.$term->name.'</option>';
	}
	echo '</select>';
}

function fim_list_categories($tax = 'category', $sep = " &raquo; ")
{
	$terms = get_terms($tax,'hide_empty=0');	
	$count=0;
	$catnum = count($terms);
	foreach ($terms as $term) {
		$count++;
		echo '<a href="'.SITEURL.'?carousel_cat='.$term->term_id.'">'.$term->name.'</a>';
		if($catnum !== $count)
		{
			echo $sep;
		}
	}
}

function fim_show_contents($post_content="", $limit="100", $rmtext="...", $rmlink="#", $echo = false)
{
	$words = explode(" ",$post_content);
	$return = implode(" ",array_splice($words,0,$limit));
	$readmore = '<a class="readMore" href="'.$rmlink.'">'.$rmtext.'</a>';
	if($echo) { echo $return.' '.$readmore; } else { return $return.' '.$readmore; }
}

function fim_get_thumbnail_src($post_ID)
{
	$thumb = get_the_post_thumbnail($post_ID);
	$pattern= "/(?<=src=['|\"])[^'|\"]*?(?=['|\"])/i";
	preg_match($pattern, $thumb, $thePath);
	$theSrc = $thePath[0];		
	return $theSrc;
}

function fim_get_ngg_gallery($galleryID)
{
	global $wpdb;
	$galleryTable = $wpdb->prefix."ngg_gallery";
	$pictureTable = $wpdb->prefix."ngg_pictures";
	
	$galleries = $wpdb->get_results("SELECT * FROM `".$pictureTable."` LEFT JOIN `".$galleryTable."` ON `".$pictureTable."`.`galleryid` = `".$galleryTable."`.`gid` WHERE `".$pictureTable."`.`galleryid` = '".$galleryID."'", OBJECT);
		
	return $galleries;	
}

function fim_get_ad_rotate($cond="WHERE `active` = 'yes'")
{	
	global $wpdb;
	$return = $wpdb->get_results("SELECT * FROM `wp_adrotate` ".$cond, OBJECT);
	
	return $return;
} 

function fim_do_shortcode($attr)
{	
	extract(shortcode_atts(array(
	      'code' => 'link',
		  'type' => 'home',
		  'menu_id' => '1'
     ), $attr));
	
	
	switch(strtolower($code))
	{
		case 'menu':
		{
			$menu_left = wp_get_nav_menu_items($menu_id);
			$menu_list = '<div class="quickLinkCols marginRight18"><ul id="menu-id-'.$menu_id.'">';
			foreach ( (array) $menu_left as $key => $menu_item ) {
				$title = $menu_item->title;
				$url = $menu_item->url;
				$menu_list .= '<li><a href="' . $url . '">' . $title . '</a></li>';
			}
			$menu_list .= '</ul></div>';
			
			return $menu_list;
		} break;
		case 'link':
		default:
		{
			$return = SITEURL;
			switch(strtolower($type))
			{
				case 'theme':
				{
					$return = THEMEURL;
				} break;
				
				case 'img':
				{
					$return = IMG;
				} break;
				
				case 'js':
				{
					$return = JS;
				} break;
				
				case 'css':
				{
					$return = CSS;
				} break;
				
				case 'home':
				default:
				{
					$return = SITEURL;
				} break;
			}
			
			return $return;
		} break;
	}
} 

function fim_do_shortcode_replace($content)
{	
	$code 		= array('['.strtoupper(THEME).'_home]','['.strtoupper(THEME).'_css]','['.strtoupper(THEME).'_img]','['.strtoupper(THEME).'_js]','['.strtoupper(THEME).'_theme]');
	$replace 	= array(SITEURL,CSS,IMG,JS,THEMEURL);
	return str_replace($code,$replace,$content);		
}  

function fim_do_bean_request($arrayQuery=array())
{
	// Initialize curl
	$ch = curl_init();
	
	// Get curl to POST
	curl_setopt($ch, CURLOPT_POST, 1 );
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt($ch, CURLOPT_URL, "https://www.beanstream.com/scripts/process_transaction.asp" );
	
	// These are the transaction parameters that we will POST
	$arrayQuery = array(
		'requestType' => 'BACKEND',
		'merchant_id' => 109040000,
		'trnCardOwner' => '',
		'trnCardNumber' => 5100000010001004,
		'trnExpMonth' => 01,
		'trnExpYea' => 05,
		'trnOrderNumber' => 2232,
		'trnAmount' => 10.00,
		'ordEmailAddress' => 'prandal@mydomain.net',
		'ordName' => 'Paul Randal',
		'ordPhoneNumber' => 9999999,
		'ordAddress1' => '1045 Main Street',
		'ordAddress2' => '',
		'ordCity' => 'Vancouver',
		'ordProvince' => 'BC',
		'ordPostalCode' => 'V8R 1J6',
		'ordCountry' => 'CA'	
	);
	
	curl_setopt( $ch, CURLOPT_POSTFIELDS, fim_array_to_query($arrayQuery) );
	
	// Now output the transaction. $txResult will contain Beanstream's response
	$txResult = curl_exec( $ch );
	
	echo "Result:<BR>";
	echo $txResult;
	
	curl_close( $ch );	
}

function fim_get_current_URL() {
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") 
	{
		$pageURL .= "s";
	}
	
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") 
	{
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} 
	else 
	{
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	
	return $pageURL;
}

function fim_array_to_query( $array )
{
    $queryArray = array();
    foreach( $array as $key => $value )
	{
        $queryArray[] = $key . '=' . urlencode( $value );
    }
    return implode( '&', $queryArray );
}

class Child_Wrap extends Walker_Nav_Menu
{
	function start_lvl(&$output, $depth)
	{
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<div><ul>\n";
	}
	function end_lvl(&$output, $depth)
	{
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul></div>\n";
	}
}
?>