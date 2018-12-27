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
	=========================================================================================
		wpTheme_setup
	=========================================================================================
  * Sets up theme defaults and registers support for various WordPress features
  *  It is important to set up these functions before the init hook so that none of these
  *  features are lost.
  =========================================================================================
*/
if ( ! function_exists( 'wpTheme_setup' ) )
{
  function wpTheme_setup()
  {
    //Add default posts and comments RSS feed links to <head>.
    add_theme_support( 'automatic-feed-links' );
    //Add support for custom navigation menus.
    unset ($args);
    $args = array
    (
      'primary'   => __( 'Primary Menu', 'wpTheme' ),
      'secondary' => __( 'Secondary Menu', 'wpTheme' )
    )
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
?>
