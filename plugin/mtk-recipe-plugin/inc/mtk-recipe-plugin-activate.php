<?php
/*

@package mkt-recipe-plugin

     ===================================
          ACTIVATE.PHP
     ===================================
*
*
*/
class MTK_RECIPEplugin_activate
{
     public static function activate ()
     {
          flush_rewrite_rules();
     }
}
