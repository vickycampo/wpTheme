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

namespace wptchild\Api\ExtraCustomizer;
use WP_Customize_Color_Control;
use WP_Customize_Image_Control;

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

		/* Register Settings */
		add_action ( 'admin_init', array ( $this , 'wpTheme_options_init') );
		/* Register the Section */
		add_action( 'customize_register', array ( $this , 'add_sections') );
		/* Register the settings */
		add_action('customize_register', array ( $this , 'add_settings'));
     }
	function wpTheme_options_init()
     {
          $option_group = 'WPTHEME_OPTIONS';
          $option_name = 'wpTheme_options';
          register_setting( $option_group , $option_name );
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
			$this->SettingsDetails[$i]['sanitize_callback'] = __( $section['sanitize_callback'], 'wpTheme' );

			$Index = $section['index'];
			if ( is_array ( $this->theme_defaults[$section['index']] ) )
			{

				$this->SettingsDetails[$i]['sub-index'] = __( $section['sub-index'], 'wpTheme' );
				$sub_index = $this->SettingsDetails[$i]['sub-index'];
				if ( ( is_array ( $this-> theme_defaults[$Index][$sub_index] ) ) )
				{
					$this->SettingsDetails[$i]['SecondSub-index'] = __( $section['SecondSub-index'], 'wpTheme' );
					$SecondSub_index = $this->SettingsDetails[$i]['SecondSub-index'];
				}

			}
		}
	}
	public function setControlDetails ( $settingsId , $controlInfo , $settingsSubId ='' , $SecondSubIndex ='')
	{
		/*we need to link it with the */
		if ( $settingsSubId == '' )
		{
			foreach  ( $controlInfo as $i => $control)
			{
				$this->ControlDetails[$settingsId][$i]['label'] = $control['label'];
				$this->ControlDetails[$settingsId][$i]['type'] = $control['type'];
				$this->ControlDetails[$settingsId][$i]['choices'] = $control['choices'];
				$this->ControlDetails[$settingsId][$i]['sanitize_callback'] = $control['sanitize_callback'];
			}
		}
		else
		{
			foreach  ( $controlInfo as $i => $control)
			{
				if ( $SecondSubIndex == '' )
				{
					$this->ControlDetails[$settingsId][$settingsSubId][$i]['label'] = $control['label'];
					$this->ControlDetails[$settingsId][$settingsSubId][$i]['type'] = $control['type'];
					$this->ControlDetails[$settingsId][$settingsSubId][$i]['choices'] = $control['choices'];
					$this->ControlDetails[$settingsId][$settingsSubId][$i]['sanitize_callback'] = $control['sanitize_callback'];
				}
				else
				{
					$this->ControlDetails[$settingsId][$settingsSubId][$SecondSubIndex][$i]['label'] = $control['label'];
					$this->ControlDetails[$settingsId][$settingsSubId][$SecondSubIndex][$i]['type'] = $control['type'];
					$this->ControlDetails[$settingsId][$settingsSubId][$SecondSubIndex][$i]['choices'] = $control['choices'];
					$this->ControlDetails[$settingsId][$settingsSubId][$SecondSubIndex][$i]['sanitize_callback'] = $control['sanitize_callback'];
				}


			}
		}


	}
	public function add_sections( $wp_customize )
	{
		/* Check if section exists */
		if ($this->SectionDetails['name'] === 'wptheme_header_section')
		{

			// error_log (__FILE__ . ' - '. __LINE__);
			// error_log (print_r ( $this->SectionDetails , true));
			// $this->var_error_log ($this->SectionDetails['name']);
			return;
		}
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
			// echo ( __LINE__.'<pre>');
			// print_r ($setting);
			// echo ('</pre>');
			$index = $setting['index'];
			$type = $setting['type'];
			$sanitize_callback = $setting['sanitize_callback'];
			$sub_index = '';
			$SecondSubIndex = '';
			if ( is_array ( $this->theme_defaults[$setting['index']] ) )
			{
				$sub_index = $setting['sub-index'];
				if ( is_array ( $this->theme_defaults[$setting['index']][$sub_index] ) )
				{
					$SecondSubIndex = $setting['SecondSub-index'];
					$id = 'wpTheme_options['.$index.']['.$sub_index.']['.$SecondSubIndex.']';
					$defaultValue = $this->theme_defaults[$index][$sub_index][$SecondSubIndex];
				}
				else
				{
					$id = 'wpTheme_options['.$index.']['.$sub_index.']';
					$defaultValue = $this->theme_defaults[$index][$sub_index];

				}

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
				'sanitize_callback' => array( $this->callbacks, $sanitize_callback )
				//'sanitize_callback' => $this->callbacks->{$sanitize_callback}()

			);
			// echo ( __FILE__ . ' - ' . __LINE__.'<pre>');
			// var_dump ($id);
			// var_dump ($args);
			// echo ( __FILE__ . ' - ' . __LINE__.'</pre>');
	          $wp_customize->add_setting( $id , $args );
			$this->add_control ( $index , $wp_customize, $sub_index , $SecondSubIndex);
		}

	}
	public function add_control ( $index , $wp_customize , $sub_index='' , $SecondSubIndex='')
	{

		if ( $sub_index == '' )
		{
			$currentControls = $this->ControlDetails[$index];
		}
		else
		{

			if ( $SecondSubIndex == '')
			{
				/* set the index */
				$currentControls = $this->ControlDetails[$index][$sub_index];

			}
			else
			{
				// echo ( __FILE__ . ' - ' . __LINE__.'<pre>');
				// echo ($index . ' - ' . $sub_index);
				// print_r ($this->ControlDetails[$index][$sub_index]);
				// echo ('</pre>');
				$currentControls = $this->ControlDetails[$index][$sub_index][$SecondSubIndex];
			}

		}
		foreach ( $currentControls as $i => $control)
		{
			error_log (__FILE__ . ' - ' . __LINE__);
			error_log ( print_r ( $this->SectionDetails , true) );
			/* Add the control */
			if ( $sub_index =='' )
			{
				$id = 'wpTheme_options['.$index.']';
			}
			else if ( $SecondSubIndex =='' )
			{
				$id = 'wpTheme_options['.$index.']['.$sub_index.']';
			}
			else
			{
				$id = 'wpTheme_options['.$index.']['.$sub_index.']['.$SecondSubIndex.']';
			}

			$label = $control['label'];
			$type = $control['type'];
			$choices = $control['choices'];
			$sanitize_callback = $control['sanitize_callback'];

			if ($type === 'WP_Customize_Color_Control')
			{
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $id, array(
					'label' => __( $label, 'wpTheme' ),
					'section' => __( $this->SectionDetails['id'] ),
					'settings' => 'wpTheme_options['.$index.']',
					'sanitize_callback' => 'sanitize_hex_color'
				) ) );
			}
			if ($type === 'WP_Customize_Image_Control')
			{
				// error_log (__LINE__);
				// error_log ( $this->SectionDetails['id'] );
				// error_log ( $id );
				// error_log ('----------------------------------------------');
				$wp_customize->add_control(
					new WP_Customize_Image_Control(
							$wp_customize,
							$id,
							array(
							'label'      => __( $label, 'wpTheme' ),
							'section'    => __( $this->SectionDetails['id'] ),
							'settings'   =>$id,
							'sanitize_callback' => array( $this->callbacks, $sanitize_callback )
						)
					)
				);
			}
			else
			{
				if ( $choices == '')
				{
					$args = array(
						'label' => __( $label, 'wpTheme' ),
						'section' => __( $this->SectionDetails['id'] ),
						'settings' => $id,
						'type' => $type,
						'sanitize_callback' => $this->callbacks->{$sanitize_callback}()
					);
					$wp_customize->add_control( $id , $args );
				}
				else
				{
					// echo (__FILE__ .' - ' . __LINE__.'<pre>');
					// print_r ($choices);
					// echo ('<pre>');
					$args = array(
						'label' => __( $label, 'wpTheme' ),
						'section' => __( $this->SectionDetails['id'] ),
						'settings' => $id,
						'type' => $type,
						'choices' => $this->callbacks->{$choices}(),
						'sanitize_callback' => array( $this->callbacks, $sanitize_callback )
					);
					$wp_customize->add_control( $id , $args );
				}
			}




		}

	}
}
