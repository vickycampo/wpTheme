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
if (!function_exists('wpTheme_get_theme_defaults'))
{
     function wpTheme_get_theme_defaults()
     {
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
               'breadcrumbs' => 0,
               'skins' => 0,
               'bs-screen-size' => '-'
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
* Which sidebards are active and returnd the columns for the body part
* Return the content class
*/
if ( ! function_exists ( 'wpTheme_get_content_columns' ) )
{
     function wpTheme_get_content_columns ($location)
     {
          //The first specific theme helper, load the theme options and defaults
          $defaults = wpTheme_get_theme_defaults ();
          //Fetch options from the database table
          $options = get_option ('wpTheme_options');

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
          /* We determine which screen size we are using*/
          if ( isset ( $options['bs-screen-size'] ) )
          {
               return ('col'. $options['bs-screen-size'] . $columns);
          }
          else
          {
               return ('col'. $defaults['bs-screen-size'] . $columns);
          }

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
<?php
/*
	==================================
	    WPTHEME_CORE_COMMENTS
	==================================
*
* this fetches the custom color options from the database and spits them out into the header
*/

if (!function_exists('wpTheme_custom_styles'))
{
     function wpTheme_custom_styles()
     {
          /* Values that will be updated and added to the styles part */
          $output = null;
          $output_heading = null;
          $output_alt = null;
          $output_body = null;
          $output_content_bg = null;
          $output_font = null;
          $output_link = null;
          $output_hover = null;
          $output_navbar = null;
          $output_navbar_link = null;
          $heading = null;
          $body = null;
          $alt = null;
          $link = null;
          $hover = null;
          $font = null;
          $content_bg = null;
          $navbar_color = null;
          $navbar_link = null;
          /* We get the defaults and the options values */
          $defaults = wpTheme_get_theme_defaults();
          $options = get_option( 'wpTheme_options' );

          /* Set the heading font */
          if ( isset( $options['heading'] ) && $options['heading'] != $defaults['heading'] )
          {
               $heading = sanitize_text_field($options['heading']);
               $output_heading = "h1, h2, h3 { font-family: '$heading', sans-serif; }";
          }

          /* set the body font */
          if ( isset( $options['body'] ) && $options['body'] != $defaults['body'] || isset( $options['font-color'] ) && $options['font-color'] != $defaults['font-color'] )
          {
               $output_body = 'body {';

               if ( isset( $options['body'] ) ) {
                    $body = sanitize_text_field($options['body']);
                    $output_body .= "font-family: '$body', sans-serif;";
               }

               if ( isset( $options['font-color'] ) ) {
                    $font = sanitize_text_field( $options['font-color'] );
                    $output_body .= "color: $font;";
               }

               $output_body .= '}';
          }
          // set the alt font
          if ( isset( $options['alt'] ) && $options['alt'] != $defaults['alt'] ) {
               $alt = sanitize_text_field($options['alt']);
               $output_alt = "h4, h5, h6, .alt, h3 time { font-family: '$alt', sans-serif; }";
          }
          // set the content background color
          if ( isset( $options['content-color'] ) && $options['content-color'] != $defaults['content-color'] ) {
               $content_bg = sanitize_text_field( $options['content-color'] );
               $output_content_bg = ".container { background: $content_bg; }";
          }
          // set the link color
          if ( isset( $options['link'] ) && $options['link'] != $defaults['link'] ) {
               $link = sanitize_text_field($options['link']);
               $output_link = "a, a:link, a:visited { color: $link; -webkit-transition: all 0.3s ease!important; -moz-transition: all 0.3s ease!important; -o-transition: all 0.3s ease!important; transition: all  0.3s ease!important; }";
          }
          if ( isset( $options['hover'] ) && $options['hover'] !== $defaults['hover'] || isset( $options['hover'] ) && isset( $options['link'] ) )
          {
               $hover = sanitize_text_field($options['hover']);
               $output_hover = "a:hover, a:active { color: $hover; -webkit-transition: all 0.3s ease!important; -moz-transition: all 0.3s ease!important; -o-transition: all 0.3s ease!important; transition: all  0.3s ease!important; }";
          }
          if ( isset( $options['navbar-color'] ) )
          {
               $navbar_color = sanitize_text_field( $options['navbar-color'] );
               $output_navbar = ".topnav { background-color: $navbar_color; }";
          }
          if ( isset( $options['navbar-link'] ) ) {
               $navbar_link = sanitize_text_field( $options['navbar-link'] );
               $output_navbar_link .= ".topnav .navbar-nav>li>a { color: $navbar_link; }";
               if ( true == $options['navbar-inverse'] ) {
                    $output_navbar_link .= '.topnav .navbar-nav>li>a:hover { color: #fff; }';
               } else {
                    $output_navbar_link .= '.topnav .navbar-nav>li>a:hover { color: #333; }';
               }
          }

          $output = '<style type="text/css" media="print,screen">';
          $output .= $output_heading;
          $output .= $output_alt;
          $output .= $output_body;
          $output .= $output_content_bg;
          $output .= $output_link;
          $output .= $output_hover;
          $output .= $output_navbar;
          $output .= $output_navbar_link;

          if ( isset( $options['site-title'] ) && $options['site-title'] == false )
          {
               $output .= '.headerimg hgroup h2, .headerimg hgroup h3 { float: left; position: absolute; left: -999em; height: 0px; }';
          }

          $output .= '</style>';
          if ( $heading || $body || $alt || $link || $hover || isset( $options['site-title'] ) && $options['site-title'] == false ) {
               echo wp_kses( $output, array( 'style' => array( 'type' => array(), 'media' => array() ) ) );
          }
     }
     add_action( 'wp_head', 'wpTheme_custom_styles' );
}
?>
<?php
/*
	================================
	    WPTHEME_GET_THEME_DEFAULTS
	================================
*
* Adds breadcrumbs and hooks them into tha_content_top if enabled.
*/
if ( !function_exists( 'wpTheme_breadcrumbs' ) )
{

     /* We get the defaults and the options values */
     $options = get_option( 'wpTheme_options' );
     function wpTheme_breadcrumbs()
     {

          global $post, $paged;
          ?>
          <nav class="my-breadcrumbs" aria-label="breadcrumb">
               <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                         <a href="<?php echo (home_url()); ?>">
                              Home
                         </a>
                    </li>

          <?php
          /**/

          /* if is a category of a single page we put the category */
          if (is_category() || is_single())
          {
               if (is_category())
               {
                    /* Get the current Category */
                    $categories = get_queried_object();
                    // echo ('<pre>');
                    // var_dump ($categories);
                    // echo ('</pre>');
               }
               else
               {
                    $categories = get_the_category()[0];
               }
               /* The cagetory has a parent? */
               if ( ! empty( $categories ) )
               {
                    /* Has parent? */
                    if ($categories->parent != 0)
                    {
                         $parentCat = get_category( $categories->parent );

                         ?>
                         <li class="breadcrumb-item">
                              <?php
                              ?>
                              <a href="<?php echo (get_category_link($parentCat->cat_ID));?>">
                                   <?php echo ($parentCat->name);?>
                              </a>
                         </li>
                         <?php
                    }

               }
               /* Check if the post or page has a category */
               if ( ! empty( $categories ) )
               {
                   ?>
                  <li class="breadcrumb-item">
                       <a href="<?php echo (get_category_link($categories->cat_ID));?>">
                            <?php echo ($categories->name);?>
                       </a>
                  </li>
                  <?php
               }

               if (is_single())
               {
                    ?>
                    <li class="breadcrumb-item">
                         <a href="<?php echo (get_permalink());?>">
                              <?php echo (the_title());?>
                         </a>
                    </li>
                    <?php

               }
          }
          elseif (is_page())
          {
               ?>
               <li class="breadcrumb-item">
                    <?php
                    the_title();
                    ?>
               </li>
               <?php
          }
          elseif (is_search())
          {
               ?>
               <li class="breadcrumb-item">
                    <?php
                    the_search_query();
                    ?>
               </li>
               <?php
          }
          ?>
               </ol>
          </nav>
          <?php
     }
     if ( isset( $options['breadcrumbs'] )  && ( true == $options['breadcrumbs'] ) )
     {
          add_action( 'tha_content_top', 'wpTheme_breadcrumbs' );
     }
}

?>
<?php
/*
	================================
	    WPTHEME_TITLE
	================================
*
* Replaces default wp_title with a modified version
*/
if (!function_exists('wpTheme_title'))
{
     function wpTheme_title( $title )
     {
          /* NOT A 404 PAGE */
          if ( !is_404() )
          {
               $category = get_the_category(); // get the category only if we aren't looking at a 404 page
          }
          $name = get_bloginfo('name');
          $description = get_bloginfo('description');

          // if we're on the home page...
          if ( is_home() )
          {
               $title_string = $name;
          }

          // if we're on a category archive page...
          elseif ( is_category() )
          {
               $title_string = single_cat_title( '', false ) . ' | ' . $name;
          }

          // if we're on a single post...
          elseif ( is_single() ) {
               if ( !is_attachment() ) {
                    $title_string = single_post_title( '', false ) . ' | ' . $category[0]->cat_name;
               } else {
                    global $post;
                    $parent = get_post( $post->post_parent );
                    $title_string = single_post_title( '', false ) . ' : ' . get_the_title( $parent );
               }
          }

          // if we're on a page...
          elseif ( is_page() ) {
               $title_string = single_post_title( '', false );
          }

          // if we're on a 404...
          elseif ( is_404() ) {
               $title_string = 'Page not found | ' . $name;
          }
          // for everything else...
          else {
               $title_string = $name;
          }

          $title_string .= ' | ' . $description;

          // return new title
          return $title_string;
     }
     add_filter( 'wp_title', 'wpTheme_title' );
}
?>
<?php
/*
	================================
	    WPTHEME_BLOG_EXCERPTS
	================================
*
* Returns the blog excerpt option
*/
if ( !function_exists( 'wpTheme_blog_excerpts' ) )
{
   function wpTheme_blog_excerpts()
   {
       $options = get_option( 'wpTheme_options' );
       $defaults = wpTheme_get_theme_defaults();
       if ( !isset( $options['excerpts'] ) )
       {
          $excerpt = $defaults['excerpts'];
       }
       else
       {
          $excerpt = $options['excerpts'];
       }

       return $excerpt;
   }
}
?>
<?php
/*
	================================
	    WPTHEME_ARCHIVE_EXCERPTS
	================================
*
* returns the archive excerpt option
*/
if ( !function_exists( 'wpTheme_archive_excerpts()' ) )
{
     function wpTheme_archive_excerpts()
     {
          $options = get_option( 'wpTheme_options' );
          $defaults = wpTheme_get_theme_defaults();
          if ( !isset( $options['archive-excerpt'] ) )
          {
               $excerpt = $defaults['archive-excerpt'];
          }
          else
          {
               $excerpt = $options['archive-excerpt'];
          }

          return $excerpt;
     }
}

?>
<?php
/*
	================================
	    WPTHEME_LINK_PAGES
	================================
*
* Modification of wp_link_pages() with an extra element to highlight the current page.
*/
if ( !function_exists( 'wpTheme_link_pages()' ) )
{
     function wpTheme_link_pages( $args = array () )
     {
          $defaults = array(
               'before'      => '<p>' . __('Pages:', 'wpTheme'),
               'after'       => '</p>',
               'before_link' => '',
               'after_link'  => '',
               'current_before' => '',
               'current_after' => '',
               'link_before' => '',
               'link_after'  => '',
               'pagelink'    => '%',
               'echo'        => 1
          );

          $r = wp_parse_args( $args, $defaults );
          $r = apply_filters( 'wp_link_pages_args', $r );
          extract( $r, EXTR_SKIP );

          global $page, $numpages, $multipage, $more, $pagenow;

          if ( ! $multipage )
          {
               return;
          }

          $output = $before;

          for ( $i = 1; $i < ( $numpages + 1 ); $i++ )
          {
               $j       = str_replace( '%', $i, $pagelink );
               $output .= ' ';

               if ( $i != $page || ( ! $more && 1 == $page ) )
               {
                    $output .= "{$before_link}" . _wp_link_page( $i ) . "{$link_before}{$j}{$link_after}</a>{$after_link}";
               }
               else
               {
                    $output .= "{$current_before}{$link_before}<a>{$j}</a>{$link_after}{$current_after}";
               }
          }

          print wp_kses_post( $output ) . $after;
     }
}
?>
<?php
/*
	================================
	    WPTHEME_NEW_EXCERPT_MORE
	================================
*
* this changes the default [...] to be a read more hyperlink
*/
if (!function_exists('wpTheme_new_excerpt_more'))
{
     function wpTheme_new_excerpt_more($more)
     {
          global $post;
          return '...&nbsp;(<a href="'. get_permalink($post->ID) . '">' . __('read more','wpTheme') . '</a>)';
     }
     add_filter('excerpt_more', 'wpTheme_new_excerpt_more');
}
?>
<?php
/*
	================================
	    WPTHEME_HEADER_META
	================================
*
* serves up meta data if enabled
*/
if (!function_exists('wpTheme_header_meta'))
{
     function wpTheme_header_meta()
     {
          global $post;
          $options = get_option( 'wpTheme_options' );
          $author_id = null;
          $author = null;

          /* author meta */
          if ( isset( $options['author'] ) && $options['author'] == true )
          {
               if (!is_404())
               {
                    // if there is no post author, this stuff doesn't exist
                    if ( $post->post_author )
                    {
                         $author_id = $post->post_author;
                         $author = get_userdata($author_id);
                    }
                    if ( $author )
                    {
                         ?>
                              <meta name="author" content="<?php echo sanitize_text_field($author->display_name); ?>">
                         <?php
                    } // ends author check
               } // ends 404 check
          } // ends author option check
     }
     add_action( 'wp_head', 'wpTheme_header_meta' );
}
?>
