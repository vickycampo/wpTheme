<?php
/*
@package WordPress
@subpackage wpTheme
@since wpTheme
	=====================================
		TEMPLATE PART: TOP NAVIGATION BAR
	=====================================
* Template part in charge of placing and styling the top navigation bar.
*/
?>
<?php
/* Check if the top navigation bar is active */
$location = 'top';
if ( has_nav_menu( $location ) )
{

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
     /* Get the color of the bar */
     if ( isset ( $options['nav_menu']['top']['background_color'] ) )
     {
          $bar_background_color = $options['nav_menu']['top']['background_color'];
     }
     else
     {
          $bar_background_color = $defaults['nav_menu']['top']['background_color'];
     }
     ?>

     <?php
          //we create a variable that contains the container class depending on which settings are set in the options

          //Collapse target name
          $data_target = 'theme_location_top';
          //create the parameters for the navigation menu
          $navbar = array (
               'menu_class' => 'navbar-nav mr-auto',
               'container' => 'false',
               'theme_location' => 'top',
               'fallback_cb' => false,
               'add_li_class'  => 'nav-item',
               'walker' => new bs4navwalker()
          );
          //<li class="nav-item active">
     ?>
     <!-- prepare the bootstrap nav-menu -->
     <!-- wrapping .navbar / .navbar-expand{-sm|-md|-lg|-xl} / Color Scheme -->
     <!--navbar - Defines that is a navbar -->
     <!--navbar-expand-lg - The breakpoint for collapsing -->
     <!--navbar-light - Without it the button won't show -->
     <nav id ="<?php esc_html_e( $data_target , 'wpTheme' ); ?>_nav" class="navbar navbar-expand-<?php echo ( $screen_size ); ?>  <?php esc_html_e( $bar_background_color , 'wpTheme' ); ?>  <?php esc_html_e( $data_target , 'wpTheme' ); ?>" >
          <!-- Toggler -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#<?php esc_html_e( $data_target , 'wpTheme' ); ?>_target" aria-controls="navbar-content" aria-expanded="false" aria-label="<?php esc_html_e( 'Toggle Navigation', 'wpTheme' ); ?>">
               <span class="navbar-toggler-icon"></span>
          </button>
          <ul class="navbar-nav mr-auto">
               <?php
               /* DISPLAY A CUSTOM LOGO */
               if ( function_exists( 'the_custom_logo' ) )
               {
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );

                    if ( has_custom_logo() )
                    {
                         ?>
                         <li class=" navbar-logo nav-item">
                              <a href="<?php echo esc_url( home_url() );?>" class="nav-link">
                                   <img src=" <?php echo (esc_url( $logo[0] )); ?>">
                              </a>
                         </li>
                         <?php
                    }
                    else
                    {
                         ?>
                         <li class=" navbar-logo nav-item">
                              <a href="<?php echo esc_url( home_url() );?>" class="nav-link">
                                   <?php echo '<h1>'. get_bloginfo( 'name' ) .'</h1>'; ?>
                              </a>
                         </li>
                         <?php

                    }
               }
               ?>
          </ul>
          <!-- /Toggler -->
          <!-- grouping and hiding navbar contents by a parent breakpoint -->
          <div class="collapse navbar-collapse" id="<?php esc_html_e( $data_target , 'wpTheme' ); ?>_target">

               <?php
               //Displays a navigation menu.
               wp_nav_menu( $navbar );
               ?>
          </div><!-- <?php echo ( $data_target );?> -->

     </nav>
     <?php
     }
     ?>
