<?php
function fim_comment( $comment, $args, $depth ) 
{
	global $post;
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) {
		case 'pingback' :
		case 'trackback' :
		{
			?>
			<div class="row post pingback">
				<p><?php _e( 'Pingback:', 'sis' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'sis' ), '<span class="edit-link">', '</span>' ); ?></p>
			<?php
		} break;
		default :
		{
			?>
			<div class="row" id="li-comment-<?php comment_ID(); ?>">
                <?php
					$avatar_size = 68;
					if ( '0' != $comment->comment_parent )
						$avatar_size = 39;
					
					// Uncomment below to enable gravatar - codermoi
					// echo get_avatar( $comment, $avatar_size );
				?>
                <p>  
					<?php  
						printf( __( '%1$s, %2$s', 'sis' ),
							sprintf( '<span class="commentTitle">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s" class="date">%3$s</a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s', 'sis' ), get_comment_date() )
							)
						);
					?>
               	</p>
                <?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting for moderation.', 'avt' ); ?></em>
				<?php endif; ?>
                <p><?php comment_text(); ?></p>
		
                <div class="reply">
                    <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'תגובה <span>&darr;</span>', 'avt' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </div>            

			<?php
		} break;
	}
	echo '</div>';
}

function fim_comment_form($post_ID=1) 
{
	global $post;
	?>
    <div id="respond">
        <h2><?php echo __('Add Comment'); ?></h2>
        <div class="form">  
        <?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
			<?php echo $args['must_log_in']; ?>
            <?php do_action( 'comment_form_must_log_in_after' ); ?>
        <?php else : ?> 
		<form id="commentform" method="post" action="<?php echo SITEURL; ?>/wp-comments-post.php">
        	<?php if ( is_user_logged_in() ) : ?>
				<?php echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity ); ?>
                <?php do_action( 'comment_form_logged_in_after', $commenter, $user_identity ); ?>
            <?php else : ?>
            <div class="field">
            <label for="author"><span class="red">*</span> <?php echo __('Name'); ?>:</label><input type="text" value="" name="author" id="author" aria-required="true"/> <?php echo __('(חובה)'); ?>
            </div>
            <div class="field">
            <label for="email"><span class="red">*</span> <?php echo __('Email'); ?>:</label><input type="text" value="" name="email" id="email" aria-required="true" /> <?php echo __('(כתובת האימייל לא תפורסם)'); ?>
            </div>
            <?php endif; ?>
            <div class="field">
            <label for="comment"><span class="red">*</span> <?php echo __('Comments'); ?></label><textarea cols="50" rows="5" name="comment"></textarea>
            </div>
            <div class="field">
                <input type="submit" value="<?php echo __('שליחה'); ?>" id="submit" name="submit" />
                <?php comment_id_fields( $post_ID); ?>
                <?php do_action( 'comment_form', $post_ID ); ?>
            </div>
		</form>
        <?php endif; ?>
		</div>
   	</div>
    <?php
}
?>