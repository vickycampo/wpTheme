<?php

namespace wptchild\Setup;

class Setup
{
    /**
     * register default hooks and actions for WordPress
     * @return
     */
    public function register()
    {
        add_action( 'after_setup_theme', array( $this, 'setup' ) );
        add_action( 'after_setup_theme', array( $this, 'content_width' ), 0);
    }

    public function setup()
    {
        /*
         * You can activate this if you're planning to build a multilingual theme
         */
        // load_theme_textdomain( 'wpTheme', get_template_directory() . '/languages' );

         /*
         * Custom Header
         */
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
              'wp-head-callback'      => array ( $this , 'wphead_cb'),
              //  function to be called in preview page head section
              'admin-head-callback'       => 'adminhead_cb',
              // function to produce preview markup in the admin screen
              'admin-preview-callback'    => 'adminpreview_cb'
         );

         add_theme_support( 'custom-header', $args );
         /*
         * Custom Logo
         */
         $defaults = array(
              'height'      => 100,
              'width'       => 400,
              'flex-height' => true,
              'flex-width'  => true,
              'header-text' => array( 'site-title', 'site-description' ),
         );
         add_theme_support( 'custom-logo', $defaults );
         /*
         * Custom Post Formats
         */
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
         /*
         * Post Thumbnail
         */
         add_theme_support( 'post-thumbnails' );
         set_post_thumbnail_size ( 150 , 150 );

    }
    public function  wphead_cb()
    {
         //echo ('wphead_cb on file ' . __FILE__ . ' and line number: ' . __LINE__ . '<br>');
    }
    /*
        Define a max content width to allow WordPress to properly resize your images
    */
    public function content_width()
    {
        $GLOBALS[ 'content_width' ] = apply_filters( 'content_width', 1440 );
    }
}
