<?php
/*

@package mkt-recipe-plugin

     ===================================
          ADMIN.PHP
     ===================================
*
*
*/
namespace Inc\Pages;
/**
*
*/
class Admin
{

	function __construct()
	{}
	public function register ()
	{
		//Creates de admin page
          add_action ( 'admin_menu' ,array( $this , 'add_admin_pages') );
	}

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
     public function admin_index ()
     {
          require_once (PLUGIN_PATH . 'templates/admin.php');
     }
}
