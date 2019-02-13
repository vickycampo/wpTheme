<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	===================================
		COMMENTS
	===================================
* This page displays comments in your theme based on the settings and code.
*
*/
?>
<?php
/* Check if the post requires a password */
if ( post_password_required() )
{ ?>
     <!-- This post requires a pass wrod, leave a message to log in. -->
     <p class="nocomments">
          <?php _e('This post is password protected. Enter the password to view comments.','wpTheme'); ?>
     </p>
     <?php return;

}
/* If the post has comments */
if ( have_comments() )
{
     /* TRUE */
     ?>
     <!-- display the title of how many comments it has -->
     <h3 id="comments">
          <?php printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'wpTheme' ), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?>
     </h3>
     <!-- Navigate through the comments -->
     <nav class="navigation clearfix">
          <ul class="pager">
               <li class="previous"><?php previous_comments_link() ?></li>
               <li class="next"><?php next_comments_link() ?></li>
          </ul>
     </nav>
     <!-- Display the comments -->
     <ol class="commentlist">
          <?php
          /* Use the wpTheme_comments function */
          wp_list_comments('callback=wpTheme_comments');
          ?>
     </ol>
     <!-- Navigate through the comments -->
     <nav class="navigation clearfix">
          <ul class="pager">
               <li class="previous"><?php previous_comments_link() ?></li>
               <li class="next"><?php next_comments_link() ?></li>
          </ul>
     </nav>
     <?php
} // ends have_comments()
/*  Can comments be posted? */
if ( !comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) && !is_page() )
{


     /*  False */
     // if it's not a page, display comments are closed message ?>
     <p><?php _e('Comments are closed.','wpTheme'); ?></p>

     <?php
}

if ( comments_open() )
{
     /*  True */
     ?>
     <!-- Display cancel comment display link -->
     <div class="cancel-comment-reply">
          <small><?php cancel_comment_reply_link( '<span class="text-danger">' . __( 'Cancel comment response', 'wpTheme' ) . '</span>' ); ?>
          </small>
     </div>

     <?php
     /* Creat a coment form */
     $ap_comment_form = '<div class="form-group"><label for="comment">' . __( 'Comment', 'wpTheme' ) . '</label>';
     $ap_comment_form .= '<textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>';
     $ap_comment_form .= '</div>';

     $ap_comment_notes_after = '<div class="form-group form-allowed-tags">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', 'wpTheme' ), ' <pre>' . allowed_tags() . '</pre>' ) . '</div>';
     /* Display coment form */
     comment_form( array( 'comment_field' => $ap_comment_form, 'comment_notes_after' => $ap_comment_notes_after ) ); ?>

<?php
} // end comments_open() ?>
