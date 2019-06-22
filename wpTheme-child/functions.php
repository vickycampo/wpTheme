<?php
//wp_set_password( 'password', 1 );
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

          /* Breadcrumbs */
          $handle = 'breadcrumbs_css';
          $src = get_stylesheet_directory_uri() . '/assets/css/breadcrumbs.css';
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

          /* Add ajax */
          $handle= 'child_ajax_js'; //is simply the name of the stylesheet.
          $src = get_stylesheet_directory_uri() . '/assets/js/child_ajax.js';
          $deps = array('jquery');
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
          GENERIC SIDEBARS
     ===============================
* We don't use that many side bars on the theme so we can remove them
*/
if ( ! function_exists( 'wpTheme_generic_sidebars' ) )
{
     function wpTheme_generic_sidebars()
     {

     }
     add_action( 'widgets_init', 'wpTheme_generic_sidebars' );
}
?>
<?php
/*
     =================================
          REGISTER NAVIGATION MENUS
     =================================
*
* To create a navigation menu you’ll need to register it,
* and then display the menu in the appropriate location in your theme.
* locations are added to the “Manage Locations” tab
*/
if ( ! function_exists( 'wpTheme_register_nav_menu' ) )
{
     function wpTheme_register_nav_menu()
     {
          $locations = array(
         	'top' => __( 'Top Header Navigation', 'wpTheme' )
          );
          register_nav_menus( $locations );
     }
     add_action( 'init', 'wpTheme_register_nav_menu' );
}
?>

<?php
/*
     ==============================
          REGISTER NAVIGATION MENUS
     ==============================
*
* To create a navigation menu you’ll need to register it,
* and then display the menu in the appropriate location in your theme.
* locations are added to the “Manage Locations” tab
*/
if ( ! function_exists( 'wpTheme_register_nav_menu' ) )
{
     function wpTheme_register_nav_menu()
     {
          $locations = array(
         	'top' => __( 'Top Header Navigation', 'wpTheme' )
          );
          register_nav_menus( $locations );
     }
     add_action( 'init', 'wpTheme_register_nav_menu' );
}
?>
<?php
/*
     ========================================
          SHOWS CURRENT QUERY
     ========================================
*
* Only used for development - We add a q to see what is being queried in the current page or template part
*/
add_action( 'wp_head', 'show_current_query' );
if ( ! function_exists( 'show_current_query' ) )
{
     function show_current_query()
     {
          global $wp_query;

          if ( !isset( $_GET['q'] ) )
          return;
          echo '<textarea cols="50" rows="10">';
          print_r( $wp_query );
          echo '</textarea>';
     }
}

function show_current_query() {
    global $wp_query;

    if ( !isset( $_GET['q'] ) )
        return;
    echo '<textarea cols="50" rows="10">';
    print_r( $wp_query );
    echo '</textarea>';
}
?>
<?php
/*
     ========================================
          AJAX.PHP
     ========================================
*
* File with the php functions for the ajax
*/
include_once (get_stylesheet_directory() . '/inc/child_ajax.php');
?>
<?php
/*
     ========================================
          CUSTOMIZE POST TYPES
     ========================================
*
* File with the php functions for the ajax
*/
include_once (get_stylesheet_directory() . '/inc/custom_post_types.php');
?>
