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

          /* SubCat Navibation Menu */
          $handle = 'SubCat-nav';
          $src = get_stylesheet_directory_uri() . '/assets/css/subCat_nav.css';
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

          /* Add Javascript files */
          $handle= 'wpChildTheme_js'; //is simply the name of the stylesheet.
          $src = get_stylesheet_directory_uri() . '/assets/js/wpChildTheme.js';
          $deps = '';
          $ver = '4.2.1'; //sets the version number.
          $in_footer = true;
          wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer);

          /* Add Top navbar functions javascript file */
          $handle= 'topNavBar_js'; //is simply the name of the stylesheet.
          $src = get_stylesheet_directory_uri() . '/assets/js/topNavBar.js';
          $deps = '';
          $ver = wp_get_theme()->get('Version'); //sets the version number.
          $in_footer = true;
          wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer);

          /* Add Top navbar functions javascript file */
          $handle= 'subCatNav_js'; //is simply the name of the stylesheet.
          $src = get_stylesheet_directory_uri() . '/assets/js/catNavBar.js';
          $deps = '';
          $ver = wp_get_theme()->get('Version'); //sets the version number.
          $in_footer = true;
          wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer);
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
<?php
/*
     ===============================
          UNREGISTER SIDEARS
     ===============================
* We don't use that many side bars on the theme so we can remove them
*/
function remove_some_widgets(){

	// Unregister some of the TwentyTen sidebars
	unregister_sidebar( 'body-left-sidebar' );
	unregister_sidebar( 'body-right-sidebar' );
}
add_action( 'widgets_init', 'remove_some_widgets', 11 );
?>
<?php
/*
     ===============================
          BREADCRUMBS
     ===============================
* Create a special BREADCRUMBS function for the child theme
*/
if ( !function_exists( 'wpTheme_breadcrumbs' ) )
{
     $options = get_option( 'wpTheme_options' );
     function wpTheme_breadcrumbs()
     {
          echo ('breadcrumbs - Functions line 167');
     }
     if ( isset( $options['breadcrumbs'] )  && ( true == $options['breadcrumbs'] ) )
     {
          add_action( 'tha_content_top', 'wpTheme_breadcrumbs' );
     }
}
