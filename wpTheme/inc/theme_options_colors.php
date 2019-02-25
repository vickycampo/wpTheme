<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	===================================
		THEME OPTIONS - COLORS
	===================================
*
* The colors custominzation functions
*/
?>
<?php
/*
	========================================
		WPTHEME FONT-COLOR CUSTOMIZATION
	========================================
*
* Function that will customize the font-color
*/
if ( ! function_exists( 'wpTheme_font_color_customization' ) )
{
     function wpTheme_font_color_customization( $wp_customize )
     {
          /* We get the defaults */
          $defaults = wpTheme_get_theme_defaults();
          /* Add the settings */
          $id = 'wpTheme_options[font-color]';
          $args = array(

			'default' => $defaults['font-color'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option',
			'sanitize_callback' => 'sanitize_hex_color'

		);
          $wp_customize->add_setting( $id , $args );
          /* Add the control */
          $font_color = new WP_Customize_Color_Control( $wp_customize, 'wpTheme_options[font-color]', array(

			'label' => __( 'Font Color', 'wpTheme' ),
			'section' => 'colors',
			'settings' => 'wpTheme_options[font-color]',
			'sanitize_callback' => 'sanitize_hex_color'

		) );
		$wp_customize->add_control( $font_color );
     }
     add_action('customize_register','wpTheme_font_color_customization');
}
?>
<?php
/*
	========================================
		WPTHEME LINK CUSTOMIZATION
	========================================
*
* Function that will customize the link
*/
if ( ! function_exists( 'wpTheme_link_customization' ) )
{
     function wpTheme_link_customization( $wp_customize )
     {
          /* We get the defaults */
          $defaults = wpTheme_get_theme_defaults();
          /* Add the settings */
          $id = 'wpTheme_options[link]';
          $args = array(

			'default' => $defaults['link'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option',
			'sanitize_callback' => 'sanitize_hex_color'

		);
          $wp_customize->add_setting( $id , $args );
          /* Add the control */
          $link_color = new WP_Customize_Color_Control( $wp_customize, 'wpTheme_options[link]', array(

			'label' => __( 'Link Color', 'wpTheme' ),
			'section' => 'colors',
			'settings' => 'wpTheme_options[link]',
			'sanitize_callback' => 'sanitize_hex_color'

		) );
		$wp_customize->add_control( $link_color );
     }
     add_action('customize_register','wpTheme_link_customization');
}
?>
<?php
/*
	========================================
		WPTHEME HOVER CUSTOMIZATION
	========================================
*
* Function that will customize the hover
*/
if ( ! function_exists( 'wpTheme_hover_customization' ) )
{
     function wpTheme_hover_customization( $wp_customize )
     {
          /* We get the defaults */
          $defaults = wpTheme_get_theme_defaults();
          /* Add the settings */
          $id = 'wpTheme_options[hover]';
          $args = array(

			'default' => $defaults['hover'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option',
			'sanitize_callback' => 'sanitize_hex_color'

		);
          $wp_customize->add_setting( $id , $args );
          /* Add the control */
          $hover_color = new WP_Customize_Color_Control( $wp_customize, 'wpTheme_options[hover]', array(

			'label' => __( 'Hover Color', 'wpTheme' ),
			'section' => 'colors',
			'settings' => 'wpTheme_options[hover]',
			'sanitize_callback' => 'sanitize_hex_color'

		) );
		$wp_customize->add_control( $hover_color );
     }
     add_action('customize_register','wpTheme_hover_customization');
}
?>
<?php
/*
	========================================
		WPTHEME CONTENT COLOR CUSTOMIZATION
	========================================
*
* Function that will customize the content-color
*/
if ( ! function_exists( 'wpTheme_content_color_customization' ) )
{
     function wpTheme_content_color_customization( $wp_customize )
     {
          /* We get the defaults */
          $defaults = wpTheme_get_theme_defaults();
          /* Add the settings */
          $id = 'wpTheme_options[content-color]';
          $args = array(

			'default' => $defaults['content-color'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option',
			'sanitize_callback' => 'sanitize_hex_color'

		);
          $wp_customize->add_setting( $id , $args );
          /* Add the control */
          $content_color = new WP_Customize_Color_Control( $wp_customize, 'wpTheme_options[content-color]', array(

			'label' => __( 'Content Background color', 'wpTheme' ),
			'section' => 'colors',
			'settings' => 'wpTheme_options[content-color]',
			'sanitize_callback' => 'sanitize_hex_color'

		) );
		$wp_customize->add_control( $content_color );
     }
     add_action('customize_register','wpTheme_content_color_customization');
}
?>
<?php
/*
	========================================
		WPTHEME NAVBAR-COLOR CUSTOMIZATION
	========================================
*
* Function that will customize the navbar-color
*/
if ( ! function_exists( 'wpTheme_navbar_color_customization' ) )
{
     function wpTheme_navbar_color_customization( $wp_customize )
     {
          /* We get the defaults */
          $defaults = wpTheme_get_theme_defaults();
          /* Add the settings */
          $id = 'wpTheme_options[navbar-color]';
          $args = array(

			'default' => $defaults['navbar-color'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option',
			'sanitize_callback' => 'sanitize_hex_color'

		);
          $wp_customize->add_setting( $id , $args );
          /* Add the control */
          $navbar_color = new WP_Customize_Color_Control( $wp_customize, 'wpTheme_options[navbar-color]', array(

			'label' => __( 'Navbar (top) Background Color', 'wpTheme' ),
			'section' => 'colors',
			'settings' => 'wpTheme_options[navbar-color]',
			'sanitize_callback' => 'sanitize_hex_color'

		) );
		$wp_customize->add_control( $navbar_color );
     }
     //add_action('customize_register','wpTheme_navbar_color_customization');
}
?>
<?php
/*
	========================================
		WPTHEME NAVBAR-INVERSE CUSTOMIZATION
	========================================
*
* Function that will customize the navbar-inverse
*/
if ( ! function_exists( 'wpTheme_navbar_inverse_customization' ) )
{
     function wpTheme_navbar_inverse_customization( $wp_customize )
     {
          /* We get the defaults */
          $defaults = wpTheme_get_theme_defaults();
          /* Add the settings */
          $id = 'wpTheme_options[navbar-inverse]';
          $args = array(

			'default' => $defaults['navbar-inverse'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option',
			'sanitize_callback' => 'wpTheme_validate_true_false'

		);
          $wp_customize->add_setting( $id , $args );
          /* Add the control */
          $args = array(

			'label' => __( 'Inverted navbar?', 'wpTheme' ),
			'section' => 'colors',
			'settings' => 'wpTheme_options[navbar-inverse]',
			'type' => 'select',
			'choices' => wpTheme_true_false(),
			'sanitize_callback' => 'wpTheme_validate_true_false'

		);
          $wp_customize->add_control( $id , $args );
     }
     //add_action('customize_register','wpTheme_navbar_inverse_customization');
}
?>
<?php
/*
	========================================
		WPTHEME NAVBAR-LINK CUSTOMIZATION
	========================================
*
* Function that will customize the navbar-inverse
*/
if ( ! function_exists( 'wpTheme_navbar_link_customization' ) )
{
     function wpTheme_navbar_link_customization( $wp_customize )
     {
          /* We get the defaults */
          $defaults = wpTheme_get_theme_defaults();
          /* Add the settings */
          $id = 'wpTheme_options[navbar-link]';
          $args = array(

			'default' => $defaults['navbar-link'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option',
			'sanitize_callback' => 'sanitize_hex_color'

		);
          $wp_customize->add_setting( $id , $args );
          /* Add the control */
          $navbar_link = new WP_Customize_Color_Control( $wp_customize, 'wpTheme_options[navbar-link]', array(

			'label' => __( 'Navbar Link Color', 'wpTheme' ),
			'section' => 'colors',
			'settings' => 'wpTheme_options[navbar-link]',
			'sanitize_callback' => 'sanitize_hex_color'

		) );
		$wp_customize->add_control( $navbar_link );
     }
     //add_action('customize_register','wpTheme_navbar_link_customization');
}
?>
