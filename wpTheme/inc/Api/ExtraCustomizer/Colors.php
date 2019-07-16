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

namespace wptheme\Api\ExtraCustomizer;
use wptheme\Api\ExtraCustomizer\BaseCustomizer;
use wptheme\Api\ExtraCustomizer\Callbacks;
use wptheme\Core\Functions;

/**
* Customizer class
*/
class Colors extends BaseCustomizer
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
		$SettingsList[$i]['index'] = 'font-color';
		$SettingsList[$i]['type'] = 'option';
		$SettingsList[$i]['sanitize_callback'] = 'sanitize_hex_color';
		$j = 0;
		$settingsId = $SettingsList[$i]['index'];
		$ControlsList[$settingsId][$j]['label'] = 'Font Color';
		$ControlsList[$settingsId][$j]['type'] = 'WP_Customize_Color_Control';
		$ControlsList[$settingsId][$j]['choices'] = 'wpTheme_true_false';
		$ControlsList[$settingsId][$j]['sanitize_callback'] = 'sanitize_hex_color';
          /*-----------------------------------------------------------------*/
          $i++;
          $SettingsList[$i]['index'] = 'link';
		$SettingsList[$i]['type'] = 'option';
		$SettingsList[$i]['sanitize_callback'] = 'sanitize_hex_color';
          $j = 0;
		$settingsId = $SettingsList[$i]['index'];
		$ControlsList[$settingsId][$j]['label'] = 'Link Color';
		$ControlsList[$settingsId][$j]['type'] = 'WP_Customize_Color_Control';
		$ControlsList[$settingsId][$j]['choices'] = 'wpTheme_true_false';
		$ControlsList[$settingsId][$j]['sanitize_callback'] = 'sanitize_hex_color';
          /*-----------------------------------------------------------------*/
          $i++;
          $SettingsList[$i]['index'] = 'hover';
		$SettingsList[$i]['type'] = 'option';
		$SettingsList[$i]['sanitize_callback'] = 'sanitize_hex_color';
          $j = 0;
		$settingsId = $SettingsList[$i]['index'];
		$ControlsList[$settingsId][$j]['label'] = 'Hover Color';
		$ControlsList[$settingsId][$j]['type'] = 'WP_Customize_Color_Control';
		$ControlsList[$settingsId][$j]['choices'] = 'wpTheme_true_false';
		$ControlsList[$settingsId][$j]['sanitize_callback'] = 'sanitize_hex_color';
          /*-----------------------------------------------------------------*/
          $i++;
          $SettingsList[$i]['index'] = 'navbar-color';
		$SettingsList[$i]['type'] = 'option';
		$SettingsList[$i]['sanitize_callback'] = 'sanitize_hex_color';
          $j = 0;
		$settingsId = $SettingsList[$i]['index'];
		$ControlsList[$settingsId][$j]['label'] = 'Navbar (top) Background Color';
		$ControlsList[$settingsId][$j]['type'] = 'WP_Customize_Color_Control';
		$ControlsList[$settingsId][$j]['choices'] = 'wpTheme_true_false';
		$ControlsList[$settingsId][$j]['sanitize_callback'] = 'sanitize_hex_color';
          /* Section Details */
		$this->SetSectionDetails( 'Colors' ,  40 );
		$this->SetSettingDetails( $SettingsList );
		foreach ($SettingsList as $i => $Setings)
		{
			$settingsId = $Setings['index'];
			$this->setControlDetails ( $settingsId , $ControlsList[$settingsId] );
		}
     }
}
