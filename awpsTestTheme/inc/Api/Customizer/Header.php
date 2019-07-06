<?php
/**
 * Theme Customizer - Header
 *
 * @package awpstt
 */

namespace awpstt\Api\Customizer;

use WP_Customize_Color_Control;
use awpstt\Api\Customizer;

/**
 * Customizer class
 */
class Header 
{
	/**
	 * register default hooks and actions for WordPress
	 * @return
	 */
	public function register( $wp_customize ) 
	{
		$wp_customize->add_section( 'awpstt_header_section' , array(
			'title' => __( 'Header', 'awpstt' ),
			'description' => __( 'Customize the Header' ),
			'priority' => 35
		) );

		$wp_customize->add_setting( 'awpstt_header_background_color' , array(
			'default' => '#ffffff',
			'transport' => 'postMessage', // or refresh if you want the entire page to reload
		) );

		$wp_customize->add_setting( 'awpstt_header_text_color' , array(
			'default' => '#333333',
			'transport' => 'postMessage', // or refresh if you want the entire page to reload
		) );

		$wp_customize->add_setting( 'awpstt_header_link_color' , array(
			'default' => '#004888',
			'transport' => 'postMessage', // or refresh if you want the entire page to reload
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'awpstt_header_background_color', array(
			'label' => __( 'Header Background Color', 'awpstt' ),
			'section' => 'awpstt_header_section',
			'settings' => 'awpstt_header_background_color',
		) ) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'awpstt_header_text_color', array(
			'label' => __( 'Header Text Color', 'awpstt' ),
			'section' => 'awpstt_header_section',
			'settings' => 'awpstt_header_text_color',
		) ) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'awpstt_header_link_color', array(
			'label' => __( 'Header Link Color', 'awpstt' ),
			'section' => 'awpstt_header_section',
			'settings' => 'awpstt_header_link_color',
		) ) );

		$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'blogname', array(
				'selector' => '.site-title a',
				'render_callback' => function() {
					bloginfo( 'name' );
				},
			) );
			$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
				'selector' => '.site-description',
				'render_callback' => function() {
					bloginfo( 'description' );
				},
			) );
			$wp_customize->selective_refresh->add_partial( 'awpstt_header_background_color', array(
				'selector' => '#awpstt-header-control',
				'render_callback' => array( $this, 'outputCss' ),
				'fallback_refresh' => true
			) );
			$wp_customize->selective_refresh->add_partial( 'awpstt_header_text_color', array(
				'selector' => '#awpstt-header-control',
				'render_callback' => array( $this, 'outputCss' ),
				'fallback_refresh' => true
			) );
			$wp_customize->selective_refresh->add_partial( 'awpstt_header_link_color', array(
				'selector' => '#awpstt-header-control',
				'render_callback' => array( $this, 'outputCss' ),
				'fallback_refresh' => true
			) );
		}
	}

	/**
	 * Generate inline CSS for customizer async reload
	 */
	public function outputCss()
	{
		echo '<style type="text/css">';
			echo Customizer::css( '.site-header', 'background-color', 'awpstt_header_background_color' );
			echo Customizer::css( '.site-header', 'color', 'awpstt_header_text_color' );
			echo Customizer::css( '.site-header a', 'color', 'awpstt_header_link_color' );
		echo '</style>';
	}
}