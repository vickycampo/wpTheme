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
* Add Sections
*/
if ( ! function_exists( 'wpTheme_add_sections' ) )
{
     function wpTheme_add_sections( $wp_customize )
     {
          //Starting priority
          $priority = 35;
          /* LAYOUT SECTION - Add options for the layout of the theme */
          $id = 'layout_options';
          $args = array
          (
              'title'      => __('Layout Options','wpTheme'),
              'priority'   => $priority
          );
          $wp_customize -> add_section( $id , $args );
          //increment priority

          /* TYPOGRAPHY SECTION - Add options for the fonts of the theme */
          $priority ++;
          $id = 'typography_options';
          $args = array
          (
              'title'      => __('Typography Options','wpTheme'),
              'priority'   => $priority
          );
          $wp_customize -> add_section( $id , $args );

          /* ADVANCED SECTION - Add advanced options */
          $priority ++;
          $id = 'advanced_options';
          $args = array
          (
              'title'      => __('Advanced Options','wpTheme'),
              'priority'   => $priority
          );
          $wp_customize -> add_section( $id , $args );

          /* Skins Section */
          $priority ++;
          $id = 'skins_options';
          $args = array
          (
              'title'      => __('Skins Options','wpTheme'),
              'priority'   => $priority
          );
          $wp_customize -> add_section( $id , $args );

          /* Top Navigation Bar */
          $priority ++;
          $id = 'nav_bar_options';
          $args = array
          (
              'title'      => __('Navigation Options','wpTheme'),
              'priority'   => $priority
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
/* Choices File */
require_once get_parent_theme_file_path( '/inc/theme_options_choices.php' );
/* Validations */
require_once get_parent_theme_file_path( '/inc/theme_options_validations.php' );
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
/* Skins */
require_once get_parent_theme_file_path( '/inc/theme_options_skins.php' );
/* Navigation Menus */
require_once get_parent_theme_file_path( '/inc/theme_options_nav_menus.php' );
/* Header */
require_once get_parent_theme_file_path( '/inc/theme_options_header.php' );
?>
