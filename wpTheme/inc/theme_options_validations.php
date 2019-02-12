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
function wpTheme_validate_true_false( $value )
{
	if ( ! array_key_exists( $value, wpTheme_true_false() ) )
		$value = null;
		
	return $value;
}
 ?>
