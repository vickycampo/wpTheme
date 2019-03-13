<?php
/*
     ===============================
          BREADCRUMBS
     ===============================
* Create a special BREADCRUMBS function for the child theme
*/
if ( !function_exists( 'wpTheme_breadcrumbs' ) )
{
     $options = get_option( 'wpTheme_options' );
     function wpTheme_breadcrumbs()
     {
          echo ('breadcrumbs - Functions line 167');
     }
     if ( isset( $options['breadcrumbs'] )  && ( true == $options['breadcrumbs'] ) )
     {
          add_action( 'tha_content_top', 'wpTheme_breadcrumbs' );
     }
}?>
