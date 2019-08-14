<?php
/*
     ===============================
          BREADCRUMBS
     ===============================
* Create a special BREADCRUMBS function for the child theme
*/
namespace wptchild\Core;

/**
 * Settings API Callbacks Class
 */
class BreadCrumbs
{
	public function register()
     {
          $options = get_option( 'wpTheme_options' );
          if ( isset( $options['breadcrumbs'] )  && ( true == $options['breadcrumbs'] ) )
          {
               add_action( 'wptheme\Custom\Hooks::tha_content_top', array ( $this , 'wpTheme_breadcrumbs') );
          }
     }
     public function wpTheme_breadcrumbs()
     {
          echo ('breadcrumbs - Functions line 167');
     }
}
?>
