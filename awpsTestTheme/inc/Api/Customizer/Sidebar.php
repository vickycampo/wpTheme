<?php
/**
 * Theme Customizer - Sidebar
 *
 * @package awpstt
 */

namespace awpstt\Api\Customizer;

use WP_Customize_Color_Control;
use awpstt\Api\Customizer;

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
		$wp_customize->add_section( 'awpstt_sidebar_section' , array(
			'title' => __( 'Sidebar', 'awpstt' ),
			'description' => __( 'Customize the Sidebar' ),
			'priority' => 161
		) ); 

		$wp_customize->add_setting( 'awpstt_sidebar_background_color' , array(
			'default' => '#ffffff',
			'transport' => 'postMessage', // or refresh if you want the entire page to reload
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'awpstt_sidebar_background_color', array(
			'label' => __( 'Background Color', 'awpstt' ),
			'section' => 'awpstt_sidebar_section',
			'settings' => 'awpstt_sidebar_background_color',
		) ) );

		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'awpstt_sidebar_background_color', array(
				'selector' => '#awpstt-sidebar-control',
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
			echo Customizer::css( '#sidebar', 'background-color', 'awpstt_sidebar_background_color' );
		echo '</style>';
	}
}