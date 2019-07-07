<?php

namespace wptchild\Setup;

/**
* Menus
*/
class Menus
{
     /**
     * register default hooks and actions for WordPress
     * @return
     */
     public $menu_location = [];
     public function register()
     {
          $this -> setMenuLoctaion ();
          add_action( 'after_setup_theme', array( $this, 'menus' ) );
     }
     public function setMenuLoctaion ()
     {
          $this->menu_location[] = array(
         	'top' => esc_html__( 'Top Header Navigation', 'wpTheme' )
          );
     }
     public function menus()
     {
          /*
          Register all your menus here
          */
          foreach ( $this->menu_location as $i => $menu )
          {
               register_nav_menus($menu);
          }

     }
}
