<?php
/*

@package WordPress
@subpackage wpTheme Child Them
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
