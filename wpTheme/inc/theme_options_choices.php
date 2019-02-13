<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	===================================
		THEME OPTIONS - CHOICES FUNCTIONS
	===================================
*
* All the functions that are used to validate the information in the theme_options.php
*/
?>
<?php
/*
	==================================
	    WPTHEME_CORE_COMMENTS
	==================================
*
* Generic yes/no function used for true/false options
*/
?>
<?php

if (!function_exists('wpTheme_true_false'))
{
     function wpTheme_true_false()
     {
          $ap_core_true_false = array(
               true => __('Yes','wpTheme'),
               false => __('No','wpTheme')
          );
          return $ap_core_true_false;
     }
}
?>
<?php
/*
	==============================
		CHOICES - SIDEBAR
	==============================
*
* Validate TRUE / FALSE options
*/
if ( ! function_exists( 'wpTheme_choices_sidebar' ) )
{
     function wpTheme_choices_sidebar(  )
     {
          $sidebar = array(
               'left' => __( 'Left Sidebar', 'wpTheme' ),
               'right' => __( 'Right Sidebar', 'wpTheme' )
          );
          return $sidebar;
     }
}

?>
