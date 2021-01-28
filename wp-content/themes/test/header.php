<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">		
<meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=no" />
<title><?php bloginfo('name'); ?></title>
<!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->
<link rel="icon" href="<?php echo get_option(PREFIX.'favicon', IMG.'/favicon.ico'); ?>" type="image/png">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php global $post; wp_head(); ?>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="<?php echo JS; ?>/vendor/html5shiv.js" type="text/javascript"></script>
  <script src="<?php echo JS; ?>/vendor/respond.min.js"></script>
<![endif]-->

<div id="container-nav">
     <div><span class="closeNav"><i class="far fa-times-circle"></i></span></div>
     <div class="mobile-menu paddingTop20"></div>    
</div>

<header id="header">
    <div id="mobile-header">Test Site <a class="menu-open" href="#"><i class="fa fa-th fa-lg"></i> Main Menu</a></div>  
    <div class="container">
            <div class="row align-items-center">
                <aside class="col-6 col-sm-3">
                    <a href="#"><img src="<?php echo get_option(PREFIX.'general_logo'); ?>" alt="" /></a>
                </aside>
                <aside class="col-6 col-sm-9">
                    <div class="social-media-links">
                        <a target="_blank" title="Facebook" href="<?php echo get_option(PREFIX.'facebook_link'); ?>"><i class="fab fa-facebook-f"></i></a>
                        <a target="_blank" title="LinkedIn" href="<?php echo get_option(PREFIX.'linkedIn_link'); ?>"><i class="fab fa-linkedin-in"></i></a>
                    </div>  
                    <nav id="main-menu">
                        <ul id="menu" class="menu clearfix">
                            <?php
                              $mainMenu = array(
                                'container' => false, 
                                'theme_location'  => 'main_menu',
                                'menu_class'      => 'mainNav',
                                'items_wrap' => __('%3$s')
                              );							
                              wp_nav_menu( $mainMenu ); 
                            ?>
                         </ul>
                    </nav>                   
            </aside>
            </div> 
    </div>	<!-- end of container -->
</header> <!-- end of header -->    