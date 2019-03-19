<?php
/*

@package mkt-recipe-plugin

     ===================================
          ACTIVATE.PHP
     ===================================
*
*
*/
namespace Inc\Base;
class Activate
{
	public static function activate() {
		flush_rewrite_rules();
	}
}
