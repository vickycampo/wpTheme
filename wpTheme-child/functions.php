<?php
/*

@package WordPress
@subpackage wpChildTheme  Child Them
@since wpTheme

     ===================================
          FUNCTIONS
     ===================================
* This page is always used as the site front page if it exists,
* regardless of what settings on Admin > Settings > Reading..
*
*/
?>
<?php
/*
     ========================================
          ENQUEUE PARENT STYLES FUNMCTION
     ========================================
*
* Imports the enqueue file fromt the partent so we can overide the styles for the child
*/
include_once (get_parent_theme_file_path() . '/inc/enqueue.php');
?>
<?php
/*
     ===================================
          CHILD THEME OPTIONS
     ===================================
*
* Adds customizations controls to the chilc theme
*/
if ( ! function_exists( 'wpChild_scripts' ) )
{
}
?>
<?php
/*
     ===================================
          wpChild_scripts
     ===================================
*
* Loads the styles of the child file
*/
if ( ! function_exists( 'wpChild_scripts' ) )
{
     /* create a function that will import the child-style sheet */
     function wpChild_scripts ()
     {
          /* General Child Theme Styles */
          $handle = 'child-style';
          $src = get_stylesheet_directory_uri() . '/assets/css/child-style.css';
          $deps = '';
          $ver = wp_get_theme()->get('Version');
          $media = '';

          wp_enqueue_style( $handle , $src , $deps , $ver , $media );

          /* Top Navibation Menu */
          $handle = 'top-nav';
          $src = get_stylesheet_directory_uri() . '/assets/css/top-nav.css';
          $deps = '';
          $ver = wp_get_theme()->get('Version');
          $media = '';

          wp_enqueue_style( $handle , $src , $deps , $ver , $media );

          /* Body */
          $handle = 'body_css';
          $src = get_stylesheet_directory_uri() . '/assets/css/body.css';
          $deps = '';
          $ver = wp_get_theme()->get('Version');
          $media = '';

          wp_enqueue_style( $handle , $src , $deps , $ver , $media );

          /* Header */
          $handle = 'header_css';
          $src = get_stylesheet_directory_uri() . '/assets/css/header.css';
          $deps = '';
          $ver = wp_get_theme()->get('Version');
          $media = '';

          wp_enqueue_style( $handle , $src , $deps , $ver , $media );
     }
     add_action( 'wp_enqueue_scripts', 'wpChild_scripts' );
}
?>
<?php
/*
     ===============================
          ENQUEUE MORE FONTS
     ===============================
* Enqueue fonts needed directly for the child theme
*/
if ( ! function_exists( 'wpTheme_enqueue_more_fonts' ) )
{
     function wpTheme_enqueue_more_fonts ()
     {
          if (! is_admin()) //Instruction to only load if it is not the admin area
          {
               //Information of the current active theme
               $theme = wp_get_theme ();
               $handle = 'google-fonts-Walter';
               $src = "https://fonts.googleapis.com/css?family=Rock+Salt|Walter+Turncoat";
               $deps = false;
               $ver = $theme['version'];
               wp_register_style( $handle, $src, $deps );
               wp_enqueue_style ($handle);
          }
     }
     add_action( 'wp_enqueue_scripts', 'wpTheme_enqueue_more_fonts' );
}
?>
