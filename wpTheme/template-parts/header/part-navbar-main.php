<?php
/*
@package WordPress
@subpackage wpTheme
@since wpTheme
	=====================================
		TEMPLATE PART: MAIN NAVIGATION BAR
	=====================================
* Template part in charge of placing and styling the main navigation bar.
*/
?>
<?php
//The first specific theme helper, load the theme options and defaults
$defaults = wpTheme_get_theme_defaults ();
//Fetch options from the database table
$options = get_option ('wpTheme_options');
/* We determine which screen size we are using*/
if ( isset ( $options['bs-screen-size'] ) )
{
     $screen_size = str_replace ( "-" , "" , $options['bs-screen-size'] );
}
else
{
     $screen_size = str_replace ( "-" , "" , $defaults['bs-screen-size'] );
}
if ($screen_size == '')
{
     $screen_size = 'sm';
}
?>

<?php
//Collapse target name
$data_target = 'theme_location_main';
//we create an array of arguments for the main navigation bar

$args = array(
     'menu_class' => 'navbar-nav mr-auto',
     'container' => 'false',
     'theme_location' => 'main',
     'fallback_cb' => false,
     'add_li_class'  => 'nav-item',
     'walker' => new bs4navwalker()
     );

?>
<nav id ="<?php esc_html_e( $data_target , 'wpTheme' ); ?>_nav" class="navbar navbar-expand-<?php echo ( $screen_size ); ?> navbar-light bg-light">
     <div class="collapse navbar-collapse"  id="<?php esc_html_e( $data_target , 'wpTheme' ); ?>_target">
          <?php wp_nav_menu( $args ); ?>

     </div><!-- navbarSupportedContent -->
</nav>
