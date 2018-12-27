<?php
/*

@package wpTheme

	===============
		FUNCTIONS
	===============
*/
?>

<?php
/*
	=====================
		wpTheme_setup
	=====================
*/
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
    //Enable support for the following post formats:
    unset ($args);
    $args = array
    (
      'aside',
      'gallery',
      'quote',
      'image',
      'video'
    );
    add_theme_support( 'post-formats', $args );
  }
}
add_action( 'after_setup_theme', 'wpTheme_setup' );
/**
 * Sets up theme style sheets and scripts
 *
 * Note that this function is hooked into the wp_enqueue_scripts hook.
 */
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

?>
