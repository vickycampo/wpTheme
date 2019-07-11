<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	===================================
		BASE TO CUSTOMIZATION
	===================================
*
* The advenced custominzation functions
*/

namespace wptheme\Api\ExtraCustomizer;
use WP_Customize_Color_Control;

class BaseCustomizer
{
	/**
	 * register default hooks and actions for WordPress
	 * @return
	 */
	public $SectionDetails;
	public $SettingsDetails = [];
	public $ControlDetails = [];


	public $priority;
	public $theme_defaults;

	public $callbacks;


	public function register(  )
	{

		/* Register the Section */
		add_action( 'customize_register', array ( $this , 'add_sections') );
		/* Register the settings */
		add_action('customize_register', array ( $this , 'add_settings'));
     }
	public function SetSectionDetails( $name , $priority )
	{
		$this->SectionDetails['name'] = __( $name, 'wpTheme' );
		$this->SectionDetails['id'] = strtolower($name);
		$this->SectionDetails['id'] = str_replace(" " , "_", $this->SectionDetails['id'] );
		$this->priority = $priority;
	}
	public function var_error_log( $object=null )
	{
		ob_start();                    // start buffer capture
		var_dump( $object );           // dump the values
		$contents = ob_get_contents(); // put the buffer into a variable
		ob_end_clean();                // end capture
		error_log( $contents );        // log contents of the result of var_dump( $object )
	}
	public function SetSettingDetails( $SectionsList )
	{

		foreach ( $SectionsList as $i => $section )
		{
			$this->SettingsDetails[$i]['index'] = __( $section['index'], 'wpTheme' );
			$this->SettingsDetails[$i]['type'] = __( $section['type'], 'wpTheme' );
			$this->SettingsDetails[$i]['sanitize_callback'] = __( $section['index'], 'wpTheme' );
			if ( is_array ( $this->theme_defaults[$section['index']] ) )
			{
				$this->SettingsDetails[$i]['sub-index'] = __( $section['sub-index'], 'wpTheme' );
			}
		}
	}
	public function setControlDetails ( $settingsId , $controlInfo )
	{
		/*we need to link it with the */
		foreach  ( $controlInfo as $i => $control)
		{
			$this->ControlDetails[$settingsId][$i]['label'] = $control['label'];
			$this->ControlDetails[$settingsId][$i]['type'] = $control['type'];
			$this->ControlDetails[$settingsId][$i]['choices'] = $control['choices'];
			$this->ControlDetails[$settingsId][$i]['sanitize_callback'] = $control['sanitize_callback'];

		}

	}
	public function add_sections( $wp_customize )
	{
		$args = array
          (
              'title'      => __( $this->SectionDetails['name'] ),
              'priority'   => $this->priority
          );
          $wp_customize -> add_section( $this->SectionDetails['id'] , $args );
	}
	public function add_settings( $wp_customize )
	{
		foreach ($this->SettingsDetails as $i => $setting)
		{

			/* set the index */
			$index = $setting['index'];
			$type = $setting['type'];
			$sanitize_callback = $setting['sanitize_callback'];
			$sub_index = '';
			if ( is_array ( $this->theme_defaults[$setting['index']] ) )
			{
				$sub_index = $setting['sub-index'];
				$id = 'wpTheme_options['.$index.']['.$sub_index.']';
				$defaultValue = $this->theme_defaults[$index][$sub_index];
			}
			else
			{
				$id = 'wpTheme_options['.$index.']';
				$defaultValue = $this->theme_defaults[$index];
			}
	          /* Add the settings */

	          $args = array (
				'default' => $defaultValue,
				'capability' => 'edit_theme_options',
				'transport' => 'refresh',
				'type' => $type,
				'sanitize_callback' => array( $this->callbacks , $sanitize_callback )

			);
	          $wp_customize->add_setting( $id , $args );
			$this->add_control ( $index , $wp_customize, $sub_index );
		}

	}
	public function add_control ( $index , $wp_customize , $sub_index='' )
	{
		foreach ($this->ControlDetails[$index] as $i => $control)
		{
			/* Add the control */
			if ( ( $sub_index !='' ) && ( is_array ( $this->theme_defaults[$index] ) ) )
			{

				$id = 'wpTheme_options['.$index.']['.$sub_index.']';
			}
			else
			{
				$id = 'wpTheme_options['.$index.']';
			}

			$label = $control['label'];
			$type = $control['type'];
			$choices = $control['choices'];
			$sanitize_callback = $control['sanitize_callback'];

			if ($type != 'WP_Customize_Color_Control')
			{
				if ( $choices == '')
				{
					$args = array(
						'label' => __( $label, 'wpTheme' ),
						'section' => __( $this->SectionDetails['id'] ),
						'settings' => $id,
						'type' => $type,
						'sanitize_callback' => $sanitize_callback
					);
					error_log (__LINE__);
					error_log ( $this->SectionDetails['id'] );
					error_log ( $id );
					error_log ( print_r ($args , true) );
					error_log ('----------------------------------------------');
					$wp_customize->add_control( $id , $args );
				}
				else
				{
					$args = array(
						'label' => __( $label, 'wpTheme' ),
						'section' => __( $this->SectionDetails['id'] ),
						'settings' => $id,
						'type' => $type,
						'choices' => $this->callbacks->{$choices}(),
						'sanitize_callback' => $sanitize_callback
					);
					$wp_customize->add_control( $id , $args );
				}
			}
			else
			{

				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $id, array(
					'label' => __( $label, 'wpTheme' ),
					'section' => __( $this->SectionDetails['id'] ),
					'settings' => 'wpTheme_options['.$index.']',
					'sanitize_callback' => 'sanitize_hex_color'
				) ) );
			}



		}

	}
}
