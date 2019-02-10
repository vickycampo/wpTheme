<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	===================================
		WP THEME CORE FUNCTIONS
	===================================
* This file contain all the core functions
*
*/
?>
<?php
/*
	================================
	    WPTHEME_GET_THEME_DEFAULTS
	================================
*
* The first specific theme helper, load the theme options and defaults
*/
if (!function_exists('wpTheme_get_theme_defaults')) {
     function wpTheme_get_theme_defaults(){
          // default options settings
          $defaults = array(
               // sidebar
               'sidebar' => 'left',
               // theme tracking
               'presstrends' => 0,
               // typography options
               'heading' => 'notoserif',
               'body' => 'opensans',
               'alt' => 'lato',
               // link color
               'link' => '#428bca',
               'hover' => '#2a6496',
               // content area colors
               'content-color' => '#fff',
               'font-color' => '#111',
               // excerpts or full posts
               'excerpts' => 1,
               // use alt for h1?
               'alth1' => 0,
               // footer text
               'footer' => sprintf( _x( '%1$s %2$s %3$s', '1: copyright, 2: year, 3: blog title', 'wpTheme' ), '&copy;',  date('Y'), get_bloginfo('title') ) . ' . ' . sprintf( __( 'Museum Core is proudly powered by %1$sWordPress%2$s.', 'wpTheme' ), '<a href="http://wordpress.org" target="_blank">', '</a>' ),
               // advanced settings
               'author' => 0,
               'generator' => 0,
               'archive-excerpt' => 1,
               'hovercards' => 1,
               'favicon' => '',
               'site-title' => 1,
               'post-author' => 1,
               'font_subset' => 'latin',
               'nav-menu' => 0,
               'navbar-inverse' => 0,
               'navbar-color' => '',
               'navbar-link' => '',
               'breadcrumbs' => 0
          );
          return $defaults;
     }
}
?>
<?php
/*
	==================================
	    WPTHEME_GET_CONTENT_COLUMNS
	==================================
*
* We determine which side we need to place the content
* Return the content class
*/
if ( ! function_exists ( 'wpTheme_get_content_columns' ) )
{
     function wpTheme_get_content_columns ($location)
     {
          $columns = 12;
          foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar )
          {
               if (strpos ( $sidebar['id'] , $location ) > -1)
               {
                    if ( is_active_sidebar( $sidebar['id'] ) )
                    {
                         $columns = $columns -3;
                    }
               }
          }
          return ('col-md-' . $columns);
     }
}
?>
<?php
/*
	==================================
	    WPTHEME_CORE_COMMENTS
	==================================
*
* This function styles the way comments are display
*/
?>
<?php
if (!function_exists('wpTheme_comments'))
{
     function wpTheme_comments($comment, $args, $depth)
     {
          /* Create a globar variable for the comments */
          $GLOBALS['comment'] = $comment; ?>
          <!--Create list Item -->
          <li <?php comment_class( 'media' ); ?> id="li-comment-<?php comment_ID() ?>">
               <div id="comment-<?php comment_ID(); ?>" class="the_comment">
                    <div class="comment-author vcard">
                         <?php
                         if ( get_avatar($comment) ) : ?>
                              <div class="thumbnail media-object"><?php echo get_avatar($comment,$size='64',$default='' ); ?>
                              </div>
                         <?php endif; ?>
                    </div>
                    <div class="media-body">
                         <label><?php echo sprintf(_x('On %1$s at %2$s, %3$s said:', '1: date, 2: time, 3:author', 'wpTheme'),
                              esc_html( get_comment_date() ),
                              esc_html( get_comment_time() ),
                              wp_kses_post( get_comment_author_link() )
                         ); ?>
                         </label>
                         <?php
                         if ($comment->comment_approved == '0') : ?>
                              <em><?php _e('Your comment is awaiting moderation.', 'wpTheme') ?></em>
                              <br />
                         <?php endif; ?>
                         <?php comment_text() ?>
                         <?php if ( comments_open() ) {
                              if ( $depth < $args['max_depth'] ) { ?>
                                   <div class="reply"><button class="btn btn-default btn-sm">
                                        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'reply_text' => __('Respond to this','wpTheme'), 'max_depth' => $args['max_depth']))) ?>
                                   </button></div>
                              <?php }
                         } ?>
                         <small>
                              <div class="comment-meta commentmetadata"><?php edit_comment_link( '<span class="text-danger">' . __('(Edit)', 'wpTheme') . '</span>','','') ?></div>
                              <a href="<?php comment_link(); ?>"><?php _e( 'Permalink', 'wpTheme' ); ?></a>
                         </small>
                    </div>
               </div>
          </li>
          <?php
     }
}
?>
