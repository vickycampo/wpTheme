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
/* This nav Bar Location  */
$location = 'top';
if ( has_nav_menu( $location ) )
{

     include('part-nav-options.php' );

     //Collapse target name
     $data_target = 'theme_location_top';
     //create the parameters for the navigation menu
     $navbar = array (
          'menu_class' => 'navbar-nav ' . $margin,
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
     <nav id ="<?php esc_html_e( $data_target , 'wpTheme' ); ?>_nav" class="navbar <?php echo ( $fixed_nav ); ?> navbar-expand-<?php echo ( $screen_size ); ?> <?php esc_html_e( $bar_background_color , 'wpTheme' ); ?> <?php esc_html_e( $data_target , 'wpTheme' ); ?> <?php esc_html_e( $inverse_class , 'wpTheme' ); ?>" >
          <!-- Toggler -->
          <?php
          /* DISPLAY A CUSTOM LOGO */
          if ( function_exists( 'the_custom_logo' ) )
          {
               ?>
               <?php
               /* We choose which logo will be displayed */
               if ( isset ( $options['nav_menu_css']['top']['custom_logo'] ) &&  $options['nav_menu_css']['top']['custom_logo'] != '' )
               {
                    $logo[0] = $options['nav_menu_css']['top']['custom_logo'];
               }
               else if ( has_custom_logo() && ( ! $options['big-header-image']['show_site_logo'] )  && ( ! $defaults['big-header-image']['show_site_logo'] ))
               {
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
               }
               /* Chose the wrap for the name of the site in the nav bar*/
	       $site_name_wrap_before = '';
		$site_name_wrap_after = '';
               if ( ( isset ($options['big-header-image']['show_site_name']) && ( $options['big-header-image']['show_site_logo'] == false ) ) || ( | isset ($options['big-header-image']['show_site_name']) && ( $defaults['big-header-image']['show_site_logo'] == false ) )
	       {
			$site_name_wrap_before = '<h1>';
		       $site_name_wrap_after = '</h1>';

               }
	   	

               /* do we have a logot text */
               if ( isset ( $logo ) )
               {
                    ?>
                    <a class="navbar-brand navbar-logo" href="<?php echo esc_url( home_url() );?>">
                              <img class="rounded top_navbar_logo" src=" <?php echo (esc_url( $logo[0] )); ?>">
                    </a>
                    <?php
               }
               else
               {
                    ?>
                    <a class="navbar-brand navbar-logo" href="<?php echo esc_url( home_url() );?>">
                         <?php echo get_bloginfo( $site_name_wrap_before .  'name' . $site_name_wrap_after ) ; ?>
                    </a>

                    <?php

               }

          }
          ?>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#<?php esc_html_e( $data_target , 'wpTheme' ); ?>_target" aria-controls="<?php esc_html_e( $data_target , 'wpTheme' ); ?>_target" aria-expanded="false" aria-label="<?php esc_html_e( 'Toggle Navigation', 'wpTheme' ); ?>">
               <span class="navbar-toggler-icon"></span>
          </button>


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
