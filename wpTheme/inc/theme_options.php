<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	===================================
		THEME OPTIONS
	===================================
*
*
*/
?>
<?php
/* Function that will customize the site title */
if ( ! function_exists( 'wpTheme_title_customization' ) )
{
     function wpTheme_title_customization( $wp_customize )
     {
          /* We get the defaults */
          $defaults = wpTheme_get_theme_defaults();
          /* Add the settings */
          $wp_customize->add_setting( 'wpTheme_options[site-title]', array(

			'default' => $defaults['site-title'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option',
			'sanitize_callback' => 'ap_core_validate_true_false'

		) );
          /* Add the control */
          $wp_customize->add_control( 'wpTheme_options[site-title]', array(

			'label' => __( 'Show site title?', 'wpTheme' ),
			'section' => 'title_tagline',
			'settings' => 'wpTheme_options[site-title]',
			'type' => 'select',
			'choices' => ap_core_true_false(),
			'sanitize_callback' => 'ap_core_validate_true_false'

		) );
     }
     add_action('customize_register','wpTheme_title_customization');
}


?>
