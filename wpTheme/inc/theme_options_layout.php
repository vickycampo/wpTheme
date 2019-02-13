<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	===================================
		THEME OPTIONS - LAYOUT
	===================================
*
* The layout custominzation functions
*/
?>
<?php
/*
	========================================
		WPTHEME SIDEBAR CUSTOMIZATION
	========================================
*
* Function that will customize the sidebar
*/
if ( ! function_exists( 'wpTheme_sidebar_customization' ) )
{
     function wpTheme_sidebar_customization( $wp_customize )
     {
          /* We get the defaults */
          $defaults = wpTheme_get_theme_defaults();
          /* Add the settings */
          $id = 'wpTheme_options[sidebar]';
          $args = array(

			'default' => $defaults['sidebar'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option',
			'sanitize_callback' => 'wpTheme_validate_sidebar'

		);
          $wp_customize->add_setting( $id , $args );
          /* Add the control */
          $args = array(

			'label' => __( 'Sidebar', 'wpTheme' ),
			'section' => 'layout_options',
			'settings' => $id,
			'type' => 'select',
			'choices' => wpTheme_choices_sidebar(),
			'sanitize_callback' => 'wpTheme_validate_sidebar'

		);
          $wp_customize->add_control( $id , $args );
     }
     add_action('customize_register','wpTheme_sidebar_customization');
}
?>
<?php
/*
	========================================
		WPTHEME NAV-MENU CUSTOMIZATION
	========================================
*
* Function that will customize the nav-menu
*/
if ( ! function_exists( 'wpTheme_nav_menu_customization' ) )
{
     function wpTheme_nav_menu_customization( $wp_customize )
     {
          /* We get the defaults */
          $defaults = wpTheme_get_theme_defaults();
          /* Add the settings */
          $id = 'wpTheme_options[nav-menu]';
          $args = array(

			'default' => $defaults['nav-menu'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option',
			'sanitize_callback' => 'wpTheme_validate_true_false'

		);
          $wp_customize->add_setting( $id , $args );
          /* Add the control */
          $args = array(

			'label' => __( 'Fixed nav menu?', 'wpTheme' ),
			'section' => 'layout_options',
			'settings' => 'wpTheme_options[nav-menu]',
			'type' => 'select',
			'choices' => wpTheme_true_false(),
			'sanitize_callback' => 'wpTheme_validate_true_false'

		);
          $wp_customize->add_control( $id , $args );
     }
     add_action('customize_register','wpTheme_nav_menu_customization');
}
?>
<?php
/*
	========================================
		WPTHEME BREADCRUMBS CUSTOMIZATION
	========================================
*
* Function that will customize the breadcrumbs
*/
if ( ! function_exists( 'wpTheme_breadcrumbs_customization' ) )
{
     function wpTheme_breadcrumbs_customization( $wp_customize )
     {
          /* We get the defaults */
          $defaults = wpTheme_get_theme_defaults();
          /* Add the settings */
          $id = 'wpTheme_options[breadcrumbs]';
          $args = array(

			'default' => $defaults['breadcrumbs'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option',
			'sanitize_callback' => 'wpTheme_validate_true_false'

		);
          $wp_customize->add_setting( $id , $args );
          /* Add the control */
          $args = array(

			'label' => __( 'Enable breadcrumbs?', 'wpTheme' ),
			'section' => 'layout_options',
			'settings' => 'wpTheme_options[breadcrumbs]',
			'type' => 'select',
			'choices' => wpTheme_true_false(),
			'sanitize_callback' => 'wpTheme_validate_true_false'

		);
          $wp_customize->add_control( $id , $args );
     }
     add_action('customize_register','wpTheme_breadcrumbs_customization');
}
?>
<?php
/*
	========================================
		WPTHEME EXCERPTS CUSTOMIZATION
	========================================
*
* Function that will customize the excerpts
*/
if ( ! function_exists( 'wpTheme_excerpts_customization' ) )
{
     function wpTheme_excerpts_customization( $wp_customize )
     {
          /* We get the defaults */
          $defaults = wpTheme_get_theme_defaults();
          /* Add the settings */
          $id = 'wpTheme_options[excerpts]';
          $args = array(

			'default' => $defaults['excerpts'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option',
			'sanitize_callback' => 'wpTheme_validate_excerpts'

		);
          $wp_customize->add_setting( $id , $args );
          /* Add the control */
          $args = array(

			'label' => __( 'Full posts or excerpts on blog home?', 'wpTheme' ),
			'section' => 'layout_options',
			'settings' => 'wpTheme_options[excerpts]',
			'type' => 'select',
			'choices' => ap_core_show_excerpts(),
			'sanitize_callback' => 'wpTheme_validate_excerpts'

		);
          $wp_customize->add_control( $id , $args );
     }
     add_action('customize_register','wpTheme_excerpts_customization');
}
?>
<?php
/*
	==============================================
		WPTHEME ARCHIVE-EXCERPTS CUSTOMIZATION
	==============================================
*
* Function that will customize the archive-excerpt
*/
if ( ! function_exists( 'wpTheme_archive_excerpt_customization' ) )
{
     function wpTheme_archive_excerpt_customization( $wp_customize )
     {
          /* We get the defaults */
          $defaults = wpTheme_get_theme_defaults();
          /* Add the settings */
          $id = 'wpTheme_options[archive-excerpt]';
          $args = array(

			'default' => $defaults['archive-excerpt'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option',
			'sanitize_callback' => 'wpTheme_validate_excerpts'

		);
          $wp_customize->add_setting( $id , $args );
          /* Add the control */
          $args = array(

			'label' => __( 'Full posts or excerpts on archive pages?', 'wpTheme' ),
			'section' => 'layout_options',
			'settings' => 'wpTheme_options[archive-excerpt]',
			'type' => 'select',
			'choices' => ap_core_show_excerpts(),
			'sanitize_callback' => 'wpTheme_validate_excerpts'

		);
          $wp_customize->add_control( $id , $args );
     }
     add_action('customize_register','wpTheme_archive_excerpt_customization');
}
?>
<?php
/*
	========================================
		WPTHEME POST-AUTHOR CUSTOMIZATION
	========================================
*
* Function that will customize the post-author
*/
if ( ! function_exists( 'wpTheme_post_author_customization' ) )
{
     function wpTheme_post_author_customization( $wp_customize )
     {
          /* We get the defaults */
          $defaults = wpTheme_get_theme_defaults();
          /* Add the settings */
          $id = 'wpTheme_options[post-author]';
          $args = array(

			'default' => $defaults['post-author'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option',
			'sanitize_callback' => 'wpTheme_validate_true_false'

		);
          $wp_customize->add_setting( $id , $args );
          /* Add the control */
          $args = array(

			'label' => __( 'Display post author?', 'wpTheme' ),
			'section' => 'layout_options',
			'settings' => 'wpTheme_options[post-author]',
			'type' => 'select',
			'choices' => wpTheme_true_false(),
			'sanitize_callback' => 'wpTheme_validate_true_false'

		);
          $wp_customize->add_control( $id , $args );
     }
     add_action('customize_register','wpTheme_post_author_customization');
}
?>
