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
	==============================
	  WPTHEME_GET_THEME_DEFAULTS
	==============================
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
               'footer' => sprintf( _x( '%1$s %2$s %3$s', '1: copyright, 2: year, 3: blog title', 'museum-core' ), '&copy;',  date('Y'), get_bloginfo('title') ) . ' . ' . sprintf( __( 'Museum Core is proudly powered by %1$sWordPress%2$s.', 'museum-core' ), '<a href="http://wordpress.org" target="_blank">', '</a>' ),
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
	==============================
	  WPTHEME_GET_CONTENT_SIDE
	==============================
*
* We determine which side we need to place the content
* Return the content class
*/
if ( ! function_exists ( 'wpTheme_get_content_side' ) )
{
     function wpTheme_get_content_side ()
     {
          $content = '';
          $sidebar = wpTheme_get_which_sidebar();

          if ( 'left' == $sidebar ) {
               $content = 'the_right last';
          }

          return $content;
     }
}
?>
<?php
/*
	==============================
	  WPTHEME_GET_WHICH_SIDEBAR
	==============================
*
* We get the side of the sidebar
* Returns the side of the sidebar
*/
if ( ! function_exists ( 'wpTheme_get_which_sidebar' ))
{
     function wpTheme_get_which_sidebar ()
     {
          $defaults = wpTheme_get_theme_defaults();
          $options = get_option( 'ap_core_theme_options' );
          if ( isset( $options['sidebar'] ) )
          {
               $sidebar = $options['sidebar'];
               if ( 'right' == $sidebar )
               {
                    $sidebar .= ' last';
               }
          }
          else
          {
               $sidebar = $defaults['sidebar'];
          }

          return $sidebar;
     }
}
?>
