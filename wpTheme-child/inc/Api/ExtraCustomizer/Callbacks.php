<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	===================================
		CALLBACK FUNCTIONS
	===================================
*
* The advenced custominzation functions
*/

namespace wptchild\Api\ExtraCustomizer;


/**
 * Customizer class
 */
class CallBacks
{

     public static function wpTheme_true_false()
     {
          $true_false = array(
               true => __('Yes','wpTheme'),
               false => __('No','wpTheme')
          );
          return $true_false;
     }
     public static function wpTheme_show_excerpts()
     {
        $show_excerpts = array(
            true => __('Show Post Excerpts','wpTheme'),
            false => __('Show Full Posts','wpTheme')
        );
        return $show_excerpts;
     }
     public static function wpTheme_fonts()
     {
          $fonts = array(
               'PT Serif' => 'PT Serif',
               'Inconsolata' => 'Inconsolata',
               'Droid Sans' => 'Droid Sans',
               'Ubuntu' => 'Ubuntu',
               'Lato' => 'Lato',
               'Noto Serif' => 'Noto Serif',
               'Open Sans' => 'Open Sans',
          );
          return $fonts;
     }
     public static function wpTheme_font_subset()
     {
          $font_subsets = array(
               'latin' => __( 'Latin', 'wpTheme' ),
               'latin-ext' => __( 'Latin Extended', 'wpTheme' ),
               'cyrillic' => __( 'Cyrillic', 'wpTheme' ),
               'cyrillic-ext' => __( 'Cyrillic Extended', 'wpTheme' ),
               'greek' => __( 'Greek', 'wpTheme' ),
               'greek-ext' => __( 'Greek Extended', 'wpTheme' ),
               'vietnamese' => __( 'Vietnamese', 'wpTheme' )
          );
          return $font_subsets;
     }
     public static function wpTheme_skins()
     {
          $skins = array(
               ' '            => __( '', 'wpTheme' ),
               'cerulean'     => __( 'Cerulean', 'wpTheme' ),
               'cosmo'        => __( 'Cosmo', 'wpTheme' ),
               'cyborg'       => __( 'Cyborg', 'wpTheme' ),
               'darkly'       => __( 'Darkly', 'wpTheme' ),
               'flatly'       => __( 'Flatly', 'wpTheme' ),
               'journal'      => __( 'Journal', 'wpTheme' ),
               'litera'       => __( 'Litera', 'wpTheme' ),
               'lumen'        => __( 'Lumen', 'wpTheme' ),
               'lux'          => __( 'Lux', 'wpTheme' ),
               'materia'      => __( 'Materia', 'wpTheme' ),
               'minty'        => __( 'Minty', 'wpTheme' ),
               'pulse'        => __( 'Pulse', 'wpTheme' ),
               'sandstone'    => __( 'Sandstone', 'wpTheme' ),
               'simplex'      => __( 'Simplex', 'wpTheme' ),
               'sketchy'      => __( 'Sketchy', 'wpTheme' ),
               'slate'        => __( 'Slate', 'wpTheme' ),
               'solar'        => __( 'Solar', 'wpTheme' ),
               'spacelab'     => __( 'Spacelab', 'wpTheme' ),
               'superhero'    => __( 'Superhero', 'wpTheme' ),
               'united'       => __( 'United', 'wpTheme' ),
               'yeti'         => __( 'Yeti', 'wpTheme' ),
          );
          return $skins;
     }
     public static function wpTheme_screen_size()
     {
          $screen_sizes = array(
               '-'            => __( 'Extra small (<576px)', 'wpTheme' ),
               '-sm-'         => __( 'Small (≥576px)', 'wpTheme' ),
               '-md-'         => __( 'Medium (≥768px)', 'wpTheme' ),
               '-lg-'         => __( 'Large (≥992px)', 'wpTheme' ),
               '-xl-'         => __( 'Extra large (≥1200px)', 'wpTheme' )

          );
          return $screen_sizes;
     }
     public static function wpTheme_nav_menu_color()
     {
          $color = array (
               '' => __( 'None', 'wpTheme' ),
               'navbar-dark bg-dark' => __( 'Dark', 'wpTheme' ),
               'navbar-dark bg-primary' => __( 'Dark-Primary', 'wpTheme' ),
               'navbar-dark bg-secondary' => __( 'Dark-Secondary', 'wpTheme' ),
               'navbar-dark bg-success' => __( 'Dark-Success', 'wpTheme' ),
               'navbar-dark bg-danger' => __( 'Dark-Danger', 'wpTheme' ),
               'navbar-dark bg-warning' => __( 'Dark-Warning', 'wpTheme' ),
               'navbar-dark bg-info' => __( 'Dark-Info', 'wpTheme' ),
               'navbar-light bg-light' => __( 'Ligh-light', 'wpTheme' ),
               'navbar-light bg-white' => __( 'Ligh-White', 'wpTheme' )

          );
          return ($color);
     }
     public static function wpTheme_nav_menu_auto_margins()
     {
          $color = array (
               '' => __( "Don't Push Items", 'wpTheme' ),
               'mr-auto' => __( 'To the Left', 'wpTheme' ),
               'mx-auto' =>  __( 'Center', 'wpTheme' ),
               'ml-auto' => __( 'To the Rigth', 'wpTheme' )

          );
          return ($color);
     }
     public static function wpTheme_percentages()
     {
          $percentage = array (
               'auto' => __( "auto", 'wpTheme' ),
               '40' => __( '40%', 'wpTheme' ),
               '50' => __( '50%', 'wpTheme' ),
               '60' => __( '60%', 'wpTheme' ),
               '70' => __( '70%', 'wpTheme' ),
               '80' => __( '80%', 'wpTheme' ),
               '90' => __( '90%', 'wpTheme' ),
               '100' => __( '100%', 'wpTheme' )
          );
          return ($percentage);
     }
     public static function wpTheme_esc_textarea ()
     {
          return ('wpTheme_esc_textarea');
     }



     public static function wpTheme_validate_true_false( $value )
	{
		if ($value == false)
		{
			$value = 0;
		}
		else if ($value == true)
		{
			$value = 1;
		}
		if ( ! array_key_exists( $value, $this->wpTheme_true_false() ) )
			$value = null;

		return $value;
	}
     public static function wpTheme_validate_fonts( $value )
	{
		//WE CHECK IF THE FONT IS IN THE ARRAY OF VALID VALUES
		if ( ! array_key_exists( $value, $this->wpTheme_fonts() ) )
		{
			//FALSE - NOT VALID
			$value = null;
		}

		//TRUE - VALID
		return $value;
	}
     public static function wpTheme_validate_excerpts( $value )
	{
		//WE CHECK IF THE FONT IS IN THE ARRAY OF VALID VALUES
		if ( !array_key_exists( $value, wpTheme_show_excerpts() ) )
		{
			//FALSE - NOT VALID
			$value = null;
		}
		//TRUE - VALID
		return $value;
	}
     public static function wpTheme_validate_subset( $value )
	{
		//WE CHECK IF THE FONT IS IN THE ARRAY OF VALID VALUES
			if ( !array_key_exists( $value, $this->wpTheme_font_subset() ) )
		{
			//FALSE - NOT VALID
			$value = null;
		}
		//TRUE - VALID
		return $value;
	}
     public static function wpTheme_kses( $value )
	{
		return wp_kses_post( $value ); //Sanitize content for allowed HTML tags for post content.
	}

     public static function wpTheme_validate_favicon( $value )
	{
		/*  Create a list of valid file types */
		define('TYPE_WHITELIST', serialize(array(
			'image/jpeg',
			'image/jpg',
			'image/png',
			'image/gif',
			'image/ico'
		)));
		/*  Check if isset other wise nothing was chosen */
		if ( isset( $value['favicon'] ) )
		{
			/*  Get the values */
			$favicon = $value['favicon'];
			$favicon = getimagesize($favicon);
			/*  Check if is in the valid list */
			if (in_array($favicon['mime'], unserialize(TYPE_WHITELIST)))
			{
				/*  TRUE - Clean value and return */
				$value['favicon'] = esc_url_raw( $value['favicon'] );
			}
			else
			{
				/*  FALSE - Null */
				$value['favicon'] = null;
			}
		}
		return $value;
	}
     public static function wpTheme_validate_skins( $value )
	{
		//WE CHECK IF THE FONT IS IN THE ARRAY OF VALID VALUES
			if ( !array_key_exists( $value, $this->wpTheme_skins() ) )
		{
			//FALSE - NOT VALID
			$value = null;
		}
		//TRUE - VALID
		return $value;
	}
     public static function wpTheme_validate_screen_size( $value )
	{
		//WE CHECK IF THE FONT IS IN THE ARRAY OF VALID VALUES
		if ( !array_key_exists( $value, $this->wpTheme_screen_size() ) )
		{
			//FALSE - NOT VALID
			$value = null;
		}
		//TRUE - VALID
		return $value;
	}
     public static function wpTheme_validate_nav_menu_color( $value )
	{
		if ( !array_key_exists( $value, wpTheme_nav_menu_color() ) )
		{
			//FALSE - NOT VALID
			$value = null;
		}
		//TRUE - VALID
		return $value;
	}
     public static function wpTheme_validate_nav_menu_auto_margins( $value )
	{
		if ( !array_key_exists( $value, $this->wpTheme_nav_menu_auto_margins() ) )
		{
			//FALSE - NOT VALID
			$value = null;
		}
		//TRUE - VALID
		return $value;
	}
     public static function wpTheme_validate_percentages( $value )
	{
		if ( !array_key_exists( $value, $this->wpTheme_percentages() ) )
		{
			//FALSE - NOT VALID
			$value = null;
		}
		//TRUE - VALID
		return $value;
	}
     public static function wpTheme_validate_image ( $value )
     {
          define('TYPE_WHITELIST', serialize(array(
     		'image/jpeg',
     		'image/jpg',
     		'image/png',
     		'image/gif',
     		'image/ico'
     	)));

     	if ( isset( $value['favicon'] ) ) {
     		$favicon = $value['favicon'];
     		$favicon = getimagesize($favicon);
     		if (in_array($favicon['mime'], unserialize(TYPE_WHITELIST))) {
     			$value['favicon'] = esc_url_raw( $value['favicon'] );
     		} else {
     			$value['favicon'] = null;
     		}
     	}

         return $value;
     }
}
