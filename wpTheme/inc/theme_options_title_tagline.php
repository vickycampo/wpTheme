<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	===================================
		THEME OPTIONS - TITLE TAG LINE
	===================================
*
* The title tag line custominzation functions
*/
?>
<?php
/*
	========================================
		WPTHEME SITE TITLE CUSTOMIZATION
	========================================
*
* Function that will customize the site title
*/
if ( ! function_exists( 'wpTheme_site_title_customization' ) )
{
     function wpTheme_site_title_customization( $wp_customize )
     {
          /* We get the defaults */
          $defaults = wpTheme_get_theme_defaults();
          /* Add the settings */
          $id = 'wpTheme_options[site-title]';
          $args = array (
               'default' => $defaults['site-title'],
               'capability' => 'edit_theme_options',
               'transport' => 'refresh',
               'type' => 'option',
               'sanitize_callback' => 'wpTheme_validate_true_false' );
          $wp_customize->add_setting( $id , $args );
          /* Add the control */
          $id = 'wpTheme_options[site-title]';
          $args = array(
			'label' => __( 'Show site title?', 'wpTheme' ),
			'section' => 'title_tagline',
			'settings' => 'wpTheme_options[site-title]',
			'type' => 'select',
			'choices' => wpTheme_true_false(),
			'sanitize_callback' => 'wpTheme_validate_true_false' );
          $wp_customize->add_control( $id , $args );
     }
     add_action('customize_register','wpTheme_site_title_customization');
}
?>
