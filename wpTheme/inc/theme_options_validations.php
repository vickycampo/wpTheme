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
		if ( ! array_key_exists( $value, ap_core_fonts() ) )
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
		if ( !array_key_exists( $value, ap_core_show_excerpts() ) )
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
		VALIDATE - SIDEBAR
	==============================
*
* Validate SIDEBAR options
*/
if ( ! function_exists( 'wpTheme_validate_sidebar' ) )
{
	function wpTheme_validate_sidebar( $value )
	{
		//WE CHECK IF THE FONT IS IN THE ARRAY OF VALID VALUES
		if ( !array_key_exists( $value, ap_core_sidebar() ) )
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
		if ( !array_key_exists( $value, ap_core_font_subset() ) )
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
