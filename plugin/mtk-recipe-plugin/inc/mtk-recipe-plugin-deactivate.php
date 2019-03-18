<?php
/*

@package mkt-recipe-plugin

     ===================================
          DEACTIVATE.PHP
     ===================================
*
*
*/
class MTK_RECIPEplugin_deactivate
{
     public static function deactivate ()
     {
          flush_rewrite_rules();
     }
}
