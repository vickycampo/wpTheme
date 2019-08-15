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
		$SettingsList[$i]['sanitize_callback'] = 'wpTheme_validate_image';
		$j = 0;
		$settingsId = $SettingsList[$i]['sub-index'];
		$ControlsList[$settingsId][$j]['label'] = 'Choose a Background image for the header';
		$ControlsList[$settingsId][$j]['type'] = 'WP_Customize_Image_Control';
		$ControlsList[$settingsId][$j]['choices'] = 'header_bg_image';
		$ControlsList[$settingsId][$j]['sanitize_callback'] = 'wpTheme_validate_image';
          /*-----------------------------------------------------------------*/
		$i++;
		$SettingsList[$i]['index'] = 'big_header_image';
		$SettingsList[$i]['sub-index'] = 'show_site_logo';
		$SettingsList[$i]['type'] = 'option';
		$SettingsList[$i]['sanitize_callback'] = 'wpTheme_validate_true_false';
		$j = 0;
		$settingsId = $SettingsList[$i]['sub-index'];
		$ControlsList[$settingsId][$j]['label'] = 'Show the site logo in the header and not the Navigation bar?';
		$ControlsList[$settingsId][$j]['type'] = 'checkbox';
		$ControlsList[$settingsId][$j]['choices'] = 'wpTheme_true_false';
		$ControlsList[$settingsId][$j]['sanitize_callback'] = 'wpTheme_validate_true_false';
		/*-----------------------------------------------------------------*/
		$i++;
		$SettingsList[$i]['index'] = 'big_header_image';
		$SettingsList[$i]['sub-index'] = 'site_name';
		$SettingsList[$i]['type'] = 'option';
		$SettingsList[$i]['sanitize_callback'] = 'wpTheme_validate_true_false';
		$j = 0;
		$settingsId = $SettingsList[$i]['sub-index'];
		$ControlsList[$settingsId][$j]['label'] = 'Show the site name?';
		$ControlsList[$settingsId][$j]['type'] = 'checkbox';
		$ControlsList[$settingsId][$j]['choices'] = 'wpTheme_true_false';
		$ControlsList[$settingsId][$j]['sanitize_callback'] = 'wpTheme_validate_true_false';
		/*-----------------------------------------------------------------*/
		$i++;
		$SettingsList[$i]['index'] = 'big_header_image';
		$SettingsList[$i]['sub-index'] = 'site_description';
		$SettingsList[$i]['type'] = 'option';
		$SettingsList[$i]['sanitize_callback'] = 'wpTheme_validate_true_false';
		$j = 0;
		$settingsId = $SettingsList[$i]['sub-index'];
		$ControlsList[$settingsId][$j]['label'] = 'Show the site description?';
		$ControlsList[$settingsId][$j]['type'] = 'checkbox';
		$ControlsList[$settingsId][$j]['choices'] = 'wpTheme_true_false';
		$ControlsList[$settingsId][$j]['sanitize_callback'] = 'wpTheme_validate_true_false';
		/*-----------------------------------------------------------------*/
		$i++;
		$SettingsList[$i]['index'] = 'big_header_image';
		$SettingsList[$i]['sub-index'] = 'percentage';
		$SettingsList[$i]['type'] = 'option';
		$SettingsList[$i]['sanitize_callback'] = 'wpTheme_validate_percentages';
		$j = 0;
		$settingsId = $SettingsList[$i]['sub-index'];
		$ControlsList[$settingsId][$j]['label'] = 'Set the height of the image?';
		$ControlsList[$settingsId][$j]['type'] = 'select';
		$ControlsList[$settingsId][$j]['choices'] = 'wpTheme_percentages';
		$ControlsList[$settingsId][$j]['sanitize_callback'] = 'wpTheme_validate_percentages';
		/*-----------------------------------------------------------------*/
		$i++;
		$SettingsList[$i]['index'] = 'big_header_image';
		$SettingsList[$i]['sub-index'] = 'show_rowORcolumn';
		$SettingsList[$i]['type'] = 'option';
		$SettingsList[$i]['sanitize_callback'] = 'wpTheme_validate_rowORcolumn';
		$j = 0;
		$settingsId = $SettingsList[$i]['sub-index'];
		$ControlsList[$settingsId][$j]['label'] = 'Show the header elements in a row or a Columng?';
		$ControlsList[$settingsId][$j]['type'] = 'select';
		$ControlsList[$settingsId][$j]['choices'] = 'wpTheme_rowORcolumn';
		$ControlsList[$settingsId][$j]['sanitize_callback'] = 'wpTheme_validate_rowORcolumn';
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
