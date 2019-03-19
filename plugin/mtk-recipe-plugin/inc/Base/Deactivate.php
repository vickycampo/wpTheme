<?php
/*

@package mkt-recipe-plugin

     ===================================
          DEACTIVATE.PHP
     ===================================
*
*
*/
namespace Inc\Base;
class Deactivate
{
     public static function deactivate ()
     {
          flush_rewrite_rules();
     }
}
