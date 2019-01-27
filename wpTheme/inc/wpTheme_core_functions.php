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
	  WPTHEME_GET_CONTENT_COLUMNS
	==============================
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

?>
