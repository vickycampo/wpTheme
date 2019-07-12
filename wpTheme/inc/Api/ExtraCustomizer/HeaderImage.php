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
class HeaderImage extends BaseCustomizer
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

          $i = 0;
		$SettingsList[$i]['index'] = 'big_header_image';
		$SettingsList[$i]['sub-index'] = 'as_background';
		$SettingsList[$i]['type'] = 'option';
		$SettingsList[$i]['sanitize_callback'] = array ($this->callbacks , 'wpTheme_validate_true_false' );
		$j = 0;
		$settingsId = $SettingsList[$i]['sub-index'];
		$ControlsList[$settingsId][$j]['label'] = 'Show as a background?';
		$ControlsList[$settingsId][$j]['type'] = 'checkbox';
		$ControlsList[$settingsId][$j]['choices'] = 'wpTheme_true_false';
		$ControlsList[$settingsId][$j]['sanitize_callback'] = array ($this->callbacks , 'wpTheme_validate_true_false' );
          /*-----------------------------------------------------------------*/
		$i++;
		$SettingsList[$i]['index'] = 'big_header_image';
		$SettingsList[$i]['sub-index'] = 'show_site_logo';
		$SettingsList[$i]['type'] = 'option';
		$SettingsList[$i]['sanitize_callback'] = array ($this->callbacks , 'wpTheme_validate_true_false' );
		$j = 0;
		$settingsId = $SettingsList[$i]['sub-index'];
		$ControlsList[$settingsId][$j]['label'] = 'Show the site logo?';
		$ControlsList[$settingsId][$j]['type'] = 'checkbox';
		$ControlsList[$settingsId][$j]['choices'] = 'wpTheme_true_false';
		$ControlsList[$settingsId][$j]['sanitize_callback'] = array ($this->callbacks , 'wpTheme_validate_true_false' );
		/*-----------------------------------------------------------------*/
		$i++;
		$SettingsList[$i]['index'] = 'big_header_image';
		$SettingsList[$i]['sub-index'] = 'site_name';
		$SettingsList[$i]['type'] = 'option';
		$SettingsList[$i]['sanitize_callback'] = array ($this->callbacks , 'wpTheme_validate_true_false' );
		$j = 0;
		$settingsId = $SettingsList[$i]['sub-index'];
		$ControlsList[$settingsId][$j]['label'] = 'Show the site name?';
		$ControlsList[$settingsId][$j]['type'] = 'checkbox';
		$ControlsList[$settingsId][$j]['choices'] = 'wpTheme_true_false';
		$ControlsList[$settingsId][$j]['sanitize_callback'] = array ($this->callbacks , 'wpTheme_validate_true_false' );
		/*-----------------------------------------------------------------*/
		$i++;
		$SettingsList[$i]['index'] = 'big_header_image';
		$SettingsList[$i]['sub-index'] = 'site_description';
		$SettingsList[$i]['type'] = 'option';
		$SettingsList[$i]['sanitize_callback'] = array ($this->callbacks , 'wpTheme_validate_true_false' );
		$j = 0;
		$settingsId = $SettingsList[$i]['sub-index'];
		$ControlsList[$settingsId][$j]['label'] = 'Show the site description?';
		$ControlsList[$settingsId][$j]['type'] = 'checkbox';
		$ControlsList[$settingsId][$j]['choices'] = 'wpTheme_true_false';
		$ControlsList[$settingsId][$j]['sanitize_callback'] = array ($this->callbacks , 'wpTheme_validate_true_false' );
		/*-----------------------------------------------------------------*/
		$i++;
		$SettingsList[$i]['index'] = 'big_header_image';
		$SettingsList[$i]['sub-index'] = 'percentage';
		$SettingsList[$i]['type'] = 'option';
		$SettingsList[$i]['sanitize_callback'] = array ($this->callbacks , 'wpTheme_validate_percentages' );
		$j = 0;
		$settingsId = $SettingsList[$i]['sub-index'];
		$ControlsList[$settingsId][$j]['label'] = 'Set the height of the image?';
		$ControlsList[$settingsId][$j]['type'] = 'checkbox';
		$ControlsList[$settingsId][$j]['choices'] = 'wpTheme_true_false';
		$ControlsList[$settingsId][$j]['sanitize_callback'] = array ($this->callbacks , 'wpTheme_validate_percentages' );
		/*-----------------------------------------------------------------*/

          /* Section Details */
		$this->SetSectionDetails( 'wptheme_header_section' ,  36 );
		$this->SetSettingDetails( $SettingsList );

		foreach ($SettingsList as $i => $Settings)
		{
			$settingsId = $Settings['index'];
			$settingsSubId = $Settings['sub-index'];

			$this->setControlDetails ( $settingsId , $ControlsList[$settingsSubId] , $settingsSubId );
		}
     }
}
