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
     //Check $options['nav-menu']
     $ap_core_fixed_nav = null;
     if ( isset( $options['nav-menu'] ) && ( true == $options['nav-menu'] ) )
     {
          $ap_core_fixed_nav = 'bs-fixed-nav';
     }
     //Check the options['navbar-inverse']
     $ap_core_navbar_inverse = null;
     if ( isset( $options['navbar-inverse'] ) && ( true == $options['navbar-inverse'] ) )
     {
          $ap_core_navbar_inverse = 'navbar-inverse';
     }
     else
     {
          $ap_core_navbar_inverse = 'navbar-default';
     }
?>
<?php
     //we create a variable that contains the container class depending on which settings are set in the options
     if ( $ap_core_fixed_nav ) {
          // if the nav menu is fixed
          $container_class = 'topnav ' . $ap_core_navbar_inverse . ' collapse navbar-collapse navbar-1-collapse';
     } else {
          $container_class =  'topnav ' . $ap_core_navbar_inverse . ' navbar navbar-collapse collapse navbar-1-collapse navbar-default navbar-fixed-top';
     }
     //Collapse target name
     $data_target = 'theme_location_top';
     //create the parameters for the navigation menu
     $navbar = array (
          'menu_class' => 'navbar-nav mr-auto',
          'container' => 'false',
          'theme_location' => 'top',
          'fallback_cb' => false,
          'add_li_class'  => 'nav-item',
          'walker' => new AP_Core_WP_Bootstrap_Navwalker()
     );
     //<li class="nav-item active">
?>
<!-- prepare the bootstrap nav-menu -->
<!-- wrapping .navbar / .navbar-expand{-sm|-md|-lg|-xl} / Color Scheme -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
     <!-- Toggler -->
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#<?php echo ( $data_target );?>" aria-controls="navbar-content" aria-expanded="false" aria-label="<?php esc_html_e( 'Toggle Navigation', 'wpTheme' ); ?>">
          <span class="navbar-toggler-icon"></span>
     </button>
     <!-- /Toggler -->
     <!-- grouping and hiding navbar contents by a parent breakpoint -->
     <div class="<?php echo ($container_class);?>" id="<?php echo ( $data_target );?>">
          <?php
          //Displays a navigation menu.
          wp_nav_menu( $navbar );
          ?>
     </div><!-- <?php echo ( $data_target );?> -->

</nav>
