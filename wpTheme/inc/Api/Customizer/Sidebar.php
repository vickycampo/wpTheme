<?php
/**
 * Theme Customizer - Sidebar
 *
 * @package wpTheme
 */

namespace wptheme\Api\Customizer;

use WP_Customize_Color_Control;
use wptheme\Api\Customizer;

/**
 * Customizer class
 */
class Sidebar 
{
	/**
	 * register default hooks and actions for WordPress
	 * @return
	 */
	public function register( $wp_customize ) 
	{
		$wp_customize->add_section( 'wptheme_sidebar_section' , array(
			'title' => __( 'Sidebar', 'wpTheme' ),
			'description' => __( 'Customize the Sidebar' ),
			'priority' => 161
		) ); 

		$wp_customize->add_setting( 'wptheme_sidebar_background_color' , array(
			'default' => '#ffffff',
			'transport' => 'postMessage', // or refresh if you want the entire page to reload
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wptheme_sidebar_background_color', array(
			'label' => __( 'Background Color', 'wpTheme' ),
			'section' => 'wptheme_sidebar_section',
			'settings' => 'wptheme_sidebar_background_color',
		) ) );

		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'wptheme_sidebar_background_color', array(
				'selector' => '#wptheme-sidebar-control',
				'render_callback' => array( $this, 'output' ),
				'fallback_refresh' => true
			) );
		}
	}

	/**
	 * Generate inline CSS for customizer async reload
	 */
	public function output()
	{
		echo '<style type="text/css">';
			echo Customizer::css( '#sidebar', 'background-color', 'wptheme_sidebar_background_color' );
		echo '</style>';
	}
}