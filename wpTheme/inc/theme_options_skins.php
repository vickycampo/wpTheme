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
if ( ! function_exists( 'wpTheme_skins_customization' ) )
{
     function wpTheme_skins_customization( $wp_customize )
     {
          /* We get the defaults */
          $defaults = wpTheme_get_theme_defaults();
          /* Add the settings */
          $id = 'wpTheme_options[skins]';
          $args = array(

			'default' => $defaults['skins'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option',
			'sanitize_callback' => 'wpTheme_validate_skins'

		);
          $wp_customize->add_setting( $id , $args );
          /* Add the control */
          $args = array(

			'label' => __( 'Choose a skin?', 'wpTheme' ),
			'section' => 'skins_options',
			'settings' => $id,
			'type' => 'select',
			'choices' => wpTheme_skins(),
			'sanitize_callback' => 'wpTheme_validate_skins'

		);
          $wp_customize->add_control( $id , $args );
     }
     add_action('customize_register','wpTheme_skins_customization');
}
?>
