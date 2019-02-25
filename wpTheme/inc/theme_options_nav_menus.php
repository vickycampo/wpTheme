<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	===================================
		THEME OPTIONS - SKINS
	===================================
*
* The multiple skins options
*/
?>
<?php
/*
	========================================
		WPTHEME NAV-MENU CUSTOMIZATION
	========================================
*
* Function that will customize the nav-menu
*/
if ( ! function_exists( 'wpTheme_top_nav_menu_customization' ) )
{
     function wpTheme_top_nav_menu_customization( $wp_customize )
     {
          /* We get the defaults */
          $defaults = wpTheme_get_theme_defaults();
          /* Add the settings */
          /* Background color */
          $id = 'wpTheme_options[nav_menu][top][background_color]';
          $args = array(

			'default' => $defaults['nav_menu']['top']['background_color'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option',
			'sanitize_callback' => 'wpTheme_validate_nav_menu_color'

		);
          $wp_customize->add_setting( $id , $args );
          /* Add the control */
          $args = array(

			'label' => __( 'Top Navigation Menus, ', 'wpTheme' ),
			'section' => 'nav_bar_options',
			'settings' => $id,
			'type' => 'select',
			'choices' => wpTheme_nav_menu_color(),
			'sanitize_callback' => 'wpTheme_validate_nav_menu_color'

		);
          $wp_customize->add_control( $id , $args );
     }
     add_action('customize_register','wpTheme_top_nav_menu_customization');
}
?>
