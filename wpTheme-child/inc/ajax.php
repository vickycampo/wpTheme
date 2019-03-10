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
/* connects ajax.js to this functons*/
add_action( 'wp_ajax_nopriv_wpTheme_read_more', 'wpTheme_read_more' );
add_action( 'wp_ajax_wpTheme_read_more', 'wpTheme_read_more' );
?>
<?php
/***  ***/
function wpTheme_read_more ()
{
     $paged = $_POST['page'];
     echo ($paged);
     die ();
}
?>
