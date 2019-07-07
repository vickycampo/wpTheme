<?php

namespace wptheme\Core;

/**
 * Sidebar.
 */
class Functions
{
     public $defaultsValues;

     public function register()
     {
        //add_action( 'widgets_init', array( $this, 'widgets_init' ) );
     }
     public static function get_theme_defaults()
     {
     /* create the values for the navigation menus */
          $menu_opt = array
          (
               'show_hide_brand' => 1,
               'background_color' => '',
               'inverse' => 0,
               'margin' => '',
               'custom_logo' => ''
          );
          $nav_menus = array
          (
               'top' => $menu_opt,
               'main' => $menu_opt,
               'footer' => $menu_opt
          );
          /* Set the options for the big image of the header */
          $big_header_image = array
          (
               /* Use the header image as a background */
               'as_background' => 0,
               'show_site_logo' => 0,
               'site_name' => 0,
               'site_description' => 0,
               'percentage' => '100'
          );
          // default options settings
          $defaults = array
          (
               // sidebar
               'sidebar' => 'left',
               // theme tracking
               'presstrends' => 0,
               // typography options
               'heading' => 'notoserif',
               'body' => 'opensans',
               'alt' => 'lato',
               // link color
               'link' => '#428bca',
               'hover' => '#2a6496',
               // content area colors
               'content-color' => '#fff',
               'font-color' => '#111',
               // excerpts or full posts
               'excerpts' => 1,
               // use alt for h1?
               'alth1' => 0,
               // footer text
               'footer' => sprintf( _x( '%1$s %2$s %3$s', '1: copyright, 2: year, 3: blog title', 'wpTheme' ), '&copy;',  date('Y'), get_bloginfo('title') ) . ' . ' . sprintf( __( 'Museum Core is proudly powered by %1$sWordPress%2$s.', 'wpTheme' ), '<a href="http://wordpress.org" target="_blank">', '</a>' ),
               // advanced settings
               'author' => 0,
               'generator' => 0,
               'archive-excerpt' => 1,
               'hovercards' => 1,
               'favicon' => '',
               'site-title' => 1,
               'post-author' => 1,
               'font_subset' => 'latin',
               'nav-menu' => 0,
               'navbar-inverse' => 0,
               'navbar-color' => '',
               'navbar-link' => '',
               'breadcrumbs' => 0,
               'skins' => '',
               'bs-screen-size' => '-',
               'nav_menu_css' => $nav_menus,
               'big-header-image' => $big_header_image,
          );

          return $defaults;
     }
     /*
     	==================================
     	    WPTHEME_GET_CONTENT_COLUMNS
     	==================================
     *
     * Which sidebards are active and returnd the columns for the body part
     * Return the content class
     */
     public static function get_content_columns ($location)
     {
          //The first specific theme helper, load the theme options and defaults
          $defaults = self::get_theme_defaults();
          //Fetch options from the database table
          $options = get_option ('wpTheme_options');

          $columns = 12;
          foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar )
          {
               if (strpos ( $sidebar['id'] , $location ) > -1)
               {
                    if ( is_active_sidebar( $sidebar['id'] ) )
                    {
                         $columns = $columns -3;
                    }
               }
          }
          /* We determine which screen size we are using*/
          if ( isset ( $options['bs-screen-size'] ) )
          {
               return ('col'. $options['bs-screen-size'] . $columns);
          }
          else
          {
               return ('col'. $defaults['bs-screen-size'] . $columns);
          }

     }
}
