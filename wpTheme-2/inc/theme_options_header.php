<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	===================================
		THEME OPTIONS - HEADER OPTIONS
	===================================
*
* The colors custominzation functions
*/
?>
<?php
/*
	============================
		WPTHEME HEADER IMAGE
	============================
*
* Function that will set the header image as a background
*/
if ( ! function_exists( 'wpTheme_header_image' ) )
{
     function wpTheme_header_image( $wp_customize )
     {
          /* We get the defaults */
          $defaults = wpTheme_get_theme_defaults();
          /* Add the settings */
          $id = 'wpTheme_options[big-header-image][as_background]';
          $args = array(
			'default' => $defaults['big-header-image']['as_background'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option',
			'sanitize_callback' => 'wpTheme_validate_true_false'
		);
          $wp_customize->add_setting( $id , $args );
          /* Add the control */
          $args = array(
			'label' => __( 'Show as a background?', 'wpTheme' )
			'section' => 'header_image',
			'settings' => $id,
			'type' => 'checkbox',
			'choices' => wpTheme_true_false(),
			'sanitize_callback' => 'wpTheme_validate_true_false'
		);
          $wp_customize->add_control( $id , $args );
     }
     add_action('customize_register','wpTheme_header_image');
}
?>
<?php
/*
	================================
		WPTHEME HEADER SITE LOGO
	================================
*
* Function that will set the header image as a background
*/
if ( ! function_exists( 'wpTheme_header_site_logo' ) )
{
     function wpTheme_header_site_logo( $wp_customize )
     {
          /* We get the defaults */
          $defaults = wpTheme_get_theme_defaults();
          // echo ('<pre>');
          // var_dump ($defaults['big-header-image']['show_site_logo']);
          // echo ('</pre>');
          /* Add the settings */
          $id = 'wpTheme_options[big-header-image][show_site_logo]';
          $args = array(

			'default' => $defaults['big-header-image']['show_site_logo'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option',
			'sanitize_callback' => 'wpTheme_validate_true_false'

		);
          $wp_customize->add_setting( $id , $args );
          /* Add the control */
          $args = array(

			'label' => __( 'Show the site logo?', 'wpTheme' ),
			'section' => 'header_image',
			'settings' => $id,
			'type' => 'checkbox',
			'choices' => wpTheme_true_false(),
			'sanitize_callback' => 'wpTheme_validate_true_false'

		);
          $wp_customize->add_control( $id , $args );
     }
     add_action('customize_register','wpTheme_header_site_logo');
}
?>
<?php
/*
	================================
		WPTHEME HEADER SITE NAME
	================================
*
* Function that will set the header image as a background
*/
if ( ! function_exists( 'wpTheme_header_site_name' ) )
{
     function wpTheme_header_site_name( $wp_customize )
     {
          /* We get the defaults */
          $defaults = wpTheme_get_theme_defaults();
          /* Add the settings */
          $id = 'wpTheme_options[big-header-image][site_name]';
          $args = array(

			'default' => $defaults['big-header-image']['site_name'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option',
			'sanitize_callback' => 'wpTheme_validate_true_false'

		);
          $wp_customize->add_setting( $id , $args );
          /* Add the control */
          $args = array(

			'label' => __( 'Show the site name?', 'wpTheme' ),
			'section' => 'header_image',
			'settings' => $id,
			'type' => 'checkbox',
			'choices' => wpTheme_true_false(),
			'sanitize_callback' => 'wpTheme_validate_true_false'

		);
          $wp_customize->add_control( $id , $args );
     }
     add_action('customize_register','wpTheme_header_site_name');
}
?>
<?php
/*
	=======================================
		WPTHEME HEADER SITE DESCRIPTION
	=======================================
*
* Function that will set the header image as a background
*/
if ( ! function_exists( 'wpTheme_header_site_description' ) )
{
     function wpTheme_header_site_description( $wp_customize )
     {
          /* We get the defaults */
          $defaults = wpTheme_get_theme_defaults();
          /* Add the settings */
          $id = 'wpTheme_options[big-header-image][site_description]';
          $args = array(

			'default' => $defaults['big-header-image']['site_description'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option',
			'sanitize_callback' => 'wpTheme_validate_true_false'

		);
          $wp_customize->add_setting( $id , $args );
          /* Add the control */
          $args = array(

			'label' => __( 'Show the site description?', 'wpTheme' ),
			'section' => 'header_image',
			'settings' => $id,
			'type' => 'checkbox',
			'choices' => wpTheme_true_false(),
			'sanitize_callback' => 'wpTheme_validate_true_false'

		);
          $wp_customize->add_control( $id , $args );
     }
     add_action('customize_register','wpTheme_header_site_description');
}
?>
<?php
/*
	=======================================
		WPTHEME HEADER PERCENTAGE
	=======================================
*
* Function percentage
*/
if ( ! function_exists( 'wpTheme_header_percentage' ) )
{
     function wpTheme_header_percentage( $wp_customize )
     {
          /* We get the defaults */
          $defaults = wpTheme_get_theme_defaults();
          /* Add the settings */
          $id = 'wpTheme_options[big-header-image][percentage]';
          $args = array(

			'default' => $defaults['big-header-image']['percentage'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option',
			'sanitize_callback' => 'wpTheme_validate_percentages'

		);
          $wp_customize->add_setting( $id , $args );
          /* Add the control */
          $args = array(

			'label' => __( 'Set the height of the image?', 'wpTheme' ),
			'section' => 'header_image',
			'settings' => $id,
			'type' => 'select',
			'choices' => wpTheme_percentages(),
			'sanitize_callback' => 'wpTheme_validate_percentages'

		);
          $wp_customize->add_control( $id , $args );
     }
     add_action('customize_register','wpTheme_header_percentage');
}
?>
