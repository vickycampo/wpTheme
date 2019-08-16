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
class LayoutOptions extends BaseCustomizer
{
	/**
	* register default hooks and actions for WordPress
	* @return
	*/
	public function __construct()
	{

		$Functions = new Functions();
		$this->theme_defaults = $Functions->get_theme_defaults();
		// echo ('<pre>');
		// var_dump ($this->theme_defaults['nav-menu']);
		// echo ('----------------------------------<br>');
		// echo ('</pre>');
		/* Initialize the class that manages the CallBacks*/
		$this->callbacks = new Callbacks();
		/* add Details */

          $i = 0;
		$SettingsList[$i]['index'] = 'nav-menu';
		$SettingsList[$i]['type'] = 'option';
		$SettingsList[$i]['sanitize_callback'] = 'wpTheme_validate_true_false';
		$j = 0;
		$settingsId = $SettingsList[$i]['index'];
		$ControlsList[$settingsId][$j]['label'] = 'Fixed nav menu?';
		$ControlsList[$settingsId][$j]['type'] = 'checkbox';
		$ControlsList[$settingsId][$j]['choices'] = 'wpTheme_true_false';
		$ControlsList[$settingsId][$j]['sanitize_callback'] = 'wpTheme_validate_true_false';
          /*-----------------------------------------------------------------*/
		$i++;
		$SettingsList[$i]['index'] = 'breadcrumbs';
		$SettingsList[$i]['type'] = 'option';
		$SettingsList[$i]['sanitize_callback'] = 'wpTheme_validate_true_false';
		$j = 0;
		$settingsId = $SettingsList[$i]['index'];
		$ControlsList[$settingsId][$j]['label'] = 'Enable breadcrumbs?';
		$ControlsList[$settingsId][$j]['type'] = 'checkbox';
		$ControlsList[$settingsId][$j]['choices'] = 'wpTheme_true_false';
		$ControlsList[$settingsId][$j]['sanitize_callback'] = 'wpTheme_validate_excerpts';
          /*-----------------------------------------------------------------*/
		$i++;
		$SettingsList[$i]['index'] = 'excerpts';
		$SettingsList[$i]['type'] = 'option';
		$SettingsList[$i]['sanitize_callback'] = 'wpTheme_validate_true_false';
		$j = 0;
		$settingsId = $SettingsList[$i]['index'];
		$ControlsList[$settingsId][$j]['label'] = 'Full posts or excerpts on blog home?';
		$ControlsList[$settingsId][$j]['type'] = 'checkbox';
		$ControlsList[$settingsId][$j]['choices'] = 'wpTheme_true_false';
		$ControlsList[$settingsId][$j]['sanitize_callback'] = 'wpTheme_validate_excerpts';
          /*-----------------------------------------------------------------*/
		$i++;
		$SettingsList[$i]['index'] = 'archive-excerpt';
		$SettingsList[$i]['type'] = 'option';
		$SettingsList[$i]['sanitize_callback'] = 'wpTheme_validate_true_false';
		$j = 0;
		$settingsId = $SettingsList[$i]['index'];
		$ControlsList[$settingsId][$j]['label'] = 'Full posts or excerpts on archive pages?';
		$ControlsList[$settingsId][$j]['type'] = 'checkbox';
		$ControlsList[$settingsId][$j]['choices'] = 'wpTheme_true_false';
		$ControlsList[$settingsId][$j]['sanitize_callback'] = 'wpTheme_validate_excerpts';
          /*-----------------------------------------------------------------*/
		$i++;
		$SettingsList[$i]['index'] = 'post-author';
		$SettingsList[$i]['type'] = 'option';
		$SettingsList[$i]['sanitize_callback'] = 'wpTheme_validate_true_false';
		$j = 0;
		$settingsId = $SettingsList[$i]['index'];
		$ControlsList[$settingsId][$j]['label'] = 'Display post author?';
		$ControlsList[$settingsId][$j]['type'] = 'checkbox';
		$ControlsList[$settingsId][$j]['choices'] = 'wpTheme_true_false';
		$ControlsList[$settingsId][$j]['sanitize_callback'] = 'wpTheme_validate_true_false';
          /*-----------------------------------------------------------------*/

          /* Section Details */
		$this->SetSectionDetails( 'Layout' ,  37 );
		$this->SetSettingDetails( $SettingsList );
		foreach ($SettingsList as $i => $Setings)
		{
			$settingsId = $Setings['index'];
			$this->setControlDetails ( $settingsId , $ControlsList[$settingsId] );
		}
     }
}