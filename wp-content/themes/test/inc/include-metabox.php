<?php
function fim_add_custom_box() {

  if( function_exists( 'add_meta_box' )) {
	#add_meta_box( 'metabox', __( THEMENAME.' Meta Options', 'fim' ),  'fim_post_custom_box', 'post', 'normal', 'high');
	#add_meta_box( 'metabox', __( THEMENAME.' Meta Options', 'fim' ),  'fim_page_custom_box', 'page', 'normal', 'high');
  }  
}
	
function fim_post_custom_box() {
	global $post;
?>
<input type="hidden" name="fim_noncename" id="fim_noncename" value="<?php echo wp_create_nonce( plugin_basename(__FILE__) ) ?>" />
<table>
    <tr>
        <td>
            <label for="fim_new_field"><?php echo __("Post Thumbnail:", 'fim' ) ?></label>
        </td>
	    <td>
			<input type="text" name="<?php echo PREMETA; ?>postthumb" id="<?php echo PREMETA; ?>postthumb" class="upload_input" tabindex="1" value="<?php echo get_post_meta($post->ID, PREMETA."postthumb", true); ?>"  style="width:400px;"/>
	
						<a href="media-upload.php?post_id=0&amp;type=image&amp;TB_iframe=true" id="<?php echo PREMETA; ?>postthumb" class="set_input thickbox button-primary" title='Add an Image' onclick="return false;">Upload</a>
            <br /><!--<em>*Select product post category you want to be displayed in this page.</em>-->
      	</td>
   	</tr>
    <tr><td colspan="2"><br></td></tr>
</table>
<?php }

function fim_page_custom_box() {
	global $post;
?>
<input type="hidden" name="fim_noncename" id="fim_noncename" value="<?php echo wp_create_nonce( plugin_basename(__FILE__) ) ?>" />
<table>
    <tr>
        <td>
            <label for="fim_new_field"><?php echo __("Excerpt:", 'fim' ) ?></label>
        </td>
	    <td>
			<textarea name="<?php echo PREMETA; ?>address" id="<?php echo PREMETA; ?>address" style="width:90%;"><?php echo get_post_meta($post->ID, PREMETA."address", true); ?></textarea>
      	</td>
   	</tr>
    <tr><td colspan="2"><br></td></tr>
</table>
<?php }

function fim_save_postdata( $post_id ) {

	if ( !wp_verify_nonce( $_POST['fim_noncename'], plugin_basename(__FILE__) )) {
    	return $post_id;
  	}

  	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
    	return $post_id;
	
	if ( 'page' == $_POST['post_type'] ) {
    	if ( !current_user_can( 'edit_page', $post_id ) )
     		 return $post_id;
  	} else {
    	if ( !current_user_can( 'edit_post', $post_id ) )
      		return $post_id;
  	}
	
	if ( $parent_id = wp_is_post_revision($post_id) )
	{
		$post_id = $parent_id;
	}

	if (!get_post_meta($post_id, PREMETA."postthumb")) {
		add_post_meta($post_id, PREMETA."postthumb", $_POST[PREMETA."postthumb"]);
  	}else{
  		update_post_meta($post_id, PREMETA."postthumb", $_POST[PREMETA."postthumb"]);
  	}
	if ($_POST[PREMETA."postthumb"] == "") {
		  delete_post_meta($post_id, PREMETA."postthumb");
	}
	
	if (!get_post_meta($post_id, PREMETA."mobilephone")) {
		add_post_meta($post_id, PREMETA."mobilephone", $_POST[PREMETA."mobilephone"]);
  	}else{
  		update_post_meta($post_id, PREMETA."mobilephone", $_POST[PREMETA."mobilephone"]);
  	}
	if ($_POST[PREMETA."mobilephone"] == "") {
		  delete_post_meta($post_id, PREMETA."mobilephone");
	}
	
	if (!get_post_meta($post_id, PREMETA."email")) {
		add_post_meta($post_id, PREMETA."email", $_POST[PREMETA."email"]);
  	}else{
  		update_post_meta($post_id, PREMETA."email", $_POST[PREMETA."email"]);
  	}
	if ($_POST[PREMETA."email"] == "") {
		  delete_post_meta($post_id, PREMETA."email");
	}
	
	if (!get_post_meta($post_id, PREMETA."contactname")) {
		add_post_meta($post_id, PREMETA."contactname", $_POST[PREMETA."contactname"]);
  	}else{
  		update_post_meta($post_id, PREMETA."contactname", $_POST[PREMETA."contactname"]);
  	}
	if ($_POST[PREMETA."contactname"] == "") {
		  delete_post_meta($post_id, PREMETA."contactname");
	}
	
	if (!get_post_meta($post_id, PREMETA."address")) {
		add_post_meta($post_id, PREMETA."address", $_POST[PREMETA."address"]);
  	}else{
  		update_post_meta($post_id, PREMETA."address", $_POST[PREMETA."address"]);
  	}
	if ($_POST[PREMETA."address"] == "") {
		  delete_post_meta($post_id, PREMETA."address");
	}
}

?>