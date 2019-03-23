<?php
/**
* @package mkt-recipe-plugin
*/

namespace Inc\Base;
/**
 *  BaseController - We establish the global values
**/
class BaseController
{
     public $plugin_path;
     public $plugin_url;
     public $plugin;
     function __construct()
     {
          $this->plugin_path = plugin_dir_path ( dirname ( __FILE__ , 2 ) );
          $this->plugin_url = plugin_dir_path ( dirname ( __FILE__ , 2 ) );
          $this->plugin = plugin_basename ( dirname ( __FILE__ , 3 ) ) . '/mtk-recipe-plugin.php';
     }
}
