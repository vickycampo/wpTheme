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
    echo ('wphead_cb on file ' . __FILE__ . ' and line number: ' . __LINE__ . '<br>');
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
          $content_width = 800; /* pixels */
    //Add default posts and comments RSS feed links to <head>.
    add_theme_support( 'automatic-feed-links' );
    //Add support for custom navigation menus.
    unset ($args);
    $args = array
    (
      'primary'   => __( 'Primary Menu', 'wpTheme' ),
      'secondary' => __( 'Secondary Menu', 'wpTheme' )
    );
    register_nav_menus($args);

    //Make theme available for translation. Translations can be placed in the /languages/ directory.
    load_theme_textdomain( 'wpTheme', get_template_directory() . '/languages' );
    //Enable support for post thumbnails and featured images.
    add_theme_support( 'post-thumbnails' );

  }
}
add_action( 'after_setup_theme', 'wpTheme_setup' );
/**
 * Sets up theme style sheets and scripts
 *
 * Note that this function is hooked into the wp_enqueue_scripts hook.
 */
 if ( ! function_exists( 'wpTheme_scripts' ) )
 {
   function wpTheme_scripts()
   {
        //we get all the files in the css folder
        $files = scandir ( get_parent_theme_file_path() . '/assets/css');

        //generate an array for all the media types
        $mediaType = array ('all' , 'screen' , 'print' , 'handheld');
        //go through all the files in the css folder
        foreach ($files as $i => $file_name)
        {
             if ( ( $file_name != '.' ) && ($file_name != '..') )
             {
                  //we are going to use the file name as a handle so we need to remove extension
                  $file_short_name = str_replace(".css","",$file_name);
                  $handle = $file_short_name; //is simply the name of the stylesheet.
                  $src = get_template_directory_uri() . '/assets/css/' . $file_name; //is where it is located. The rest of the parameters are optional.
                  $deps = false; //this stylesheet is dependent on another stylesheet.
                  $ver = '1.1'; //sets the version number.

                  //we have to see if the name is a media type
                  if (array_search ( $file_short_name , $mediaType) > -1)
                  {
                       $media = $file_short_name; //‘all’, ‘screen’, ‘print’ or ‘handheld’
                  }
                  else
                  {
                       $media = 'all'; //‘all’, ‘screen’, ‘print’ or ‘handheld’
                  }
                  wp_enqueue_style( $handle , $src , $deps , $ver , $media );

             }
        }
        //we gather all the files in the script folder that we will put in the header
        unset ($files);
        $files = scandir ( get_parent_theme_file_path() . '/assets/js/header');
        foreach ($files as $i => $file_name)
        {
             if ( ( $file_name != '.' ) && ($file_name != '..') )
             {
                  //we are going to use the file name as a handle so we need to remove extension
                  $file_short_name = str_replace(".js","",$file_name);
                  $handle = $file_short_name; //is the name for the script.
                  $src = get_template_directory_uri() . '/assets/js/header' . $file_name; //defines where the script is located.
                  $deps = array ( 'jquery' ); //is an array that can handle any script that your new script depends on, such as jQuery.
                  $ver = '1.1'; //sets the version number.
                  $in_footer = false; //allows you to place your scripts in the footer

                  wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer);

             }
        }
        //we gather all the files in the script folder that we will put in the footer
        unset ($files);
        $files = scandir ( get_parent_theme_file_path() . '/assets/js/footer');
        foreach ($files as $i => $file_name)
        {
             if ( ( $file_name != '.' ) && ($file_name != '..') )
             {
                  //we are going to use the file name as a handle so we need to remove extension
                  $file_short_name = str_replace(".js","",$file_name);
                  $handle = $file_short_name; //is the name for the script.
                  $src = get_template_directory_uri() . '/assets/js/footer' . $file_name; //defines where the script is located.
                  $deps = array ( 'jquery' ); //is an array that can handle any script that your new script depends on, such as jQuery.
                  $ver = '1.1'; //sets the version number.
                  $in_footer = true; //allows you to place your scripts in the footer

                  wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer);
             }
        }
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
        {
  		wp_enqueue_script( 'comment-reply' );
  	 }
   }
   add_action( 'wp_enqueue_scripts', 'wpTheme_scripts' );
 }


?>
