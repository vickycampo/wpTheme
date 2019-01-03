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
if ( ! function_exists( 'wpTheme_register' ) )
{
  function wpTheme_register( $wp_customize )
  {
    
    // Section Options
    $args	= array
    (
      'title' => __( 'wpThemeSection' ),
      'description' => __( 'Add wpThemeSection here' ),
      'panel' => '', // Not typically needed.
      'priority' => 160,
      'capability' => 'edit_theme_options',
      'theme_supports' => '' // Rarely needed.
    );

    $wp_customize->add_section( 'wpThemeSection_id' , $args );
    // $wp_customize->get_section();
    // $wp_customize->remove_section();

    // Settings Options
    unset ($args);
    $args	= array
    (
      'type' => 'theme_mod', // or 'option'
      'capability' => 'edit_theme_options',
      'theme_supports' => '', // Rarely needed.
      'default' => '',
      'transport' => 'refresh', // or postMessage
      'sanitize_callback' => '',
      'sanitize_js_callback' => '', // Basically to_json.
    );
    $wp_customize->add_setting( 'setting_id' , $args );
    // $wp_customize->get_setting();
    // $wp_customize->remove_setting();

    // Control Options
    unset ($args);
    $args	= array
    (
      'type' => 'date',
      'priority' => 10, // Within the section.
      'section' => 'wpThemeSection_id', // Required, core or custom.
      'label' => __( 'Date' ),
      'description' => __( 'This is a date control with a red border.' ),
      'input_attrs' => array(
      'class' => 'my-custom-class-for-js',
      'style' => 'border: 1px solid #900',
      'placeholder' => __( 'mm/dd/yyyy' ),
      ),
      'active_callback' => 'is_front_page',
    );
    $wp_customize->add_control( 'setting_id', $args);
    // $wp_customize->get_control();
    // $wp_customize->remove_control();
  }
  add_action('customize_register','wpTheme_register');
}


?>
