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


/**
 *
 */
class MTK_RECIPEplugin
{
     function __construct(  )
     {

     }
     /* Plugin Actions */
     // activation
     function activate ()
     {
          // Generate a Custom Post Type (CPT)
          $this->custom_post_type ();
          // Flush rewrite rules
          flush_rewrite_rules();
     }
     //create a function that will be trigered on a specific time
     function register ()
     {
          add_action ( 'init' , array( $this , 'custom_post_type' ) );
          add_action( 'admin_enqueue_scripts' , array( $this , 'enqueue' ) );
     }
     // deactivation
     function deactivation ()
     {
          // Flush rewrite rules
     }
     //Creates the CPT for the recipe
     function custom_post_type ()
     {
          $CPT_name = 'recipe';
          $CPT_settings['public'] = true;
          $CPT_settings['label'] = 'Recipes';
          register_post_type ( $CPT_name , $CPT_settings );
     }
     //Enqueue function
     function enqueue()
     {
          wp_enqueue_style ( 'mypluginstyle' , plugins_url( '/assets/mystyle.css' , __FILE__ )  , array ('') , false , 'all' );
          wp_enqueue_style ( 'mypluginscript' , plugins_url( '/assets/myscript.js' , __FILE__ )  , array ('') , false , 'all' );
     }
}
/* We create an instance of the class */
/* We first check if the class exists */
if ( class_exists( 'MTK_RECIPEplugin' ) )
{
     $mtkRecipePlugin = new MTK_RECIPEplugin();
     $mtkRecipePlugin -> register();
}


/* Plugin Actions */
/* We call this actions with hooks */
// activation
register_activation_hook ( __FILE__ , array( $mtkRecipePlugin , 'activate' ) );
// deactivation
register_deactivation_hook ( __FILE__ , array( $mtkRecipePlugin , 'deactivation' ) );
