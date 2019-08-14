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
class NavigationBarOptions extends BaseCustomizer
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

		//WE CREATE AN ARRAY WITH ALLA THE NAVIGATION MENUS
          $nav_menus[] = 'top';
          $nav_menus[] = 'main';
		$nav_menus[] = 'footer';
          /* We get the defaults */
          $this->theme_defaults = $Functions->get_theme_defaults();
          //we set the settings for alla the navigation menus
		$i = 0;
          foreach ($nav_menus as $keyd => $nav_menu)
          {
			$SettingsList[$i]['index'] = 'nav_menu_css';
			$SettingsList[$i]['sub-index'] = $nav_menu;
			$SettingsList[$i]['SecondSub-index'] = 'show_hide_brand';
			$SettingsList[$i]['type'] = 'option';
			$SettingsList[$i]['sanitize_callback'] = 'wpTheme_validate_true_false';
			$j = 0;

			$settingsId = $SettingsList[$i]['sub-index'] . ' - ' . $SettingsList[$i]['SecondSub-index'];
			$ControlsList[$settingsId][$j]['label'] = 'Show brand in the ' . $nav_menu;
			$ControlsList[$settingsId][$j]['type'] = 'select';
			$ControlsList[$settingsId][$j]['choices'] = 'wpTheme_true_false';
			$ControlsList[$settingsId][$j]['sanitize_callback'] = 'wpTheme_validate_true_false';
	          /*-------------------------------------------------------------*/
			// $i ++;
			// $SettingsList[$i]['index'] = 'nav_menu_css';
			// $SettingsList[$i]['sub-index'] = $nav_menu;
			// $SettingsList[$i]['SecondSub-index'] = 'background_color';
			// $SettingsList[$i]['type'] = 'option';
			// $SettingsList[$i]['sanitize_callback'] = 'wpTheme_validate_nav_menu_color';
			// $j = 0;
			//
			// $settingsId = $SettingsList[$i]['sub-index'] . ' - ' . $SettingsList[$i]['SecondSub-index'];
			// $ControlsList[$settingsId][$j]['label'] = 'Navigation Menus Color scheme for ' . $nav_menu;
			// $ControlsList[$settingsId][$j]['type'] = 'select';
			// $ControlsList[$settingsId][$j]['choices'] = 'wpTheme_nav_menu_color';
			// $ControlsList[$settingsId][$j]['sanitize_callback'] = 'wpTheme_validate_nav_menu_color';
	          /*-------------------------------------------------------------*/
			$i ++;
			$SettingsList[$i]['index'] = 'nav_menu_css';
			$SettingsList[$i]['sub-index'] = $nav_menu;
			$SettingsList[$i]['SecondSub-index'] = 'margin';
			$SettingsList[$i]['type'] = 'option';
			$SettingsList[$i]['sanitize_callback'] = 'wpTheme_validate_nav_menu_auto_margins';
			$j = 0;

			$settingsId = $SettingsList[$i]['sub-index'] . ' - ' . $SettingsList[$i]['SecondSub-index'];
			$ControlsList[$settingsId][$j]['label'] = 'Navigation Menus Location for ' . $nav_menu;
			$ControlsList[$settingsId][$j]['type'] = 'select';
			$ControlsList[$settingsId][$j]['choices'] = 'wpTheme_nav_menu_auto_margins';
			$ControlsList[$settingsId][$j]['sanitize_callback'] = 'wpTheme_validate_nav_menu_auto_margins';
	          /*-------------------------------------------------------------*/
			// $i ++;
			// $SettingsList[$i]['index'] = 'nav_menu_css';
			// $SettingsList[$i]['sub-index'] = $nav_menu;
			// $SettingsList[$i]['SecondSub-index'] = 'inverse';
			// $SettingsList[$i]['type'] = 'option';
			// $SettingsList[$i]['sanitize_callback'] = 'wpTheme_validate_true_false';
			// $j = 0;
			//
			// $settingsId = $SettingsList[$i]['sub-index'] . ' - ' . $SettingsList[$i]['SecondSub-index'];
			// $ControlsList[$settingsId][$j]['label'] = $nav_menu . ' , Inverse?';
			// $ControlsList[$settingsId][$j]['type'] = 'select';
			// $ControlsList[$settingsId][$j]['choices'] = 'wpTheme_true_false';
			// $ControlsList[$settingsId][$j]['sanitize_callback'] = 'wpTheme_validate_true_false';
	          /*-------------------------------------------------------------*/

			$i ++;
		}




          /* Section Details */
		$this->SetSectionDetails( 'Navigation Bar Options' ,  37 );
		$this->SetSettingDetails( $SettingsList );
		foreach ($SettingsList as $i => $Setings)
		{
			$settingsId = $Setings['index'];
			$settingsSubId = $Setings['sub-index'];
			$SecondSubIndex = $Setings['SecondSub-index'];
			$controlId = $Setings['sub-index'] . ' - ' . $Setings['SecondSub-index'];

			// error_log (__FILE__.' - '.__FILE__.' - ');
			// error_log (' ----- Setings ----- ');
			// error_log (print_r ( $Setings , true ));
			// error_log (' ----- ControlsList ----- ');
			// error_log (print_r ( $ControlsList[$controlId] , true ));
			// error_log ('------------------------------------------------');

			$this-> setControlDetails ( $settingsId , $ControlsList[$controlId] , $settingsSubId , $SecondSubIndex );
		}
     }
}
