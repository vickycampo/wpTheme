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
<nav id ="<?php esc_html_e( $data_target , 'wpTheme' ); ?>_nav" class="navbar navbar-expand-lg navbar-light bg-light">
     <div class="collapse navbar-collapse"  id="<?php esc_html_e( $data_target , 'wpTheme' ); ?>_target">
          <?php wp_nav_menu( $args ); ?>

     </div><!-- navbarSupportedContent -->
</nav>
