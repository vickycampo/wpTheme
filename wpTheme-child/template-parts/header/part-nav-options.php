<?php
/*
@package WordPress
@subpackage wpTheme
@since wpTheme
	=====================================
		TEMPLATE PART: NAV-OPTIONS
	=====================================
* Template prepares the options of the navigation bars to be used in the classes
*/
?>
<?php
//The first specific theme helper, load the theme options and defaults
$defaults = wptchild\Setup\Functions::get_theme_defaults();
//Fetch options from the database table
$options = get_option ('wpTheme_options');

//we create a variable that contains the container class depending on which settings are set in the options
/* We determine which screen size we are using*/
if ( isset ( $options['bs-screen-size'] ) )
{
     $screen_size = str_replace ( "-" , "" , $options['bs-screen-size'] );
}
else if ( isset ( $defaults['bs-screen-size'] ) )
{
     $screen_size = str_replace ( "-" , "" , $defaults['bs-screen-size'] );
}
if ($screen_size == '')
{
     $screen_size = 'sm';
}

/* Show the brand? */
if ( isset ( $options['nav_menu_css'][$location]['show_hide_brand'] ) )
{
     $show_hide_brand = $options['nav_menu_css'][$location]['show_hide_brand'];
}
else
{
     $show_hide_brand = $defaults['nav_menu_css'][$location]['show_hide_brand'];
}
/* Get the color of the bar */
$bar_background_color = '';
// if ( isset ( $options['nav_menu_css'][$location]['background_color'] ) )
// {
//      $bar_background_color = $options['nav_menu_css'][$location]['background_color'];
// }
// else
// {
//      $bar_background_color = $defaults['nav_menu_css'][$location]['background_color'];
// }
/* Get the margin type */
$margin = '';
if ( isset ( $options['nav_menu_css'][$location]['margin'] ) )
{
     $margin = $options['nav_menu_css'][$location]['margin'];
}
else
{
     $margin = $defaults['nav_menu_css'][$location]['margin'];
}
/* Get the inverse type */
$inverse_class = '';
// if (( isset ( $options['nav_menu_css'][$location]['inverse'] ) ) && ( $options['nav_menu_css'][$location]['inverse'] ) )
// {
//      $inverse_class = 'bg-inverse';
// }
// else if (( $defaults['nav_menu_css'][$location]['inverse'] ))
// {
//      $inverse_class = 'bg-inverse';
// }
// else
// {
//      $inverse_class = '';
// }
/* fixed nav menu? */
$fixed_nav = null;
// if ( isset( $options['nav-menu'] ) && ( true == $options['nav-menu'] ) )
// {
//      $fixed_nav = 'fixed-top';
// }
?>
