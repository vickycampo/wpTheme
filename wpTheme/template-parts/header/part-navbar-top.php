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

<?php $options = get_option( 'ap_core_theme_options' ); ?>

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
<nav id ="<?php esc_html_e( $data_target , 'wpTheme' ); ?>_nav"class="navbar navbar-expand-lg navbar-light  <?php esc_html_e( $data_target , 'wpTheme' ); ?>" >
     <!-- Toggler -->
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#<?php esc_html_e( $data_target , 'wpTheme' ); ?>_target" aria-controls="navbar-content" aria-expanded="false" aria-label="<?php esc_html_e( 'Toggle Navigation', 'wpTheme' ); ?>">
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
