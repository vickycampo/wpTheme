<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	===================================
		THEME OPTIONS - ADVANCED
	===================================
*
* The advenced custominzation functions
*/

namespace wptchild\Api\ExtraCustomizer;
use wptchild\Api\ExtraCustomizer\BaseCustomizer;
use wptchild\Api\ExtraCustomizer\Callbacks;
use wptchild\Setup\Functions;

/**
* Customizer class
*/
class AdvancedOptions extends BaseCustomizer
{
	/**
	* register default hooks and actions for WordPress
	* @return
	*/
	public function __construct()
	{

		$Functions = new Functions();
		$this->theme_defaults = $Functions->get_theme_defaults();
		/* Initialize the class that manages the CallBacks*/
		$this->callbacks = new Callbacks();
		/* add Details */

		/* Settings Details */
		$i = 0;
		$SettingsList[$i]['index'] = 'author';
		$SettingsList[$i]['type'] = 'option';
		$SettingsList[$i]['sanitize_callback'] = 'wpTheme_validate_true_false';
		$j = 0;
		$settingsId = $SettingsList[$i]['index'];
		$ControlsList[$settingsId][$j]['label'] = 'Use author meta tags?';
		$ControlsList[$settingsId][$j]['type'] = 'select';
		$ControlsList[$settingsId][$j]['choices'] = 'wpTheme_true_false';
		$ControlsList[$settingsId][$j]['sanitize_callback'] = 'wpTheme_validate_true_false';

		/*---------------------------------------------------------------------------*/
		$i ++ ;
		$SettingsList[$i]['index'] = 'footer';
		$SettingsList[$i]['type'] = 'option';
		$SettingsList[$i]['sanitize_callback'] = 'wpTheme_kses';
		$j = 0;
		$settingsId = $SettingsList[$i]['index'];
		$ControlsList[$settingsId][$j]['label'] = 'Footer Text';
		$ControlsList[$settingsId][$j]['type'] = 'textarea';
		$ControlsList[$settingsId][$j]['choices'] = '';
		$ControlsList[$settingsId][$j]['sanitize_callback'] = 'wpTheme_esc_textarea';
		/*---------------------------------------------------------------------------*/
		$i ++ ;
		$SettingsList[$i]['index'] = 'generator';
		$SettingsList[$i]['type'] = 'option';
		$SettingsList[$i]['sanitize_callback'] = 'wpTheme_validate_true_false';
		$j = 0;
		$settingsId = $SettingsList[$i]['index'];
		$ControlsList[$settingsId][$j]['label'] = 'Debug Mode Active';
		$ControlsList[$settingsId][$j]['type'] = 'select';
		$ControlsList[$settingsId][$j]['choices'] = 'wpTheme_true_false';
		$ControlsList[$settingsId][$j]['sanitize_callback'] = 'wpTheme_validate_true_false';

		/* Section Details */
		$this->SetSectionDetails( 'Advanced Options' ,  160 );
		$this->SetSettingDetails( $SettingsList );
		foreach ($SettingsList as $i => $Setings)
		{
			$settingsId = $Setings['index'];
			$this->setControlDetails ( $settingsId , $ControlsList[$settingsId] );
		}
		/*---------------------------------------------------------------------------*/
		$i ++ ;
		$SettingsList[$i]['index'] = 'bs-screen-size';
		$SettingsList[$i]['type'] = 'option';
		$SettingsList[$i]['sanitize_callback'] = 'wpTheme_validate_screen_size';
		$j = 0;
		$settingsId = $SettingsList[$i]['index'];
		$ControlsList[$settingsId][$j]['label'] = 'Select the screen size?';
		$ControlsList[$settingsId][$j]['type'] = 'select';
		$ControlsList[$settingsId][$j]['choices'] = 'wpTheme_screen_size';
		$ControlsList[$settingsId][$j]['sanitize_callback'] = 'wpTheme_validate_screen_size';

		/* Section Details */
		$this->SetSectionDetails( 'Advanced Options' ,  160 );
		$this->SetSettingDetails( $SettingsList );
		foreach ($SettingsList as $i => $Setings)
		{
			$settingsId = $Setings['index'];
			$this->setControlDetails ( $settingsId , $ControlsList[$settingsId] );
		}

	}
}