<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

     ===================================
          REGISTER SIDEBARS
     ===================================
* This page is where we have different functions to register different sidebars
* Grouped by the section where they are going to be displayed.
*
*/
?><?php
/*
     =====================
          GENERIC SIDEBARS
     =====================
*/
if ( ! function_exists( 'wpTheme_generic_sidebars' ) )
{
     function wpTheme_generic_sidebars()
     {
          $id = 'body-left-sidebar';
          $footer_sidebar[$id]['name'] = 'Body - Left sidebar';
          $footer_sidebar[$id]['description'] = 'Body - Left sidebar';

          $id = 'body-right-sidebar';
          $footer_sidebar[$id]['name'] = 'Body - Right sidebar';
          $footer_sidebar[$id]['description'] = 'Body - Right sidebar';

          //CREATE THE SIDEBAR FOR EACH SECTION
          foreach ($footer_sidebar as $id => $details)
          {
               $name = $details['name'];
               $description = $details['description'];
               $args = array
               (
                    'name'          => __( $name, 'wpTheme' ),
                    'id'            => $id,
                    'description'   => $description,
                    'class'         => $name . '_class',
                    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>'
               );
               register_sidebar( $args );
          }

     }
     add_action( 'widgets_init', 'wpTheme_generic_sidebars' );
}
/*
     =====================
          FOOTER SIDEBARS
     =====================
*/
if ( ! function_exists ( 'wpTheme_footer_sidebars' ) )
{
     function wpTheme_footer_sidebars ()
     {
          //ARRAY OF ALL POSSIBLE COMBINATIONS OF SIDEBARD FOR THE FOOTER
          $id = 'footer-left-box';
          $footer_sidebar[$id]['name'] = 'Footer - Left side box';
          $footer_sidebar[$id]['description'] = 'Footer - Left side box';
          $id = 'footer-middle-box';
          $footer_sidebar[$id]['name'] = 'Footer - Center box';
          $footer_sidebar[$id]['description'] = 'Footer - Center box';
          $id = 'footer-right-box';
          $footer_sidebar[$id]['name'] = 'Footer - Right side box';
          $footer_sidebar[$id]['description'] = 'Footer - Right side box';

          //CREATE THE SIDEBAR FOR EACH SECTION
          foreach ($footer_sidebar as $id => $details)
          {
               $name = $details['name'];
               $description = $details['description'];
               $args = array
               (
                    'name'          => __( $name, 'wpTheme' ),
                    'id'            => $id,
                    'description'   => $description,
                    'class'         => $name . '_class',
                    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h1 class="widget-title">',
                    'after_title'   => '</h1>'
               );
               register_sidebar( $args );
          }
     }
     add_action( 'widgets_init', 'wpTheme_footer_sidebars' );
}
?>
