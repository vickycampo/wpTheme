<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	===================================
		THEME OPTIONS - TYPOGRAPHY
	===================================
*
* The typography custominzation functions
*/
?>
<?php
/*
	========================================
		WPTHEME HEADING CUSTOMIZATION
	========================================
*
* Function that will customize the sidebar
*/
if ( ! function_exists( 'wpTheme_heading_customization' ) )
{
     function wpTheme_heading_customization( $wp_customize )
     {
          /* We get the defaults */
          $defaults = wpTheme_get_theme_defaults();
          /* Add the settings */
          $id = 'wpTheme_options[heading]';
          $args = array(

			'default' => $defaults['heading'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option',
			'sanitize_callback' => 'wpTheme_validate_fonts'

		);
          $wp_customize->add_setting( $id , $args );
          /* Add the control */
          $args = array(

			'label' => __( 'Heading Font', 'wpTheme' ),
			'section' => 'typography_options',
			'settings' => 'wpTheme_options[heading]',
			'type' => 'select',
			'choices' => wpTheme_fonts(),
			'sanitize_callback' => 'wpTheme_validate_fonts'

		);
          $wp_customize->add_control( $id , $args );
     }
     add_action('customize_register','wpTheme_heading_customization');
}
?>
<?php
/*
	========================================
		WPTHEME BODY CUSTOMIZATION
	========================================
*
* Function that will customize the body
*/
if ( ! function_exists( 'wpTheme_body_customization' ) )
{
     function wpTheme_body_customization( $wp_customize )
     {
          /* We get the defaults */
          $defaults = wpTheme_get_theme_defaults();
          /* Add the settings */
          $id = 'wpTheme_options[body]';
          $args = array(

			'default' => $defaults['body'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option',
			'sanitize_callback' => 'wpTheme_validate_fonts'

		);
          $wp_customize->add_setting( $id , $args );
          /* Add the control */
          $args = array(

			'label' => __( 'Body Font', 'wpTheme' ),
			'section' => 'typography_options',
			'settings' => 'wpTheme_options[body]',
			'type' => 'select',
			'choices' => wpTheme_fonts(),
			'sanitize_callback' => 'wpTheme_validate_fonts'

		);
          $wp_customize->add_control( $id , $args );
     }
     add_action('customize_register','wpTheme_body_customization');
}
?>
<?php
/*
	========================================
		WPTHEME ALT CUSTOMIZATION
	========================================
*
* Function that will customize the alt
*/
if ( ! function_exists( 'wpTheme_alt_customization' ) )
{
     function wpTheme_alt_customization( $wp_customize )
     {
          /* We get the defaults */
          $defaults = wpTheme_get_theme_defaults();
          /* Add the settings */
          $id = 'wpTheme_options[alt]';
          $args = array(

			'default' => $defaults['alt'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option',
			'sanitize_callback' => 'wpTheme_validate_fonts'

		);
          $wp_customize->add_setting( $id , $args );
          /* Add the control */
          $args = array(

			'label' => __( 'Alternate Font', 'wpTheme' ),
			'section' => 'typography_options',
			'settings' => 'wpTheme_options[alt]',
			'type' => 'select',
			'choices' => wpTheme_fonts(),
			'sanitize_callback' => 'wpTheme_validate_fonts'

		);
          $wp_customize->add_control( $id , $args );
     }
     add_action('customize_register','wpTheme_alt_customization');
}
?>
<?php
/*
	========================================
		WPTHEME ALT1 CUSTOMIZATION
	========================================
*
* Function that will customize the alt
*/
if ( ! function_exists( 'wpTheme_alth1_customization' ) )
{
     function wpTheme_alth1_customization( $wp_customize )
     {
          /* We get the defaults */
          $defaults = wpTheme_get_theme_defaults();
          /* Add the settings */
          $id = 'wpTheme_options[alth1]';
          $args = array(

			'default' => $defaults['alth1'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option',
			'sanitize_callback' => 'wpTheme_validate_true_false'

		);
          $wp_customize->add_setting( $id , $args );
          /* Add the control */
          $args = array(

			'label' => __( 'Use alternate font for site title?', 'wpTheme' ),
			'section' => 'typography_options',
			'settings' => 'wpTheme_options[alth1]',
			'type' => 'select',
			'choices' => wpTheme_true_false(),
			'sanitize_callback' => 'wpTheme_validate_true_false'

		);
          $wp_customize->add_control( $id , $args );
     }
     add_action('customize_register','wpTheme_alth1_customization');
}
?>
<?php
/*
	========================================
		WPTHEME FONT-SUBSET CUSTOMIZATION
	========================================
*
* Function that will customize the font_subset
*/
if ( ! function_exists( 'wpTheme_font_subset_customization' ) )
{
     function wpTheme_font_subset_customization( $wp_customize )
     {
          /* We get the defaults */
          $defaults = wpTheme_get_theme_defaults();
          /* Add the settings */
          $id = 'wpTheme_options[font_subset]';
          $args = array(

			'default' => $defaults['font_subset'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option',
			'sanitize_callback' => 'wpTheme_validate_subset'

		);
          $wp_customize->add_setting( $id , $args );
          /* Add the control */
          $args = array(

			'label' => __( 'Font Subset', 'wpTheme' ),
			'section' => 'typography_options',
			'settings' => 'wpTheme_options[font_subset]',
			'type' => 'select',
			'choices' => wpTheme_font_subset(),
			'sanitize_callback' => 'wpTheme_validate_subset'

		);
          $wp_customize->add_control( $id , $args );
     }
     add_action('customize_register','wpTheme_font_subset_customization');
}
?>
