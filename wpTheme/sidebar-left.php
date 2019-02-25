<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	=========================
		LEFT SIDE-BAR
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
<?php tha_sidebars_before();
if ( is_active_sidebar( 'body-left-sidebar' ) )
{
?>
     <div class="sidebar body-left-sidebar col<?php echo ( $screen_size );?>3 order-1">
      	<?php tha_sidebar_top(); ?>
          <?php

           ?>
               <ul id="sidebar">
                    <?php dynamic_sidebar( 'body-left-sidebar' ); ?>
               </ul>


          <?php tha_sidebar_bottom(); ?>
     </div>
<?php
}
?>
<?php tha_sidebars_after(); ?>
