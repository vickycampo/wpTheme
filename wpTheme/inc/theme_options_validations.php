<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	===========================================
		THEME OPTIONS - VALIDATION FUNCTIONS
	===========================================
*
* All the functions that are used to validate the information in the theme_options.php
*/
?>
<?php
/*
	==============================
		VALIDATE - TRUE / FALSE
	==============================
*
* Validate TRUE / FALSE options
*/
if ( ! function_exists( 'wpTheme_validate_true_false' ) )
{
	function wpTheme_validate_true_false( $value )
	{
		if ( ! array_key_exists( $value, wpTheme_true_false() ) )
			$value = null;

		return $value;
	}
}

?>

<?php
/*
	==============================
		VALIDATE - FONTS
	==============================
*
* Validate FONTS options
*/
if ( ! function_exists( 'wpTheme_validate_fonts' ) )
{
	function wpTheme_validate_fonts( $value )
	{
		//WE CHECK IF THE FONT IS IN THE ARRAY OF VALID VALUES
		if ( ! array_key_exists( $value, wpTheme_fonts() ) )
		{
			//FALSE - NOT VALID
			$value = null;
		}

		//TRUE - VALID
		return $value;
	}
}

?>
<?php
/*
	==============================
		VALIDATE - EXCERPTS
	==============================
*
* Validate EXCERPTS options
*/
if ( ! function_exists( 'wpTheme_validate_excerpts' ) )
{
	function wpTheme_validate_excerpts( $value )
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
}
?>

<?php
/*
	==============================
		VALIDATE - FONTSUBSET
	==============================
*
* Validate FONTSUBSET options
*/
if ( ! function_exists( 'wpTheme_validate_subset' ) )
{
	function wpTheme_validate_subset( $value )
	{
		//WE CHECK IF THE FONT IS IN THE ARRAY OF VALID VALUES
			if ( !array_key_exists( $value, wpTheme_font_subset() ) )
		{
			//FALSE - NOT VALID
			$value = null;
		}
		//TRUE - VALID
		return $value;
	}
}
?>
<?php
/*
	==============================
		VALIDATE - FAVICON
	==============================
*
* Validate FAVICON options
*/
if ( ! function_exists( 'wpTheme_validate_favicon' ) )
{
	function wpTheme_validate_favicon( $value )
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
}
?>
<?php
/*
	==============================
		VALIDATE - FAVICON
	==============================
*
* Runs the value through wp_kses_post for html validation.
*/
if ( ! function_exists( 'wpTheme_kses' ) )
{
	function wpTheme_kses( $value )
	{
		return wp_kses_post( $value ); //Sanitize content for allowed HTML tags for post content.
	}
}
?>
<?php
/*
	==============================
		VALIDATE - SKINS
	==============================
*
* Validate SKINS options
*/
if ( ! function_exists( 'wpTheme_validate_skins' ) )
{
	function wpTheme_validate_skins( $value )
	{
		//WE CHECK IF THE FONT IS IN THE ARRAY OF VALID VALUES
			if ( !array_key_exists( $value, wpTheme_skins() ) )
		{
			//FALSE - NOT VALID
			$value = null;
		}
		//TRUE - VALID
		return $value;
	}
}
?>
<?php
/*
	==============================
		VALIDATE - SCREEN SIZE
	==============================
*
* Validate SKINS options
*/
if ( ! function_exists( 'wpTheme_validate_screen_size' ) )
{
	function wpTheme_validate_screen_size( $value )
	{
		//WE CHECK IF THE FONT IS IN THE ARRAY OF VALID VALUES
		if ( !array_key_exists( $value, wpTheme_screen_size() ) )
		{
			//FALSE - NOT VALID
			$value = null;
		}
		//TRUE - VALID
		return $value;
	}
}
?>
<?php
/*
	=================================================
		VALIDATE - NAVIGATION BAR BACKGROUND COLOR
	=================================================
*
* Validate Navigation Bar - Background color options
*/
if ( ! function_exists( 'wpTheme_validate_nav_menu_color' ) )
{
	function wpTheme_validate_nav_menu_color( $value )
	{
		if ( !array_key_exists( $value, wpTheme_nav_menu_color() ) )
		{
			//FALSE - NOT VALID
			$value = null;
		}
		//TRUE - VALID
		return $value;
	}
}
?>
