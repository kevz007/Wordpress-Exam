<?php 
function fim_option_settings() 
{ 
	?>
	<div class="wrap">
		<div id="icon-options-general" class="icon32"></div>
		<h2><?php echo THEMENAME;?> Settings</h2>
        <?php if(isset($_REQUEST['settings-updated'])) { ?>
        <div class="updated below-h2" id="message"><p>Settings Saved</p></div>
		<?php } ?>
		<form action="options.php" method="post">
		<?php wp_nonce_field('update-options'); ?>
		<div class="tablenav">
			<div class="alignleft actions">
				<input type="submit" name="saving" value="Save All Changes" class="button-secondary" />
			</div>
		</div>	
		<div id="dashboard-widgets-wrap">
			<div id="dashboard-widgets" class="metabox-holder">
					                    
                    <div id='normal-sortables' class='meta-box-sortables'>
						<div id="dashboard_right_now" class="postbox">
							<div class="handlediv" title="Click to toggle"><br /></div>
							<h3 class='hndle'><span>General Settings</span></h3>
								<div class="inside">
									<div class="table">
										<table>
											<tr class="first">
												<td class="first b-posts">Logo</td>
												<td class="t posts">: 
												<input type="text" name="<?php echo PREFIX; ?>general_logo" id="<?php echo PREFIX; ?>general_logo" class="upload_input" tabindex="1" value="<?php echo get_option(PREFIX.'general_logo'); ?>"  style="width:400px;"/>
	
						<a href="media-upload.php?post_id=0&amp;type=image&amp;TB_iframe=true" id="<?php echo PREFIX; ?>general_logo" class="set_input thickbox button-primary" title='Add an Image' onclick="return false;">Upload</a>
												</td>
											</tr>                                           
											<tr class="">
												<td class="first b-posts">Favicon</td>
												<td class="t posts">: 
												<input type="text" name="<?php echo PREFIX; ?>general_favicon" id="<?php echo PREFIX; ?>general_favicon" class="upload_input" tabindex="1" value="<?php echo get_option(PREFIX.'general_favicon'); ?>"  style="width:400px;"/>	
						<a href="media-upload.php?post_id=0&amp;type=image&amp;TB_iframe=true" id="<?php echo PREFIX; ?>general_favicon" class="set_input thickbox button-primary" title='Add an Image' onclick="return false;">Upload</a>
												</td>
											</tr>
											<tr class="first">
												<td class="first b-posts">Facebook Link</td>
												<td class="t posts">: 
										    	   <input type="text" name="<?php echo PREFIX; ?>facebook_link" value="<?php echo get_option(PREFIX.'facebook_link'); ?>"  style="width:400px;"/>   
												</td>
											</tr> 
											<tr class="first">
												<td class="first b-posts">LinkedIn Link</td>
												<td class="t posts">: 
											    	<input type="text" name="<?php echo PREFIX; ?>linkedIn_link" value="<?php echo get_option(PREFIX.'linkedIn_link'); ?>"  style="width:400px;"/>   
												</td>
											</tr> 	
										</table>
									</div>
								</div>
						</div>
					</div>	
                    
                    <div id='normal-sortables' class='meta-box-sortables'>
						<div id="dashboard_right_now" class="postbox">
							<div class="handlediv" title="Click to toggle"><br /></div>
							<h3 class='hndle'><span>Homepage Settings</span></h3>
								<div class="inside">
									
								</div>
						</div>
					</div>	
                    
                   <div id='normal-sortables' class='meta-box-sortables'>
						<div id="dashboard_right_now" class="postbox">
							<div class="handlediv" title="Click to toggle"><br /></div>
							<h3 class='hndle'><span>Footer Settings</span></h3>
								<div class="inside">
									<div class="table">
										<table>
                                            <tr class="">
												<td class="first b-posts">Copyright Text</td>
												<td class="t posts">: 
												<input type="text" name="<?php echo PREFIX; ?>footer_copyright" value="<?php echo get_option(PREFIX.'footer_copyright'); ?>"  style="width:400px;"/>
												</td>
											</tr>                                            
										</table>
									</div>
								</div>
						</div>
					</div>	
			</div>
			<div class="clear"></div>
		</div>
		<input type="hidden" name="action" value="update" />
		<input type="hidden" name="page_options" value="
        <?php echo PREFIX; ?>general_logo,<?php echo PREFIX; ?>general_favicon,<?php echo PREFIX; ?>facebook_link,<?php echo PREFIX; ?>linkedIn_link,<?php echo PREFIX; ?>footer_copyright" />
		<div class="tablenav">
			<div class="alignleft actions">
				<input type="submit" name="saving" value="Save All Changes" class="button-secondary" />
			</div>
		</div>
		</form>	
	</div>
	<?php 
} 

?>