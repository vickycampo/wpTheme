<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	===================================
		THEME OPTIONS - ADVANCED
	===================================
*
* The advenced custominzation functions
*/
?>
<?php
/*
	========================================
		WPTHEME AUTHOR CUSTOMIZATION
	========================================
*
* Function that will customize the navbar-inverse
*/
if ( ! function_exists( 'wpTheme_author_customization' ) )
{
     function wpTheme_author_customization( $wp_customize )
     {
          /* We get the defaults */
          $defaults = wpTheme_get_theme_defaults();
          /* Add the settings */
          $id = 'wpTheme_options[author]';
          $args = array(

			'default' => $defaults['author'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option',
			'sanitize_callback' => 'wpTheme_validate_true_false'

		);
          $wp_customize->add_setting( $id , $args );
          /* Add the control */
          $args = array(

			'label' => __( 'Use author meta tags?', 'wpTheme' ),
			'section' => 'advanced_options',
			'settings' => $id,
			'type' => 'select',
			'choices' => wpTheme_true_false(),
			'sanitize_callback' => 'wpTheme_validate_true_false'

		);
          $wp_customize->add_control( $id , $args );
     }
     add_action('customize_register','wpTheme_author_customization');
}
?>
<?php
/*
	========================================
		WPTHEME FOOTER CUSTOMIZATION
	========================================
*
* Function that will customize the footer
*/
if ( ! function_exists( 'wpTheme_footer_customization' ) )
{
     function wpTheme_footer_customization( $wp_customize )
     {
          /* We get the defaults */
          $defaults = wpTheme_get_theme_defaults();
          /* Add the settings */
          $id = 'wpTheme_options[footer]';
          $args = array(

			'default' => $defaults['footer'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option',
			'sanitize_callback' => 'wpTheme_kses'

		);
          $wp_customize->add_setting( $id , $args );
          /* Add the control */
          $footer_text = new wpTheme_Textarea_Control( $wp_customize, 'wpTheme_options[footer]', array(

			'label' => __( 'Footer Text', 'wpTheme' ),
			'section' => 'advanced_options',
			'settings' => $id,
			'type' => 'textarea',
			'sanitize_callback' => 'esc_textarea'

		) );
		$wp_customize->add_control( $footer_text );
     }
     add_action('customize_register','wpTheme_footer_customization');
}
?>
<?php
/*
	========================================
		WPTHEME FAVICON CUSTOMIZATION
	========================================
*
* Function that will customize the footer
*/
if ( ! function_exists( 'wpTheme_favicon_customization' ) )
{
     function wpTheme_favicon_customization( $wp_customize )
     {
          /* We get the defaults */
          $defaults = wpTheme_get_theme_defaults();
          /* Add the settings */
          $id = 'wpTheme_options[favicon]';
          $args = array(

			'default' => $defaults['favicon'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option',
			'sanitize_callback' => 'wpTheme_validate_favicon'

		);
          $wp_customize->add_setting( $id , $args );
          /* Add the control */
          $favicon = new WP_Customize_Image_Control( $wp_customize, 'wpTheme_options[favicon]', array(

			'label' => __( 'Custom Favicon', 'wpTheme' ),
			'section' => 'advanced_options',
			'settings' => $id,
			'sanitize_callback' => 'wpTheme_validate_favicon'

		) );
		$wp_customize->add_control( $favicon );
     }
     add_action('customize_register','wpTheme_favicon_customization');
}
?>
<?php
/*
	========================================
		WPTHEME GENERATOR CUSTOMIZATION
	========================================
*
* Function that will customize the generator
*/
if ( ! function_exists( 'wpTheme_generator_customization' ) )
{
     function wpTheme_generator_customization( $wp_customize )
     {
          /* We get the defaults */
          $defaults = wpTheme_get_theme_defaults();
          /* Add the settings */
          $id = 'wpTheme_options[generator]';
          $args = array(

			'default' => $defaults['generator'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option',
			'sanitize_callback' => 'wpTheme_validate_true_false'

		);
          $wp_customize->add_setting( $id , $args );
          /* Add the control */
          $args = array(

			'label' => __( 'Debug Mode Active', 'wpTheme' ),
			'section' => 'advanced_options',
			'settings' => $id,
			'type' => 'select',
			'choices' => wpTheme_true_false(),
			'sanitize_callback' => 'wpTheme_validate_true_false'

		);
          $wp_customize->add_control( $id , $args );
     }
     add_action('customize_register','wpTheme_generator_customization');
}
?>
