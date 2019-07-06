<?php
/*
@package WordPress
@subpackage wpTheme
@since wpTheme
	============================================
		TEMPLATE PART: FOOTER NAVIGATION BAR
	============================================
* Template part in charge of placing and styling the footer navigation bar.
*/
?>
<!-- Add the footer navigation menu-->
<?php
$args = array(
     'container' => 'nav',
     'container_class' => 'navbar navbar-expand-sm bg-light footernav',
     'menu_class' => 'navbar-nav',
     'theme_location' => 'footer',
     'fallback_cb' => false,
     'depth' => 1
     );
$args = array(
     'container' => 'nav',
     'container_class' => 'navbar navbar-expand-sm bg-light footernav',
     'depth' => 1,
     'items_wrap' => '<ul class="navbar-nav" id="%1$s">%3$s</ul>' //How the list items should be wrapped.
     );
wp_nav_menu( $args );
?>
