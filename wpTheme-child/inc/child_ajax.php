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
?>

<?php
/*

     ===================================
          APPLY FILTERS FUNCTION
     ===================================
* Apply the category filters
*
*/
/* connects ajax.js to this functons*/
add_action( 'wp_ajax_nopriv_wpTheme_apply_filter', 'wpTheme_apply_filter' );
add_action( 'wp_ajax_wpTheme_apply_filter', 'wpTheme_apply_filter' );
/*** wpTheme_read_more () ***/
function wpTheme_apply_filter ()
{
     echo ('<pre>');
     print_r ($_POST);
     echo ('<pre>');
     echo ( 'Still need to do more here on line 52 of ajax.php' );
     die ();
}
?>
