<?php
/*

@package mkt-recipe-plugin

     ===================================
          ADMIN.PHP
     ===================================
*
*
*/
namespace Inc\Base;

/**
 * Enqueue
 */
class Enqueue
{
     public function register()
     {
          //Enqueues the style and script files
          add_action( 'admin_enqueue_scripts' , array( $this , 'enqueue' ) );
     }
     //Enqueue function
     function enqueue()
     {
          wp_enqueue_style( 'mypluginstyle', PLUGIN_URL . 'assets/mystyle.css' );
		wp_enqueue_script( 'mypluginscript', PLUGIN_URL . 'assets/myscript.js' );
     }
}
