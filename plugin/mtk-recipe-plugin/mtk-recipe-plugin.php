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
     /* Public */
     // can be accessed everywhere
     /* Protected */
     // can be accessed only within the class itself or extensions of that class
     /* Private */
     // can be accessed only within the class itself
     /* Static */
     // use a method without initializing the class

     /*** Create variables ***/
          public $plugin;

     /*** Basic functions ***/
          function __construct(  )
          {
               //Store the name of the plugin in the variable that is public
               $this->plugin = plugin_basename ( __FILE__ );
          }
          // Plugin Activation
          function activate()
          {
     		require_once plugin_dir_path( __FILE__ ) . 'inc/mtk-recipe-plugin-activate.php';
     		MTK_RECIPEplugin_activate::activate();
     	}
          // Plugin Deactivation
          function deactivate()
          {
     		require_once plugin_dir_path( __FILE__ ) . 'inc/mtk-recipe-plugin-deactivate.php';
     		MTK_RECIPEplugin_deactivate::deactivate();
     	}
          //create a function that will be trigered on a specific time
          function register ()
          {
               //Creates the custom post type
               add_action ( 'init' , array( $this , 'custom_post_type' ) );
               //Enqueues the style and script files
               add_action( 'admin_enqueue_scripts' , array( $this , 'enqueue' ) );
               //Creates de admin page
               add_action ( 'admin_menu' ,array( $this , 'add_admin_pages') );
               //Creates the custom links in the plugin page
               //Settings
               $tag = "plugin_action_links_$this->plugin";
               $function_to_add = array( $this , 'settings_link' );
               add_filter( $tag, $function_to_add);
          }

          //Enqueue function
          function enqueue()
          {
               wp_enqueue_style ( 'mypluginstyle' , plugins_url( '/assets/mystyle.css' , __FILE__ )  , array ('') , false , 'all' );
               wp_enqueue_style ( 'mypluginscript' , plugins_url( '/assets/myscript.js' , __FILE__ )  , array ('') , false , 'all' );
          }

     /*** Create the administrative area of the plugin ***/
          //Add the admin pages
          public function add_admin_pages ()
          {
               $page_title = 'MTK Recipes Plugin';
               $menu_title = 'MTK Recipes Plugin';
               $capability = 'manage_options';
               $menu_slug = 'mtk_recipes_plugin';
               $function = array ( $this , 'admin_index');
               $icon_url = 'dashicons-carrot';
               $position = 110;

               add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
          }
          //Recieve the links
          public function settings_link ( $links )
          {
               $settings_link = '<a href="admin.php?page=mtk_recipes_plugin">Settings</a>';
               array_push ( $links, $settings_link );
               return ( $links );

          }
          public function admin_index ()
          {
               require_once plugin_dir_path( __FILE__ ) . 'templates/admin.php';
          }
     /*** Create the customs for the plugin ***/
          //Creates the CPT for the recipe
          function custom_post_type ()
          {
               $CPT_name = 'mtk_recipe_cpt_2';
               $CPT_settings['public'] = true;
               $CPT_settings['label'] = 'Recipes Plugin';
               register_post_type ( $CPT_name , $CPT_settings );
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
