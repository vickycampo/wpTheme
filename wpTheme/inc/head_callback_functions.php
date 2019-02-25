<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

     ===================================
          HEAD CALLBACK FUNCTIONS
     ===================================
*
*/
?>
<?php
/*
     ===================================
          WPHEAD_CB
     ===================================
*
*/
if ( ! function_exists( 'wphead_cb' ) )
{
     function wphead_cb()
     {
          echo ('wphead_cb');
     }
}
?>
<?php
/*
     ===================================
          ADMINHEAD_CB
     ===================================
*
*/
if ( ! function_exists( 'adminhead_cb' ) )
{
     function adminhead_cb()
     {
          echo ('adminhead_cb');
     }
}
?>
<?php
/*
     ===================================
          ADMINPREVIEW_CB
     ===================================
*
*/
if ( ! function_exists( 'adminpreview_cb' ) )
{
     function adminpreview_cb()
     {
          echo ('adminpreview_cb');
     }
}
?>
