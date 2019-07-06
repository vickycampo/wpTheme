<?php
/**
 *
 * This theme uses PSR-4 and OOP logic instead of procedural coding
 * Every function, hook and action is properly divided and organized inside related folders and files
 * Use the file `inc/Custom/Custom.php` to write your custom functions
 *
 * @package wpTheme
 */

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) :
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
endif;
/*
     ==============================
          THE HOOK ALLIANCE
     ==============================
*
* include theme hook alliance hooks
*/
include_once ( get_parent_theme_file_path() . '/inc/hooks.php' );
/*
     ==============================
          INIT
     ==============================
*
* include theme hook alliance hooks
*/
if ( class_exists( 'wptheme\\Init' ) ) :
	wptheme\Init::register_services();
endif;
