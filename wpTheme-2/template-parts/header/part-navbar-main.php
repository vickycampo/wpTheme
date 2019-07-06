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
/* Check if the top navigation bar is active */
/* This nav Bar Location  */
$location = 'main';

if ( has_nav_menu( $location ) )
{
     include('part-nav-options.php' );
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
     <nav id ="<?php esc_html_e( $data_target , 'wpTheme' ); ?>_nav" class="navbar navbar-expand-<?php echo ( $screen_size ); ?> <?php esc_html_e( $bar_background_color , 'wpTheme' ); ?>  <?php esc_html_e( $data_target , 'wpTheme' ); ?>">
          <div class="collapse navbar-collapse"  id="<?php esc_html_e( $data_target , 'wpTheme' ); ?>_target">
               <?php wp_nav_menu( $args ); ?>

          </div><!-- navbarSupportedContent -->
     </nav>

<?php
}
?>
