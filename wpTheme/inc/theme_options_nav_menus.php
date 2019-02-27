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

if ( ! function_exists( 'wpTheme_nav_menu_css' ) )
{
     function wpTheme_nav_menu_css( $wp_customize )
     {
          //WE CREATE AN ARRAY WITH ALLA THE NAVIGATION MENUS
          $i = 0;
          $nav_menus[$i] = 'top';
          $i ++;
          $nav_menus[$i] = 'main';
          $i ++;
          $nav_menus[$i] = 'footer';
          $i ++;
          /* We get the defaults */
          $defaults = wpTheme_get_theme_defaults();
          //we set the settings for alla the navigation menus
          foreach ($nav_menus as $i => $nav_menu)
          {

               /* Add the settings */
               /* Background color */
               $id = 'wpTheme_options[nav_menu_css]['. $nav_menu .'][background_color]';
               $args = array(

     			'default' => $defaults['nav_menu_css'][$nav_menu]['background_color'],
     			'capability' => 'edit_theme_options',
     			'transport' => 'refresh',
     			'type' => 'option',
     			'sanitize_callback' => 'wpTheme_validate_nav_menu_color'

     		);
               $wp_customize->add_setting( $id , $args );
               /* Add the control */
               $args = array(

     			'label' => __( $nav_menu . ' Navigation Menus Color scheme ', 'wpTheme' ),
     			'section' => 'nav_bar_options',
     			'settings' => $id,
     			'type' => 'select',
     			'choices' => wpTheme_nav_menu_color(),
     			'sanitize_callback' => 'wpTheme_validate_nav_menu_color'

     		);
               $wp_customize->add_control( $id , $args );

               /* Margins - Push items */
               $id = 'wpTheme_options[nav_menu_css]['. $nav_menu .'][margin]';
               $args = array(

     			'default' => $defaults['nav_menu_css'][$nav_menu]['margin'],
     			'capability' => 'edit_theme_options',
     			'transport' => 'refresh',
     			'type' => 'option',
     			'sanitize_callback' => 'wpTheme_validate_nav_menu_auto_margins'

     		);
               $wp_customize->add_setting( $id , $args );
               /* Add the control */
               $args = array(

     			'label' => __( $nav_menu . ' Navigation Menu, push items? ', 'wpTheme' ),
     			'section' => 'nav_bar_options',
     			'settings' => $id,
     			'type' => 'select',
     			'choices' => wpTheme_nav_menu_auto_margins(),
     			'sanitize_callback' => 'wpTheme_validate_nav_menu_auto_margins'

     		);
               $wp_customize->add_control( $id , $args );
               /* Inverse */
               $id = 'wpTheme_options[nav_menu_css]['. $nav_menu .'][inverse]';
               $args = array(

     			'default' => $defaults['nav_menu_css'][$nav_menu]['inverse'],
     			'capability' => 'edit_theme_options',
     			'transport' => 'refresh',
     			'type' => 'option',
     			'sanitize_callback' => 'wpTheme_validate_true_false'

     		);
               $wp_customize->add_setting( $id , $args );
               /* Add the control */
               $args = array(

     			'label' => __( $nav_menu . ' Navigation Menus, Inverse? ', 'wpTheme' ),
     			'section' => 'nav_bar_options',
     			'settings' => $id,
     			'type' => 'select',
     			'choices' => wpTheme_true_false(),
     			'sanitize_callback' => 'wpTheme_validate_true_false'

     		);
               $wp_customize->add_control( $id , $args );
               /* Add a logo to the navbar */
               $id = 'wpTheme_options[nav_menu_css]['. $nav_menu .'][custom_logo]';
               $args = array(
                    'default' => $defaults['nav_menu_css'][$nav_menu]['custom_logo'],
                    'capability'        => 'edit_theme_options',
                    'type'           => 'option',

              );
               $wp_customize->add_setting( $id , $args );
               $args = array(
                    'label'      => __( 'Upload a logo for the ' . $nav_menu . ' Menu ', 'wpTheme' ),
                    'section'    => 'nav_bar_options',
                    'settings'   => $id
               );
               $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize , $nav_menu.'_logo' , $args ) );

          }


     }
     add_action('customize_register','wpTheme_nav_menu_css');
}
?>
