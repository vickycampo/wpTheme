<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

     ===================================
          REGISTER NAVBARS
     ===================================
* This page generating the footer.
*
*/
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
         	'top' => __( 'Top Header Navigation', 'wpTheme' ),
         	'main' => __( 'Main Navigation', 'wpTheme' ),
         	'footer' => __( 'Footer Navigation', 'wpTheme' )
          );
          register_nav_menus( $locations );
     }
     add_action( 'init', 'wpTheme_register_nav_menu' );
}
?>
