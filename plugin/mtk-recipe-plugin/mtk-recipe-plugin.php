<?php
/**
* @package mkt-recipe-plugin
*/
/*
Plugin Name: My Tiny Kitchen - Recipe Plugin
Plugin URI: www.virginiacampo.com/mtk-recipe-plugin
Description: Plugin to manage the recipes
Version: 1.0.0
Author: Virginia Campo
Author URI: www.virginiacampo.com
License: GPLv2 or later
Text Domain: mtk-recipe-plugin
*/

/*Notes: modify the location of the plugins in the default-constans.php
if ( ! defined( 'WP_PLUGIN_DIR' ) ) {
     define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/themes/wpTheme/plugin' ); // full path, no trailing slash
}
*/

/* Blocks external hacks */
defined( 'ABSPATH' ) or die( 'Hey, you can\t access this file, you silly human!' );

/* Add the autoload file (composer) */
if ( file_exists ( dirname( __FILE__ ) . '/vendor/autoload.php' ) )
{
     require_once ( dirname( __FILE__ ) . '/vendor/autoload.php' );
}
define ( 'PLUGIN_PATH' , plugin_dir_path( __FILE__ ) );
define ( 'PLUGIN_URL' ,  plugin_dir_url( __FILE__));
if ( class_exists ( 'Inc\\Init' ) )
{
     Inc\Init::register_services ();
}
