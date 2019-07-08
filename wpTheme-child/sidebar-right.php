<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	=========================
		RIGHT SIDE-BAR
	=========================
* Part that generates the side bar.
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
     $screen_size = $options['bs-screen-size'];
}
else
{
     $screen_size = $defaults['bs-screen-size'];
}
?>
<?php wptheme\Custom\Hooks::tha_sidebars_before();
if ( is_active_sidebar( 'body-right-sidebar' ) )
{
?>
     <aside class="sidebar body-right-sidebar col<?php echo ( $screen_size );?>3 order-3">
      	<?php wptheme\Custom\Hooks::tha_sidebar_top(); ?>
          <?php

           ?>
               <ul id="sidebar">
                    <?php dynamic_sidebar( 'body-right-sidebar' ); ?>
               </ul>


          <?php wptheme\Custom\Hooks::tha_sidebar_bottom(); ?>
     </aside>
<?php
}
?>
<?php wptheme\Custom\Hooks::tha_sidebars_after(); ?>
