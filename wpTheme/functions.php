<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

===================================
FUNCTIONS
===================================
* This page is always used as the site front page if it exists,
* regardless of what settings on Admin > Settings > Reading..
*
*/
?>
<?php
/*
=====================
wpTheme_setup
=====================
*/

/*
=====================
CUSTOM HEADER
=====================
*/
if ( ! function_exists( 'wpTheme_custom_header_setup' ) )
{
     function wpTheme_custom_header_setup()
     {
          $args = array(
               // Default Header Image to display
               'default-image'         => get_template_directory_uri() . '/assets/images/headers/default.jpg',
               // Display the header text along with the image
               'header-text'           => false,
               // Header text color default
               'default-text-color'        => '000',
               // Header image width (in pixels)
               'width'             => 1000,
               // Header image height (in pixels)
               'height'            => 198,
               // Flexible Header Image
               'flex-width'         => true,
               'flex-height'        => true,
               // Header image random rotation default
               'random-default'        => true,
               // Enable upload of image file in admin
               'uploads'       => true,
               // function to be called in theme head section
               'wp-head-callback'      => 'wphead_cb',
               //  function to be called in preview page head section
               'admin-head-callback'       => 'adminhead_cb',
               // function to produce preview markup in the admin screen
               'admin-preview-callback'    => 'adminpreview_cb'
          );

          add_theme_support( 'custom-header', $args );

          /*
          * Set a default header image with the images stored in the headers folder
          * We only add the images if we random show images
          */

          if ($args['random-default'] == true)
          {
               //We look for all the images in the folder
               $files = scandir ( get_parent_theme_file_path() . '/assets/images/headers');

               foreach ($files as $i => $file_name)
               {
                    //we don't consider the arguments that are not real files
                    if ( ( $file_name != '.' ) && ( $file_name != '..' ) && ( ! strpos ( $file_name , '_thumbnail' ) ) )
                    {
                         //we remove the extension
                         if (strpos ( $file_name , '.jpg' ) )
                         {
                              $file_short_name = str_replace( ".jpg" , "" , $file_name );
                         }
                         else if (strpos ( $file_name , '.png' ) )
                         {
                              $file_short_name = str_replace( ".png" , "" , $file_name );
                         }
                         else if (strpos ( $file_name , '.gif' ) )
                         {
                              $file_short_name = str_replace( ".gif" , "" , $file_name );
                         }
                         //we have a clean name of the file without the extension
                         //we generate the array we will need to send the images.

                         $header_images[$file_short_name]['url'] = get_template_directory_uri() . get_template_directory_uri() . '/assets/images/headers/' . $file_name;
                         $header_images[$file_short_name]['thumbnail_url'] = get_template_directory_uri() . '/assets/images/headers/' . $file_short_name . '_thumbnail.jpg';
                         $header_images[$file_short_name]['description'] = $file_short_name;

                    }
               }

               // echo ('<pre>');
               // print_r ($args);
               // print_r ($header_images);
               // echo ('</pre>');
          }
     }
     add_action( 'after_setup_theme', 'wpTheme_custom_header_setup' );
     if ( isset ( $header_images ) )
     {
          register_default_headers( $header_images );
     }

}
/*
* Fallback function for the custom headers
*/
if ( ! ( function_exists ( 'wphead_cb' ) ) )
{
     function wphead_cb()
     {
          //echo ('wphead_cb on file ' . __FILE__ . ' and line number: ' . __LINE__ . '<br>');
     }
}
/*
* Find out what this function does
*/
if ( ! ( function_exists ( 'adminpreview_cb' ) ) )
{
     function adminpreview_cb()
     {
          echo ('wphead_cb on file ' . __FILE__ . ' and line number: ' . __LINE__ . '<br>');
     }
}
/*
=====================
CUSTOM LOGO
=====================
*/
if ( ! ( function_exists ( 'wpTheme_custom_logo_setup' ) ) )
{
     function wpTheme_custom_logo_setup() {
          $defaults = array(
               'height'      => 100,
               'width'       => 400,
               'flex-height' => true,
               'flex-width'  => true,
               'header-text' => array( 'site-title', 'site-description' ),
          );
          add_theme_support( 'custom-logo', $defaults );
     }
     add_action( 'after_setup_theme', 'wpTheme_custom_logo_setup' );
}

/*
=====================
POST FORMAT
=====================
*/
if ( ! ( function_exists ( 'wpTheme_post_formats_setup' ) ) )
{
     function wpTheme_post_formats_setup()
     {
          $args = array
          (
               'aside',
               'gallery',
               'link',
               'image',
               'quote',
               'status',
               'video',
               'audio',
               'chat'
          );
          add_theme_support( 'post-formats', $args );
     }
     add_action( 'after_setup_theme', 'wpTheme_post_formats_setup' );
}
/*
=====================
POST SUPPORT
=====================
*/
if ( ! ( function_exists ( 'wpTheme_custom_post_formats_setup' ) ) )
{
     function wpTheme_custom_post_formats_setup()
     {
          // add post-formats to post_type 'page'
          add_post_type_support( 'page', 'post-formats' );
          add_post_type_support( 'page', 'excerpt' );

          // add post-formats to post_type 'my_custom_post_type'
          add_post_type_support( 'book', 'post-formats' );
     }
     add_action( 'init', 'wpTheme_custom_post_formats_setup' );
}
/*
=====================
REGISTER POST TYPE
=====================
*/
if ( ! ( function_exists ( 'wpTheme_register_custom_post_type' ) ) )
{
     function wpTheme_register_custom_post_type ()
     {
          $post_type = ''; //string, only lowercase
          $labels = array(
               'name'                  => _x( 'Books', 'Post type general name', 'textdomain' ),
               'singular_name'         => _x( 'Book', 'Post type singular name', 'textdomain' ),
               'menu_name'             => _x( 'Books', 'Admin Menu text', 'textdomain' ),
               'name_admin_bar'        => _x( 'Book', 'Add New on Toolbar', 'textdomain' ),
               'add_new'               => __( 'Add New', 'textdomain' ),
               'add_new_item'          => __( 'Add New Book', 'textdomain' ),
               'new_item'              => __( 'New Book', 'textdomain' ),
               'edit_item'             => __( 'Edit Book', 'textdomain' ),
               'view_item'             => __( 'View Book', 'textdomain' ),
               'all_items'             => __( 'All Books', 'textdomain' ),
               'search_items'          => __( 'Search Books', 'textdomain' ),
               'parent_item_colon'     => __( 'Parent Books:', 'textdomain' ),
               'not_found'             => __( 'No books found.', 'textdomain' ),
               'not_found_in_trash'    => __( 'No books found in Trash.', 'textdomain' ),
               'featured_image'        => _x( 'Book Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
               'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
               'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
               'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
               'archives'              => _x( 'Book archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
               'insert_into_item'      => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
               'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
               'filter_items_list'     => _x( 'Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
               'items_list_navigation' => _x( 'Books list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
               'items_list'            => _x( 'Books list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
          );
          $args = array(
               'labels'             => $labels,
               'public'             => true,
               'publicly_queryable' => true,
               'show_ui'            => true,
               'show_in_menu'       => true,
               'query_var'          => true,
               'rewrite'            => array( 'slug' => 'book' ),
               'capability_type'    => 'post',
               'has_archive'        => true,
               'hierarchical'       => false,
               'menu_position'      => null,
               'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
          );
          register_post_type( 'book', $args );
     }
     add_action( 'init', 'wpTheme_register_custom_post_type' );
}

/*
=====================
REGISTER WIDGET
=====================
*/
if ( ! function_exists( 'wpTheme_register_widget' ) )
{
     function wpTheme_register_widget()
     {
          register_widget( 'my_widget' );
     }
     add_action( 'widgets_init', 'wpTheme_register_widget' );
     //if we are going to use the widget we load the file of the widget class
     require_once get_parent_theme_file_path( '/inc/class.my-widget.php' );
}

/*
==============================
ENABLE FEATURED IMAGE
==============================
*
* Enable support for post thumbnails and featured images.
*/
if ( ! function_exists( 'wpTheme_enable_featured_image' ) )
{
     function wpTheme_enable_featured_image()
     {
          add_theme_support( 'post-thumbnails' );
          //set a size in pixels
          set_post_thumbnail_size ( 150 , 150 );
     }
     add_action( 'after_setup_theme', 'wpTheme_enable_featured_image' );
}


/**
* Sets up theme defaults and registers support for various WordPress features.
*
* Note that this function is hooked into the after_setup_theme hook, which runs
* before the init hook. The init hook is too late for some features, such as indicating
* support post thumbnails.
*/
if ( ! function_exists( 'wpTheme_setup' ) )
{
     function wpTheme_setup()
     {
          //First, let's set the maximum content width based on the theme's design and stylesheet. This will limit the width of all uploaded images and embeds.
          if ( ! isset( $content_width ) )
          {
               $content_width = 800; /* pixels */
          }
          //Add default posts RSS feed links to <head>.
          add_theme_support( 'automatic-feed-links' );
          //Make theme available for translation. Translations can be placed in the /languages/ directory.
          load_theme_textdomain( 'wpTheme', get_template_directory() . '/languages' );
          //Custom Background
          add_theme_support ( 'custom-background', array () );


     }
}
add_action( 'after_setup_theme', 'wpTheme_setup' );
/*
==============================
REMOVE VERSION INFORMATION
==============================
*
* load the WP THEME CORE FUNCTIONS
*/
if ( ! function_exists( 'wpTheme_remove_version_scripts_styles' ) )
{
     // remove version from head
     remove_action('wp_head', 'wp_generator');

     // remove version from rss
     add_filter('the_generator', '__return_empty_string');

     // remove version from scripts and styles
     function wpTheme_remove_version_scripts_styles($src)
     {
          if (strpos($src, 'ver=')) {
               $src = remove_query_arg('ver', $src);
          }
          return $src;
     }
     add_filter('style_loader_src', 'wpTheme_remove_version_scripts_styles', 9999);
     add_filter('script_loader_src', 'wpTheme_remove_version_scripts_styles', 9999);

}
/*
==============================
WP Bootstrap Navwalker
==============================
*
* include bootstrap nav walker class
*/

require_once( get_template_directory() . '/inc/bs4navwalker.php' );

/*
==============================
CLASS MY WIDGET
==============================
*
* include the custom widgets
*/
require_once( get_template_directory() . '/inc/class.my-widget.php' );
/*
==============================
ENQUEUE.PHP
==============================
*
* load the enqueue file
*/
require_once get_parent_theme_file_path( '/inc/enqueue.php' );
/*
==============================
THE HOOK ALLIANCE
==============================
*
* include theme hook alliance hooks
*/
require_once( get_template_directory() . '/inc/hooks.php' );
/*
==============================
REGISTGER NAVBARS
==============================
*
* where we register all the navitagion bars
*/
require_once( get_template_directory() . '/inc/register_navbars.php' );
/*
==============================
REGISTGER SIDEBARS
==============================
*
* where we register all the sidebars
*/
require_once( get_template_directory() . '/inc/register_sidebars.php' );
/*
==============================
THEME_OPTIONS.PHP
==============================
*
* load the enqueue file
*/
require_once get_parent_theme_file_path( '/inc/theme_options.php' );
/*
==============================
WP THEME CORE FUNCTIONS
==============================
*
* load the WP THEME CORE FUNCTIONS
*/
require_once get_parent_theme_file_path( '/inc/wpTheme_core_functions.php' );
?>
