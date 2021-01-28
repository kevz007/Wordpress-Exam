<?php
function fim_breadcrumbs()
{
	echo '<ul class="breadcrumb">';
	global $wp_query;
	echo __('<li><a href="'.SITEURL.'">Home</a></li>');
	if ( is_front_page() ){
		echo __('Home');
	}
	elseif(is_archive()) {
		$post = $wp_query->get_queried_object();
		
		echo __(' <li class="active">'. $post->labels->singular_name . '</li>');
	}else {
		if ( is_single() ) 
		{
			$post = $wp_query->get_queried_object();
			$custom_post = get_post_type_object( get_post_type($post) );

			if(get_post_type($post) == "post" ) {
				echo __(' <li class="active">'. the_title('','', FALSE) . '</li>');
			}else {
				echo __(' <li><a href="'.SITEURL.'/' . $custom_post->name . '/">' . $custom_post->labels->singular_name . '</a></li>');
				echo __(' <li class="active">'. the_title('','', FALSE) . '</li>');
				
			}
			
		}
		elseif ( is_page() ) 
		{
			$post = $wp_query->get_queried_object();
			if ( $post->post_parent == 0 )
			{
				echo __(' <li class="active">'.the_title('','', FALSE).'</li>');
			} 
			else 
			{
				$title = the_title('','', FALSE);
				$ancestors = array_reverse( get_post_ancestors( $post->ID ) );
				array_push($ancestors, $post->ID);
				foreach ( $ancestors as $ancestor )
				{
					if( $ancestor != end($ancestors) )
					{
						echo __(' <li><a href="'. get_permalink($ancestor) .'">'. strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) .'</a></li>');
					} 
					else 
					{
						echo __('<li class="active">'.strip_tags(apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) .'</li>');
					}
				}
			}
		}
		elseif ( is_404() ) 
		{
			echo __('<li class="active">Error 404</li>');
		}
	}
	echo '</ul>';
}
?>