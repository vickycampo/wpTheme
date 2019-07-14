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

if ( file_exists( get_theme_file_path('/vendor/autoload.php') ) )
{
    require_once (get_theme_file_path('/vendor/autoload.php'));
}

/*
     ==============================
          INIT
     ==============================
*
* include theme hook alliance hooks
*/
// echo ('<pre>');
// var_dump ( class_exists( 'wptchild\\Init' ) );
// echo ('</pre>');
if ( class_exists( 'wptchild\\Init' ) ):
	wptchild\Init::register_services();
endif;
?>
