<?php
/*

@package WordPress
@subpackage wpChildTheme  Child Them
@since wpTheme

     ===================================
          AJAX PHP
     ===================================
* Contains the funcitons that will be needed for the ajax
*
*/
namespace wptchild;

/**
 * Settings API Callbacks Class
 */
class ChildAjax
{
	public function register()
     {
          add_action( 'wp_ajax_nopriv_wpTheme_apply_filter', array ( $this , 'wpTheme_apply_filter' ) );
          add_action( 'wp_ajax_wpTheme_apply_filter',  array ( $this , 'wpTheme_apply_filter' ) );
     }
     public function wpTheme_apply_filter ()
     {
          echo ('<pre>');
          print_r ($_POST);
          echo ('<pre>');
          /*** wpTheme_read_more () ***/
          echo ( 'Still need to do more here on line 52 of ajax.php' );
          die ();
     }
}
?>
