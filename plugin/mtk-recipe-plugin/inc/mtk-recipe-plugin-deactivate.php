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
     public static fucntion deactivate ()
     {
          flush_rewrite_rules();
     }
}
