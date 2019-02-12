<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	===================================
		THEME OPTIONS
	===================================
*
* All the theme custominzations
*/
?>

<?php
/*
	===================================
		WPTHEME OPTIONS INIT
	===================================
*
* Register the settings
*/
if (!function_exists('wpTheme_options_init'))
{
     function wpTheme_options_init()
     {
          $option_group = 'WPTHEME_OPTIONS';
          $option_name = 'wpTheme_options';
          register_setting( $option_group , $option_name );
     }
     add_action ( 'admin_init', 'wpTheme_options_init' );
}
?>
<?php
/*
	===================================
		WPTHEME ADD SECTIONS
	===================================
*
* Register the settings
*/
if ( ! function_exists( 'wpTheme_add_sections' ) )
{
     function wpTheme_add_sections( $wp_customize )
     {
          /* LAYOUT SECTION - Add options for the layout of the theme */
          $id = 'layout_options';
          $args = array
          (
              'title'      => __('Layout Options','wpTheme'),
              'priority'   => 35
          );
          $wp_customize -> add_section( $id , $args );

          /* TYPOGRAPHY SECTION - Add options for the fonts of the theme */
          $id = 'typography_options';
          $args = array
          (
              'title'      => __('Typography Options','wpTheme'),
              'priority'   => 36
          );
          $wp_customize -> add_section( $id , $args );

          /* ADVANCED SECTION - Add advanced options */
          $id = 'advanced_options';
          $args = array
          (
              'title'      => __('Advanced Options','wpTheme'),
              'priority'   => 36
          );
          $wp_customize -> add_section( $id , $args );
     }
     add_action( 'customize_register', 'wpTheme_add_sections' );
}
?>
<?php
/*
     ==============================
          FUNCTION FILES
     ==============================
*
* load the files with the customization functions
*/

/* Title Tag Line */
require_once get_parent_theme_file_path( '/inc/theme_options_title_tagline.php' );
/* Layout */
require_once get_parent_theme_file_path( '/inc/theme_options_layout.php' );
/* Typography */
require_once get_parent_theme_file_path( '/inc/theme_options_typography.php' );
/* Colors */
require_once get_parent_theme_file_path( '/inc/theme_options_colors.php' );
/* Advanced */
require_once get_parent_theme_file_path( '/inc/theme_options_advanced.php' );
?>
